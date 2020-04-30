<?php

require ('../../config.php');

if (isset($_POST['bingoclear'])) {
    if ($stmt = $con->prepare('UPDATE players SET called = 0 WHERE called = 1')) {
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, so selected numbers not saved.
        echo 'Failed to clear bingo';
    };
};