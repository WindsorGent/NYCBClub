<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['adloggedin'])) {
    header('Location: ../');
    exit;
}
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

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['gamepass'])) {
    // Could not get the data that should have been sent.
    exit('There\'s nothing there');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['gamepass'])) {
    // One or more values are empty.
    exit('Please enter a new password');
}

$table = 'gameadmin';
$new_gamepass = password_hash($_POST['gamepass'], PASSWORD_DEFAULT);
$id = $_SESSION['id'];
$query = 'UPDATE '.$table.' SET gamepass="'.$new_gamepass.'" WHERE id="'.$id.'"';

if (mysqli_query($con, $query)) {
    header('Location: ./?=updated');
} else {
    echo "Error updating record: " . mysqli_error($con);
}

$con->close();