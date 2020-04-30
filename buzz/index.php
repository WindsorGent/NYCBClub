<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>It's Buzz's Birthday Time!</title>
</head>
<header>
    <h1>BIRTHDAY BUZZMASTER</h1>
</header>

<nav>
    <a class="ceelo-btn active">Cee-Lo</a> |
    <a class="threeman-btn">Three Man</a>
</nav>


<section id="ceelo">
    <h2>Cee-Lo</h2>
    <div class="game">
<div id="player-1">
    <ul class="dice" id="plyr1">
        <li>0</li>
        <li>0</li>
        <li>0</li>
    </ul>
    <button class="roll-dice1">Roll</button>
</div>
    <div id="player-2">
        <ul class="dice" id="plyr2">
            <li>0</li>
            <li>0</li>
            <li>0</li>
        </ul>
        <button class="roll-dice2">Roll</button>
    </div>
    </div>
    <div class="rules">
        <h2>Loser Stays On</h2>
        <h3>4-5-6:</h3>
            <p>The highest possible roll. If you roll 4-5-6, you automatically win.</p>
            <h3>Trips:</h3>
            <p>Rolling three same numbers is known as rolling a trip. Higher trips beat lower trips, so 4-4-4 is better than 3-3-3. Any trips beats any established point.</p>
            <h3>Point:</h3>
            <p>Rolling a pair, and another number, establishes the singleton as a "point".  A higher point beats a lower point, so 2-2-6 is better than 5-5-2.</p>
            <h3>1-2-3:</h3>
            <p>The lowest possible roll. If you roll 1-2-3, you automatically lose.</p>
    </div>
</section>
<div class="clear"></div>
<section id="threeman">
    <h2>Three Man</h2>
    <div class="game">
        <div id="threeman-display">
            <ul class="dice" id="threeman-dice">
                <li>0</li>
                <li>0</li>
            </ul>
            <button class="roll-threemandice">Roll</button>
        </div>
    </div>
    <div class="rules">
    <div style="dice-container">
        <ul class="threemandice">
            <li>1</li>
            <li>2</li>
        </ul>
        <p><strong>You're The 3 Man</strong> Every time a 3 appears, you drink. If you already are you get to nominate someone else</p>
        <ul class="threemandice">
            <li>1</li>
            <li>4</li>
        </ul>
        <p><strong>Oi!</strong> Everyone puts a thumb on their forehead and shouts OI! Last one drinks.</p>
        <ul class="threemandice">
            <li>1</li>
            <li>6</li>
        </ul>
        <ul class="threemandice">
            <li>2</li>
            <li>5</li>
        </ul>
        <ul class="threemandice">
            <li>3</li>
            <li>4</li>
        </ul>
        <p><strong>7 to Heaven</strong> Point to Heaven. Last one drinks.</p>
        <ul class="threemandice">
            <li>2</li>
            <li>6</li>
        </ul>
        <ul class="threemandice">
            <li>3</li>
            <li>5</li>
        </ul>
        <p><strong>8</strong> Whoever Rolled, Drinks</p>
        <ul class="threemandice">
            <li>3</li>
            <li>6</li>
        </ul>
        <ul class="threemandice">
            <li>4</li>
            <li>5</li>
        </ul>
        <p><strong>9 is Fine</strong> Do a thumbs up. Last one drinks.</p>
        <ul class="threemandice">
            <li>1</li>
            <li>1</li>
        </ul>
        <p><strong>Cheers!</strong> Everyone Drinks.</p>
        <ul class="threemandice">
            <li>6</li>
            <li>6</li>
        </ul>
        <p><strong>High Score!</strong> Finish your drink.</p>
        <ul class="threemandice">
            <li>2</li>
            <li>2</li>
        </ul>
        <ul class="threemandice">
            <li>3</li>
            <li>3</li>
        </ul>
        <ul class="threemandice">
            <li>4</li>
            <li>4</li>
        </ul>
        <ul class="threemandice">
            <li>5</li>
            <li>5</li>
        </ul>
        <p><strong>Nominate</strong> Choose someone to drink 2/3/4/5 times. Or split the total between people.</p>
        <hr>
        <p>Everything else is a nothing roll and play moves on. If it's your first roll, you have to keep rolling until you get something.</p>
    </div>
    </div>
</section>
<div class="clear"></div>

<footer>
    &copy; Neil, for Nathan <?php echo date('Y'); ?>
</footer>
<!--Audio File for dice noises-->
<audio id="diceroll-audio" src="diceroll.mp3" preload="auto"></audio>
<script src="dice.js"></script>
</body>
</html>
