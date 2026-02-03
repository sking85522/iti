const express = require('express');
const publicController = require('../controllers/publicController');

const router = express.Router();

router.get('/', publicController.home);
router.get('/about', publicController.about);
router.get('/services', publicController.services);
router.get('/contact', publicController.contact);
router.post('/contact', publicController.contactSubmit);
router.get('/blog', publicController.blog);

module.exports = router;
