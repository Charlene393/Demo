const express = require('express');
const apiController = require('../controllers/apiController');
const authMiddleware = require('../middlewares/authMiddleware');

const router = express.Router();


router.get('/users', authMiddleware, apiController.getAllUsers);
router.get('/user/:id', authMiddleware, apiController.getUserById);
router.get('/usersByGender/:gender', authMiddleware, apiController.getUsersByGender);
router.get('/usersByDrug/:drugId', authMiddleware, apiController.getUsersByDrug);
router.get('/usersByDate/:purchaseDate', authMiddleware, apiController.getUsersByDate);
router.get('/usersByLastLogin', authMiddleware, apiController.getUsersByLastLogin);

// Insecure API Endpoint
router.get('/products', apiController.getAllProducts);

module.exports = router;
