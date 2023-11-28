const express = require('express');
const apiUserController = require('../controllers/apiUserController');
const authMiddleware = require('../middlewares/authMiddleware');

const router = express.Router();

router.post('/register', apiUserController.register);
router.post('/getApiAccessToken', apiUserController.getApiAccessToken);
router.post('/subscribeToApiProduct', authMiddleware, apiUserController.subscribeToApiProduct);

module.exports = router;
