//For storing the original numbers on the board
let originalRandomNumbers = [];

//Array for the numbers being filled to avoid duplicates
let usedBingoNumbers = new Array(76);

//For storing the numbers selected on the board
let selectedBoardNumbers = [];

//Fills out the bingo board on the page load
window.onload = fillBoard;

//Selects the squares one by one to be filled
function fillBoard() {
    originalRandomNumbers.length = 0;
    for (let i = 0; i <= 23; i++) {
        setSquare(i);
    }
    storeBoard();
}

//Gives unique number to each square
function setSquare(thisSquare) {
    let currSquare = "square" + thisSquare;
    let colPlace = [0,1,2,3,4,0,1,2,3,4,0,1,3,4,0,1,2,3,4,0,1,2,3,4];
    let colBase = colPlace[thisSquare] * 15;
    let boxNumber;

    do {
        boxNumber = colBase + getBoxNumber() + 1;
    }
    while (usedBingoNumbers[boxNumber]);
        usedBingoNumbers[boxNumber] = true;
        document.getElementById(currSquare).innerHTML = boxNumber;
    //Adds selected number to the original number array
    originalRandomNumbers.push(boxNumber);
}

function getBoxNumber() {
    return Math.floor(Math.random() * 15);
}

//Empties used number array so all number are available, then refills the board
function newCard() {
    for (let i=1; i<usedBingoNumbers.length; i++) {
        usedBingoNumbers[i] = false;
    }
    fillBoard();
    bingoClear();
}

function clearBoard() {
    selectedBoardNumbers.length = 0;
    $('td').removeClass('checked-number');
    storeChecked();
}

function multiAirhorn() {
    const muiltiHorn = document.getElementById("multi-horn-audio");
    const newAudio = muiltiHorn.cloneNode();
    newAudio.play();
}

$('#clear-board').click(function() {
    clearBoard();
    bingoClear();
});

$('#new-board').click(function() {
    newCard();
    selectedBoardNumbers.length = 0;
    $('td').removeClass('checked-number');
});

$('#bingo-button').click(function() {
    bingoCall();
    multiAirhorn();
});

//If square isn't selected, adds class and number to array. Opposite if it is.
$('td').click(function () {
    if (!$(this).hasClass('checked-number')) {
        $(this).addClass('checked-number');
        let selectedNumber = $(this).html();
        selectedBoardNumbers.push(selectedNumber);
        storeChecked();
    } else {
        $(this).removeClass('checked-number');
        let selectedNumber = $(this).html();
        selectedBoardNumbers.splice( $.inArray(selectedNumber, selectedBoardNumbers), 1 );
        storeChecked();
    }
});

//Functions for saving board values to db

function storeBoard() {
    let boardNumbers = JSON.stringify(originalRandomNumbers);
    $.ajax(
        {
            url: 'game-update.php',
            method: 'POST',
            data: {
                storeboard: 1,
                boardnums: boardNumbers
            }

        });
}

function storeChecked() {
  let checkedNumbers = JSON.stringify(selectedBoardNumbers);
  $.ajax({
      url: 'game-update.php',
      method: 'POST',
      data: {
          storecheck: 1,
          gamenums: checkedNumbers
      }
    });
}

function bingoCall() {
    $.ajax({
        url: 'game-update.php',
        method: 'POST',
        data: {
            bingocall: 1,
        }
    });
}

function bingoClear() {
    $.ajax({
        url: 'game-update.php',
        method: 'POST',
        data: {
            bingoclear: 1,
        }
    });
}