const db = require("../routes/db.config");
const bcrypt = require("bcryptjs");
//const regi = require("../register.js");

const register = async (req, res) => {
  const { name, email,  password: hashedPassword } = req.body;

  if (!email || !hashedPassword) {
    return res.json({ status: "error", error: "Please Enter your email and password" });
  } else {
    console.log(email);
    
    db.query('SELECT email FROM patient WHERE email = ?', [email], async (err, result) => {
      if (err) throw err;

      if (result[0]) {
        return res.json({ status: "error", error: "Email has already been registered" });
      } else {
        const password = await bcrypt.hash(hashedPassword, 10);
        console.log(password);

        db.query(
          'INSERT INTO patient SET ?',
          {
            name: name,
           
            
            email: email,
            
            password: password,
          },
          (error, results) => {
            if (error) throw error;
            return res.json({ status: "success", success: "User has been registered" });
          }
        );
      }
    });
  }
};

module.exports = register;


