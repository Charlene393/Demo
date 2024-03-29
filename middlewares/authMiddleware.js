

const jwt = require('jsonwebtoken');

const authMiddleware = (req, res, next) => {
  
  const token = req.headers.authorization;
  if (!token) {
    return res.status(401).json({ status: 'error', error: 'Unauthorized - Token not provided' });
  }

  try {
   
    const decoded = jwt.verify(token, 'yourSecretKey');


    req.user = decoded;

    next();
  } catch (error) {
    console.error('Error verifying token:', error);
    return res.status(401).json({ status: 'error', error: 'Unauthorized - Invalid token' });
  }
};

module.exports = authMiddleware;
