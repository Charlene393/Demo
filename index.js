const express= require("express");
const db = require("./routes/db.config");
const app = express();
const bcrypt = require("bcryptjs")
const users =[]
app.use(express.urlencoded({extended:false}))
app.post("/register", async(req, res)=>{
    try {
        const hashedPassword = await bcrypt.hash(req.body.password, 10)
        
        users.push({
            id: Date.now().toString(),
            name: req.body.name,
            email: req.body.email,
            Gender:req.body.Gender,
            password:hashedPassword,
})
console.log(users)
res.redirect("/login")
} catch (error) {
    console.log(error)
    res.redirect("/register")
}
})



//const cookie = require("cookie-parser");


//app.use("/js", express.static(__dirname + "/public/js"))
//app.use("/css", express.static(__dirname + "/public/css"))
//app.set("view engine", "ejs");
//app.set("views", "./views");
//app.use(cookie());
//app.use(express.json());
//db.connect((err)=>{
//if(err) throw err;
   
//})
app.use("/",require("./routes/pages"));
//app.use("/api",require("./controllers/authenication")) ;
console.log(users)
app.listen(3000,()=>{
    console.log('API up and running')
});
