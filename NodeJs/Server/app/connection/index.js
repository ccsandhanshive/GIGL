const mysql = require('mysql2');

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Root@123',
    database: 'node_auth',
});
db.connect((err) => {
    if (err) {
        console.error("Error connecting to database:", err);
        return;
    }
    console.log("Connected to database");
});
module.exports = db;
