<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'bingo';
$DATABASE_PASS = 'bingo';
$DATABASE_NAME = 'bingo';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if Table Exists, and if not, create it

$table = 'gameadmin';
$query = 'SELECT id FROM ' . $table;
$result = mysqli_query($con,$query);

if(empty($result)) {
    $query = mysqli_query($con, 'CREATE TABLE IF NOT EXISTS `gameadmin` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
  	`gameid` int(11) NOT NULL,
  	`gamepass` varchar(100) NOT NULL,
  	UNIQUE KEY unique_gameid (gameid),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;');
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if (!isset($_POST['username'], $_POST['password'])) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT id, password FROM gameadmin WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has loggedin!




                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['adloggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: ./gametime');
            } else {
                echo 'Incorrect password!';
            }
        } else {
            echo 'Incorrect username!';
        }


        $stmt->close();
    }

