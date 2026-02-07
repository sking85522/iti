const pool = require('../db');

const dashboard = async (req, res) => {
  const [rows] = await pool.query(
    'SELECT workers.*, users.name FROM workers JOIN users ON workers.user_id = users.id WHERE users.id = ?',
    [req.session.user.id]
  );
  return res.render('pages/worker-dashboard', {
    title: 'Worker Panel',
    worker: rows[0] || null
  });
};

const updateTasks = async (req, res) => {
  const { assigned_tasks, status } = req.body;
  await pool.query(
    'UPDATE workers SET assigned_tasks = ?, status = ? WHERE user_id = ?',
    [assigned_tasks, status, req.session.user.id]
  );
  return res.redirect('/worker');
};

module.exports = { dashboard, updateTasks };
