const { validationResult } = require('express-validator');
const bcrypt = require('bcrypt');
const pool = require('../db');

const dashboard = async (req, res) => {
  const [[{ totalUsers }]] = await pool.query('SELECT COUNT(*) AS totalUsers FROM users');
  const [[{ totalWorkers }]] = await pool.query('SELECT COUNT(*) AS totalWorkers FROM workers');
  const [logs] = await pool.query(
    'SELECT admin_logs.*, users.name FROM admin_logs JOIN users ON admin_logs.admin_user_id = users.id ORDER BY admin_logs.created_at DESC LIMIT 10'
  );
  return res.render('pages/admin-dashboard', {
    title: 'Admin Panel',
    stats: { totalUsers, totalWorkers },
    logs
  });
};

const listUsers = async (req, res) => {
  const [users] = await pool.query('SELECT * FROM users ORDER BY created_at DESC');
  return res.render('pages/admin-users', { title: 'Manage Users', users, errors: [] });
};

const createUser = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    const [users] = await pool.query('SELECT * FROM users ORDER BY created_at DESC');
    return res.status(400).render('pages/admin-users', {
      title: 'Manage Users',
      users,
      errors: errors.array()
    });
  }

  const { uid, name, email, role, language, password } = req.body;
  const passwordHash = await bcrypt.hash(password, 12);
  await pool.query(
    'INSERT INTO users (uid, name, email, password_hash, role, language) VALUES (?, ?, ?, ?, ?, ?)',
    [uid, name, email, passwordHash, role, language]
  );
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Created user ${email}`
  ]);
  return res.redirect('/admin/users');
};

const updateUser = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    const [users] = await pool.query('SELECT * FROM users ORDER BY created_at DESC');
    return res.status(400).render('pages/admin-users', {
      title: 'Manage Users',
      users,
      errors: errors.array()
    });
  }
  const { id } = req.params;
  const { name, email, role, language } = req.body;
  await pool.query(
    'UPDATE users SET name = ?, email = ?, role = ?, language = ? WHERE id = ?',
    [name, email, role, language, id]
  );
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Updated user ${email}`
  ]);
  return res.redirect('/admin/users');
};

const deleteUser = async (req, res) => {
  const { id } = req.params;
  await pool.query('DELETE FROM users WHERE id = ?', [id]);
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Deleted user ${id}`
  ]);
  return res.redirect('/admin/users');
};

const listWorkers = async (req, res) => {
  const [workers] = await pool.query(
    'SELECT workers.*, users.name, users.email FROM workers JOIN users ON workers.user_id = users.id'
  );
  const [users] = await pool.query('SELECT id, name FROM users WHERE role = "worker"');
  return res.render('pages/admin-workers', { title: 'Manage Workers', workers, users, errors: [] });
};

const updateWorker = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    const [workers] = await pool.query(
      'SELECT workers.*, users.name, users.email FROM workers JOIN users ON workers.user_id = users.id'
    );
    const [users] = await pool.query('SELECT id, name FROM users WHERE role = \"worker\"');
    return res.status(400).render('pages/admin-workers', {
      title: 'Manage Workers',
      workers,
      users,
      errors: errors.array()
    });
  }
  const { workerId } = req.params;
  const { assigned_tasks, status } = req.body;
  await pool.query(
    'UPDATE workers SET assigned_tasks = ?, status = ? WHERE id = ?',
    [assigned_tasks, status, workerId]
  );
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Updated worker ${workerId}`
  ]);
  return res.redirect('/admin/workers');
};

const createWorker = async (req, res) => {
  const { user_id, assigned_tasks, status } = req.body;
  await pool.query(
    'INSERT INTO workers (user_id, assigned_tasks, status) VALUES (?, ?, ?)',
    [user_id, assigned_tasks, status]
  );
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Created worker for user ${user_id}`
  ]);
  return res.redirect('/admin/workers');
};

const settings = async (req, res) => {
  const [settingsRows] = await pool.query('SELECT * FROM site_settings ORDER BY key_name');
  return res.render('pages/admin-settings', { title: 'Site Settings', settings: settingsRows });
};

const updateSetting = async (req, res) => {
  const { id } = req.params;
  const { value_text } = req.body;
  await pool.query('UPDATE site_settings SET value_text = ? WHERE id = ?', [value_text, id]);
  await pool.query('INSERT INTO admin_logs (admin_user_id, action) VALUES (?, ?)', [
    req.session.user.id,
    `Updated setting ${id}`
  ]);
  return res.redirect('/admin/settings');
};

module.exports = {
  dashboard,
  listUsers,
  createUser,
  updateUser,
  deleteUser,
  listWorkers,
  updateWorker,
  createWorker,
  settings,
  updateSetting
};
