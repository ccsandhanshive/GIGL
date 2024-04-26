const db = require("../connection");
const bcrypt = require('bcrypt');

exports.addUser = async (req, res) => {
    const { username, password } = req.body;

    try {
        // Hash password
        const hashedPassword = await bcrypt.hash(password, 10);

        // Insert user into database
        db.query('INSERT INTO users (username, password) VALUES (?, ?)', [username, hashedPassword], (err, result) => {
            if (err) {
                res.status(500).send('Error registering user');
                throw err;
            }
            res.status(201).send('User registered successfully');
        });
    } catch (error) {
        res.status(500).send('Error registering user');
        console.error(error);
    }
}

exports.login = async (req, res) => {
    const { username, password } = req.body;

    // Find user in database
    db.query('SELECT * FROM users WHERE username = ?', [username], async (err, results) => {
        if (err) {
            res.status(500).send('Error logging in');
            throw err;
        }
        if (results.length === 0 || !(await bcrypt.compare(password, results[0].password))) {
            res.status(401).send('Invalid username or password');
        } else {
            res.status(200).send('Login successful');
        }
    });
};
