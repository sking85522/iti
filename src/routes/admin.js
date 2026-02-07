const express = require('express');
const { body } = require('express-validator');
const { ensureAuth } = require('../middleware/auth');
const { requireRole } = require('../middleware/roles');
const adminController = require('../controllers/adminController');

const router = express.Router();

router.get('/', ensureAuth, requireRole(['admin']), adminController.dashboard);
router.get('/users', ensureAuth, requireRole(['admin']), adminController.listUsers);
router.post(
  '/users',
  ensureAuth,
  requireRole(['admin']),
  [
    body('uid').trim().isLength({ min: 4 }).withMessage('UID required.'),
    body('name').trim().isLength({ min: 2 }).withMessage('Name required.'),
    body('email').isEmail().withMessage('Valid email required.'),
    body('password').isLength({ min: 8 }).withMessage('Password required.'),
    body('role').isIn(['admin', 'worker', 'user']).withMessage('Role required.'),
    body('language').isLength({ min: 2 }).withMessage('Language required.')
  ],
  adminController.createUser
);
router.post(
  '/users/:id',
  ensureAuth,
  requireRole(['admin']),
  [
    body('name').trim().isLength({ min: 2 }).withMessage('Name required.'),
    body('email').isEmail().withMessage('Valid email required.'),
    body('role').isIn(['admin', 'worker', 'user']).withMessage('Role required.'),
    body('language').isLength({ min: 2 }).withMessage('Language required.')
  ],
  adminController.updateUser
);
router.post('/users/:id/delete', ensureAuth, requireRole(['admin']), adminController.deleteUser);

router.get('/workers', ensureAuth, requireRole(['admin']), adminController.listWorkers);
router.post('/workers', ensureAuth, requireRole(['admin']), adminController.createWorker);
router.post(
  '/workers/:workerId',
  ensureAuth,
  requireRole(['admin']),
  [
    body('assigned_tasks').trim().isLength({ min: 1 }).withMessage('Tasks required.'),
    body('status').isLength({ min: 2 }).withMessage('Status required.')
  ],
  adminController.updateWorker
);

router.get('/settings', ensureAuth, requireRole(['admin']), adminController.settings);
router.post('/settings/:id', ensureAuth, requireRole(['admin']), adminController.updateSetting);

module.exports = router;
