$('#updategames').on('click', function () {
    updateGames();
})

$('#clearbingos').on('click', function () {
    bingoClear();
    updateGames();
})

$( window ).on( "load", function() {
    updateGames();
});

function bingoClear() {
    $.ajax({
        url: 'reset-bingo.php',
        method: 'POST',
        data: {
            bingoclear: 1,
        }
    });

}

window.setInterval(function(){
    updateGames();
}, 4000);

function updateGames() {
    $.ajax({
        url: 'game-update.php',
        method: 'GET',
        dataType: 'JSON',
        success: function(response){
            let dbinfo = response.length;
            for (let i=0; i<dbinfo; i++) {
                let id = response[i].id;
                let player = response[i].player;
                let stringBoard = response[i].boardnums;
                let stringGame = response[i].gamenums;
                let called = response[i].calledbingo;
                //Turn strings back into JS arrays
                let boardnums = JSON.parse(stringBoard);
                let gamenums = JSON.parse(stringGame);

                cloneBoards();

                function cloneBoards() {
                    $('#player-game'+id).remove();
                    // get the example div with the id "#player-game"
                    let $gamediv = $('#original-game-board');

                    // Clone it and assign the new ID from the database
                    let $cloned = $gamediv.clone().prop('id', 'player-game'+id );

                    // Insert $cloned after example div
                    $gamediv.after( $cloned );
                    fillBoard();
                }

                // If bingo has been called, bingo called function

                if (called == 1) {
                    calledBingo();
                }

                //Fills board with player's current numbers
                function fillBoard() {
                    for (let i = 0; i <= 23; i++) {
                        setSquare(i);
                    }
                    fillName();
                    compareNums();
                }

                //Fills array numbers to each square
                function setSquare(thisSquare) {
                    let currSquare = "square" + thisSquare;
                    let boxNumber = boardnums[thisSquare];
                    $('#player-game'+id).find('#player-card').find('.'+currSquare).html(boxNumber);
                    console.log('#player-game'+id)
                }

                //Adds CSS class to people who've called bingo
                function calledBingo() {
                    $('#player-game'+id).addClass('called-bingo');
                }

                function fillName() {
                    $('#player-game'+id).find('.username').html(player);
                }

                function compareNums() {
                    let selNums = gamenums.length;
                    for (let i = 0; i < selNums; i++) {
                        gamenumsMatch(i);
                    }
                }
                function gamenumsMatch(thisnumMatch) {
                    let currentBoard = boardnums;
                    //Change type to Number for strict match in inArray
                    let matchNum = Number(gamenums[thisnumMatch]);
                    let matchedNum = $.inArray(matchNum, currentBoard);
                    if ( matchedNum >= 0 ) {
                        let matchedNum = $.inArray(matchNum, currentBoard);
                        $('#player-game'+id).find('#player-card').find('.square'+matchedNum).addClass('matched-number');
                    } else {
                        console.log('No Matches')
                    }
                }

                $('#player-game'+id).find('#checked-numbers').html(gamenums.toString());

            }
        }
    });
}