<?php

session_start();

require ('../config.php');

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