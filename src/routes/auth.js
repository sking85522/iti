const express = require('express');
const { body } = require('express-validator');
const authController = require('../controllers/authController');
const { ensureGuest } = require('../middleware/auth');

const router = express.Router();

router.get('/login', ensureGuest, authController.showLogin);
router.get('/register', ensureGuest, authController.showRegister);

router.post(
  '/register',
  ensureGuest,
  [
    body('name').trim().isLength({ min: 2 }).withMessage('Name is required.'),
    body('email').isEmail().withMessage('Valid email required.'),
    body('password').isLength({ min: 8 }).withMessage('Password must be 8+ chars.')
  ],
  authController.register
);

router.post(
  '/login',
  ensureGuest,
  [
    body('email').isEmail().withMessage('Valid email required.'),
    body('password').notEmpty().withMessage('Password required.')
  ],
  authController.login
);

router.post('/logout', authController.logout);

module.exports = router;
