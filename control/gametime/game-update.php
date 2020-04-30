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

$returned = array();

$sql = 'SELECT * FROM players WHERE boardnums IS NOT NULL';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $username = $row['username'];
        $boardnums = $row['boardnums'];
        $gamenums = $row['gamenums'];
        $called = $row['called'];

        $returned[] = array("id" => $id, "player" => $username, "boardnums" => $boardnums, "gamenums" => $gamenums, "calledbingo" => $called);
    }
    echo json_encode($returned);
} else {
    echo 'Nothing Here';
}