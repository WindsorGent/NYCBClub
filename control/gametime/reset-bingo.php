<?php
// Connection info.
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

if (isset($_POST['bingoclear'])) {
    if ($stmt = $con->prepare('UPDATE players SET called = 0 WHERE called = 1')) {
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so selected numbers not saved.
        echo 'Failed to clear bingo';
    };
};