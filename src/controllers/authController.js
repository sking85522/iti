const bcrypt = require('bcrypt');
const { validationResult } = require('express-validator');
const pool = require('../db');

const generateUid = () => {
  const year = new Date().getFullYear();
  const random = Math.floor(1000 + Math.random() * 9000);
  return `TE-${year}-${random}`;
};

const showLogin = (req, res) => {
  res.render('pages/login', { title: 'Login', errors: [], values: {} });
};

const showRegister = (req, res) => {
  res.render('pages/register', { title: 'Register', errors: [], values: {} });
};

const register = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).render('pages/register', {
      title: 'Register',
      errors: errors.array(),
      values: req.body
    });
  }

  const { name, email, password } = req.body;
  const uid = generateUid();
  const passwordHash = await bcrypt.hash(password, 12);

  try {
    await pool.query(
      'INSERT INTO users (uid, name, email, password_hash, role, language) VALUES (?, ?, ?, ?, ?, ?)',
      [uid, name, email, passwordHash, 'user', 'en']
    );
    return res.redirect('/login');
  } catch (error) {
    return res.status(500).render('pages/register', {
      title: 'Register',
      errors: [{ msg: 'Account already exists or database error.' }],
      values: req.body
    });
  }
};

const login = async (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).render('pages/login', {
      title: 'Login',
      errors: errors.array(),
      values: req.body
    });
  }

  const { email, password } = req.body;
  const [rows] = await pool.query('SELECT * FROM users WHERE email = ?', [email]);
  const user = rows[0];

  if (!user) {
    return res.status(400).render('pages/login', {
      title: 'Login',
      errors: [{ msg: 'Invalid credentials.' }],
      values: req.body
    });
  }

  const match = await bcrypt.compare(password, user.password_hash);
  if (!match) {
    return res.status(400).render('pages/login', {
      title: 'Login',
      errors: [{ msg: 'Invalid credentials.' }],
      values: req.body
    });
  }

  req.session.user = {
    id: user.id,
    uid: user.uid,
    name: user.name,
    email: user.email,
    role: user.role,
    language: user.language,
    photoUrl: user.photo_url
  };

  return res.redirect('/dashboard');
};

const logout = (req, res) => {
  req.session.destroy(() => {
    res.redirect('/login');
  });
};

module.exports = {
  showLogin,
  showRegister,
  register,
  login,
  logout
};
