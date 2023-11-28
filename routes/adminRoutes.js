const express = require('express');
const adminController = require('../controllers/adminController');
const authMiddleware = require('../middlewares/authMiddleware');

const router = express.Router();


router.post('/addEditDrugCategory', authMiddleware, adminController.addEditDrugCategory);
router.post('/addEditUser', authMiddleware, adminController.addEditUser);
router.post('/generateApiTokens', authMiddleware, adminController.generateApiTokens);

module.exports = router;
