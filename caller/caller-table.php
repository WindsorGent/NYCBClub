<div class="current-number">
    <h2>Last Call:</h2>
    <h3 class="crnt-num">New Game</h3>
</div>
<div class="caller-numbers">

    <table class="caller-board">
        <?php
        $bingoNum = 1;
        ?>
        <tr>
            <td class="bingo-letter">B</td>
            <?php while ($bingoNum <= 15) {
                echo '<td class="callNum num-'.$bingoNum.'">'. $bingoNum . '</td>';
                $bingoNum ++;
            }
            ?>
        </tr>
        <tr>
            <td class="bingo-letter">I</td>
            <?php while (($bingoNum >= 16) && ($bingoNum <= 30)) {
                echo '<td class="callNum num-'.$bingoNum.'">'. $bingoNum . '</td>';
                $bingoNum ++;
            }
            ?>
        </tr>
        <tr>
            <td class="bingo-letter">N</td>
            <?php while (($bingoNum >= 31) && ($bingoNum <= 45)) {
                echo '<td class="callNum num-'.$bingoNum.'">'. $bingoNum . '</td>';
                $bingoNum ++;
            }
            ?>
        </tr>
        <tr>
            <td class="bingo-letter">G</td>
            <?php while (($bingoNum >= 46) && ($bingoNum <= 60)) {
                echo '<td class="callNum num-'.$bingoNum.'">'. $bingoNum . '</td>';
                $bingoNum ++;
            }
            ?>
        </tr>
        <tr>
            <td class="bingo-letter">O</td>
            <?php while (($bingoNum >= 61) && ($bingoNum <= 75)) {
                echo '<td class="callNum num-'.$bingoNum.'">'. $bingoNum . '</td>';
                $bingoNum ++;
            }
            ?>
        </tr>
    </table>
</div>
<p><strong>Last Called:</strong></p>
<div id="last-calls">
<ul><li>No Numbers Called</li></ul>
</div>
<div>
    <button class="next-number">Next Number</button>
</div>
<div class="SFX">
    <button class="single-horn">Single</button>
    <button class="multi-horn">Multi</button>
</div>
<div>
    <button class="reset-game">Reset Game</button>
</div>