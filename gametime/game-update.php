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

$boardnums = $_POST['boardnums'];
$gamenums = $_POST['gamenums'];
$id = $_SESSION['id'];

if (isset($_POST['storeboard'])) {
    if ($stmt = $con->prepare('UPDATE players SET boardnums = ? WHERE id = ?')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('si', $boardnums, $id);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so board is not saved.
        echo 'Failed to save board numbers';
    };
};

if (isset($_POST['storecheck'])) {
    if ($stmt = $con->prepare('UPDATE players SET gamenums = ? WHERE id = ?')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('si', $gamenums, $id);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so selected numbers not saved.
        echo 'Failed to save selected number';
    };
};

if (isset($_POST['bingocall'])) {
    if ($stmt = $con->prepare('UPDATE players SET called = 1 WHERE id = ?')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('i', $id);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so selected numbers not saved.
        echo 'Failed to declare bingo';
    };
};

if (isset($_POST['bingoclear'])) {
    if ($stmt = $con->prepare('UPDATE players SET called = 0 WHERE id = ?')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('i', $id);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so selected numbers not saved.
        echo 'Failed to declare bingo';
    };
};