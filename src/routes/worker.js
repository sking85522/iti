const express = require('express');
const { body } = require('express-validator');
const { ensureAuth } = require('../middleware/auth');
const { requireRole } = require('../middleware/roles');
const workerController = require('../controllers/workerController');

const router = express.Router();

router.get('/', ensureAuth, requireRole(['worker']), workerController.dashboard);
router.post(
  '/tasks',
  ensureAuth,
  requireRole(['worker']),
  [
    body('assigned_tasks').trim().isLength({ min: 1 }).withMessage('Tasks required.'),
    body('status').trim().isLength({ min: 2 }).withMessage('Status required.')
  ],
  workerController.updateTasks
);

module.exports = router;
