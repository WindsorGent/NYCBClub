<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="../styles/front.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>It's Bingo Time!</title>
</head>
<body>
<div class="game-container">
<h1>You got this <?=$_SESSION['name']?>.</h1>
<table id="bingo-card">
    <tr>
        <th>B</th>
        <th>I</th>
        <th>N</th>
        <th>G</th>
        <th>O</th>
    </tr>
    <?php
    $colNum = 1;
    $rowNum = 1;
    $squareNum = 0;

    while ($rowNum <=5) {
        echo '<tr>';
        while ($colNum <=5) {
            if (($rowNum == 3) && ($colNum == 3)) {
                echo '<td id="free-square">Free</td>';
                $colNum ++;
            } else {
            echo '<td id="square'. $squareNum .'"></td>';
            $colNum ++;
            $squareNum ++; }
        }
        echo '</tr>';
        $colNum = 1;
        $rowNum ++;
    }
    ?>
</table>
<div id="below-board">
<button id="bingo-button">BINGO!</button>
<button id="clear-board">Clear Board</button>
<section id="rules">
    <h2>How to Play</h2>
    <ol>
        <li>Listen for the numbers</li>
        <li>When you hear a number, click it to mark it off</li>
        <li>When you have 5 squares in a row, horizontally, vertically or diagonally, click BINGO!</li>
        <li>If you're first and correct, you win!</li>
    </ol>
</section>
<p>Think you're having bad luck? Click here for a new board:</p>
<button id="new-board">New Board</button>
</div>
<?php @include '../includes/footer.inc' ?>
</div>
<audio id="multi-horn-audio" src="audio/multihorn.mp3" preload="auto"></audio>
</body>
<script src="game.js"></script>
</html>