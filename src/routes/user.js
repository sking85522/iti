const express = require('express');
const { body } = require('express-validator');
const multer = require('multer');
const path = require('path');
const { ensureAuth } = require('../middleware/auth');
const userController = require('../controllers/userController');
const profileController = require('../controllers/profileController');

const router = express.Router();

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, path.join(__dirname, '..', '..', 'public', 'uploads'));
  },
  filename: (req, file, cb) => {
    const unique = `${Date.now()}-${file.originalname}`;
    cb(null, unique);
  }
});

const upload = multer({ storage });

router.get('/dashboard', ensureAuth, userController.dashboard);
router.get('/profile', ensureAuth, profileController.showProfile);
router.post(
  '/profile',
  ensureAuth,
  upload.single('photo'),
  [
    body('name').trim().isLength({ min: 2 }).withMessage('Name is required.'),
    body('email').isEmail().withMessage('Valid email required.'),
    body('language').isLength({ min: 2 }).withMessage('Language required.')
  ],
  profileController.updateProfile
);

module.exports = router;
