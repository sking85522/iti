const { validationResult } = require('express-validator');
const pool = require('../db');

const showProfile = async (req, res) => {
  const [rows] = await pool.query('SELECT * FROM users WHERE id = ?', [req.session.user.id]);
  const user = rows[0];
  return res.render('pages/profile', { title: 'Your Profile', user, errors: [] });
};

const updateProfile = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    const [rows] = await pool.query('SELECT * FROM users WHERE id = ?', [req.session.user.id]);
    return res.status(400).render('pages/profile', {
      title: 'Your Profile',
      user: rows[0],
      errors: errors.array()
    });
  }

  const { name, email, language } = req.body;
  const photoUrl = req.file ? `/uploads/${req.file.filename}` : req.session.user.photoUrl;

  await pool.query(
    'UPDATE users SET name = ?, email = ?, language = ?, photo_url = ? WHERE id = ?',
    [name, email, language, photoUrl, req.session.user.id]
  );

  req.session.user = {
    ...req.session.user,
    name,
    email,
    language,
    photoUrl
  };

  return res.redirect('/dashboard');
};

module.exports = { showProfile, updateProfile };
