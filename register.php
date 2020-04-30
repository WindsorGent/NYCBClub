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

$table = 'players';
$query = 'SELECT id FROM ' . $table;
$result = mysqli_query($con,$query);

if(empty($result)) {
    $query = mysqli_query($con, 'CREATE TABLE IF NOT EXISTS `players` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`boardnums` varchar(255) NOT NULL,
  	`gamenums` varchar(255) NOT NULL,
    `called` boolean DEFAULT false,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;');
}

$gamepass = $con->query("SELECT gamepass FROM gameadmin WHERE id = 1")->fetch_object()->gamepass;


if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM players WHERE username='$username'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}

if (isset($_POST['pw_check'])) {
    if (password_verify($_POST['password'], $gamepass)) {
        echo "correct";
    } else {
        echo 'incorrect';
    }
    exit();
}


// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

//Check Username has valid Characters only
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id FROM players WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo 'Username exists, please choose another!';
    } else {
        //Check if password is correct:
        if (password_verify($_POST['password'], $gamepass)) {

            // Username doesnt exists, insert new account
            if ($stmt = $con->prepare('INSERT INTO players (username) VALUES (?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $stmt->bind_param('s', $_POST['username']);
                $stmt->execute();
                $id = $stmt->insert_id;
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: ./gametime');
            } else {
                // Something is wrong with the sql statement, check to make sure players table exists with all 3 fields.
                echo 'Could not prepare statement!';
            }
        } else {
            echo 'Incorrect Password';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure players table exists with all fields.
    echo 'Could not prepare statement!';
}
$con->close();
