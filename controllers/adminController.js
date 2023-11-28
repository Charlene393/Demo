const db = require('../routes/db.config');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcrypt');

const addEditDrugCategory = async (req, res) => {
  try {
    const { categoryId, categoryName } = req.body;

    
    if (!categoryId || !categoryName) {
      return res.status(400).json({ status: 'error', error: 'Missing required parameters' });
    }

    const existingCategory = await db.query('SELECT * FROM drugs WHERE categoryId = ?', [categoryId]);

    if (existingCategory.length > 0) {
      
      await db.query('UPDATE drugs SET categoryName = ? WHERE categoryId = ?', [categoryName, categoryId]);
      return res.json({ status: 'success', message: 'Drug category updated successfully' });
    } else {

      await db.query('INSERT INTO drugs(categoryId, categoryName) VALUES (?, ?)', [categoryId, categoryName]);
      return res.json({ status: 'success', message: 'Drug category added successfully' });
    }
  } catch (error) {
    console.error('Error adding/editing drug category:', error);
    return res.status(500).json({ status: 'error', error: 'Internal Server Error' });
  }
};




const addEditUser = async (req, res) => {
  try {
    const { userId,name, email, password } = req.body;

   
    if (!name || !email  || !password) {
      return res.status(400).json({ status: 'error', error: 'Missing required parameters' });
    }


    const hashedPassword = await bcrypt.hash(password, 10);


    const existingUser = await db.query('SELECT * FROM users WHERE userId = ?', [userId]);

    if (existingUser.length > 0) {
      s
      await db.query(
        'UPDATE users SET name = ?,  email = ?, , password = ? WHERE userId = ?',
        [firstName, lastName, email, gender, dateOfBirth, hashedPassword, userId]
      );
      return res.json({ status: 'success', message: 'User details updated successfully' });
    } else {
      
      await db.query(
        'INSERT INTO users (userId, firstName, lastName, email, gender, dateOfBirth, password) VALUES (?, ?, ?, ?, ?, ?, ?)',
        [userId,  name, email,  hashedPassword]
      );
      return res.json({ status: 'success', message: 'User added successfully' });
    }
  } catch (error) {
    console.error('Error adding/editing user:', error);
    return res.status(500).json({ status: 'error', error: 'Internal Server Error' });
  }
};



const generateApiTokens = async (req, res) => {
  try {
    const { userId, expiresIn } = req.body;

    if (!userId || !expiresIn) {
      return res.status(400).json({ status: 'error', error: 'Missing required parameters' });
    }

    const user = await db.query('SELECT * FROM users WHERE userId = ?', [userId]);

    if (!user[0]) {
      return res.status(404).json({ status: 'error', error: 'User not found' });
    }
    const token = jwt.sign({ userId: user[0].userId, email: user[0].email }, 'yourSecretKey', {
      expiresIn: '3d', 
    });

    return res.json({ status: 'success', token: token });
  } catch (error) {
    console.error('Error generating API token:', error);
    return res.status(500).json({ status: 'error', error: 'Internal Server Error' });
  }
};
module.exports = {
    addEditDrugCategory,
  };

  module.exports = {
    addEditUser,
  };
module.exports = {
  generateApiTokens,
};

