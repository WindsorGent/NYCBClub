<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Website Title</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h1>Current Players</h1>
    <form action="update-gamepass.php" method="post" autocomplete="off">
        <label for="gamepass">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="gamepass" placeholder="Update Game Password" id="gamepass" required>
        <input type="submit" value="Update">
    </form>
    <section id="current-players">
        <button id="updategames">Update Games</button>
        <button id="clearbingos">Clear Bingos</button>

 <div class="games-container">
        <div class="player-games" id="original-game-board">
            <h3 class="username">Default Board</h3>
            <table class="bingo-card" id="player-card">
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
                            echo '<td class="free-square">F</td>';
                            $colNum ++;
                        } else {
                            echo '<td class="square'. $squareNum .' board-number">00</td>';
                            $colNum ++;
                            $squareNum ++; }
                    }
                    echo '</tr>';
                    $colNum = 1;
                    $rowNum ++;
                }
                ?>
            </table>
            <p id="checked-numbers"></p>
        </div>
</div>

    </section>
</div>
<script src="updates.js" type="application/javascript"></script>
</body>
</html>
