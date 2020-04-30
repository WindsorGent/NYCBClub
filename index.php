<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
    header('Location: ./gametime');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="styles/front.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>It's Bingo Time!</title>
</head>
<section class="login">
	<header>
        <h1>It's Bingo Time</h1>
    </header>
<div class="register">
    <form action="register.php" method="post" autocomplete="off">
        <div>
        <input type="text" name="username" placeholder="What's Your Name?" id="username" required>
        <span></span>
        </div>
        <div>
        <input type="password" name="password" placeholder="Enter the Password" id="password" required>
            <span></span>
        </div>
        <span id="error_msg"></span>
        <button id="bingo-button">Let's Play!</button>
    </form>
</div>
</section>
<?php @include 'includes/footer.inc' ?>
<script src="register.js"></script>
</body>
</html>
