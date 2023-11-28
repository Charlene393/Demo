const sql = require("mysql");
const dotenv = require("dotenv").config();
const db = sql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'drug_dispensing_tool'
})
module.exports = db;