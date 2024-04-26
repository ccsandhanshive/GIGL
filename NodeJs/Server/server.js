const express=require("express");
const bodyParser=require("body-parser");
const cors=require("cors");
const app=express();
const mysql = require("mysql2");
const db_details = require("./app/config/db.config.js");
var corsUrl={
    origin:"http://localhost:3000"
};
app.use(cors(corsUrl));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:true}));


const connection = mysql.createConnection({
    host: db_details.host,
    user: db_details.user,
    password: db_details.password,
    database: db_details.database,
});

;

connection.connect((err) => {
    if (err) {
        console.error("Error connecting to database:", err);
        return;
    }
    console.log("Connected to database");
});
module.exports = connection;

app.get("/",(req,res)=>{
    res.json({"message":"This is welcome from app"});
})
require("./app/routes/user.routes.js")(app);

const PORT=process.env.PORT||3000;
app.listen(PORT,()=>{
    console.log(`server is running port no ${PORT}`);
})