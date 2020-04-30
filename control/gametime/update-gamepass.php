<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['adloggedin'])) {
    header('Location: ../');
    exit;
}

require ('../../config.php');

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