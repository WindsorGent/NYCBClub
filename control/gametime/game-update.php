<?php

require ('../../config.php');

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