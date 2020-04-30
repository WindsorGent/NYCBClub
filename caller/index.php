<?php
date_default_timezone_set('America/New_York');

$ToD = '';
if (date("H") < 12) {
    $ToD = 'Morning';
} else if (date('H') > 11 && date("H") < 18) {
    $ToD = 'Afternoon';
} else if (date('H') > 17 && date("H") < 21) {
    $ToD = 'Evening';
} else if (date('H') > 21) {
    $ToD = 'Night';
}

$today = date('l')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neil's Bingo Caller</title>
    <link type="text/css" rel="stylesheet" href="../styles/backend.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<header><h1><?php echo $today.' '.$ToD; ?> Bingo</h1></header>
<div class="caller-content">
    <?php @include 'caller-table.php'; ?>
</div>
<?php @include '../includes/footer.inc' ?>

<!--Caller JS to make it work-->
<script src="caller.js"></script>
<!--Audio Files for button presses-->
<audio id="single-horn-audio" src="audio/singlehorn.mp3" preload="auto"></audio>
<audio id="multi-horn-audio" src="audio/multihorn.mp3" preload="auto"></audio>
</body>
</html>