//Array for storing all uncalled numbers
let uncalledNumbers = [];
const numRandoms = 76;

//Array for recently called numbers
let recentlyCalled = [];

function callBingoNumber() {
    // refill the array if needed
    if (!uncalledNumbers.length) {
        for (let i = 1; i < numRandoms; i++) {
            uncalledNumbers.push(i);
        }
    }

    let index = Math.floor(Math.random() * uncalledNumbers.length);
    let val = uncalledNumbers[index];

    //Variable for recently called numbers
    let calledNumVal = val;

    //Add letter to start of number for recently called
    if (calledNumVal <=15) {
        calledNumVal = ('B'+calledNumVal);
    } else if (calledNumVal >=16 && calledNumVal <=30) {
        calledNumVal = ('I'+calledNumVal);
    } else if (calledNumVal >=31 && calledNumVal <=45) {
        calledNumVal = ('N'+calledNumVal);
    } else if (calledNumVal >=46 && calledNumVal <=60) {
        calledNumVal = ('G'+calledNumVal);
    } else if (calledNumVal >=61 && calledNumVal <=75) {
        calledNumVal = ('O'+calledNumVal);
    }

    // now remove that value from the array
    uncalledNumbers.splice(index, 1);

    //Add new number to front of the recently called array
    recentlyCalled.unshift(calledNumVal);

    //If number is 69, sound the multi-horn immediately
    if (val === 69) {
        multiAirhorn();
    }

    $('.crnt-num').text(calledNumVal);
    return val;

}

//Update list of recently called numbers
function showRecentlyCalled() {
   let ul = document.createElement('ul');
    document.getElementById('last-calls').appendChild(ul);

    recentlyCalled.forEach(function (item) {
        let li = document.createElement('li');
        ul.appendChild(li);
        li.innerHTML += item;
    });

    if (recentlyCalled.length >= 5) {
        recentlyCalled.pop();
    }
}

//Empty all arrays and reset text and table to original state
function resetGame() {
    uncalledNumbers.length = 0;
    recentlyCalled.length = 0;
    $('.callNum').removeClass('called');
    $('.crnt-num').text('New Game');
    $( '#last-calls').empty().append('<ul><li>No Numbers Called</li></ul>');
    $('.next-number').prop('disabled', false);
}

//Calls the next number and adds style to data in table
function showNextNumber() {
    let newNum = callBingoNumber();
    $('.num-'+newNum).addClass('called');
}

function updateRecentlyCalled() {
    $( '#last-calls').empty();
    showRecentlyCalled();
}

//Game Control Buttons

$('.next-number').click(function() {
    showNextNumber();
    updateRecentlyCalled();
    //If there are no numbers left to call, disable the button
    $('.next-number').prop('disabled', uncalledNumbers.length === 0);
});

$('.reset-game').click(function() {
    resetGame();
});

//AIRHORN SFX & BUTTONS

function singleAirhorn() {
    const origAudio = document.getElementById("single-horn-audio");
    const newAudio = origAudio.cloneNode();
    newAudio.play();
}

function multiAirhorn() {
    const muiltiHorn = document.getElementById("multi-horn-audio");
    const newAudio = muiltiHorn.cloneNode();
    newAudio.play();
}

$('.single-horn').click(function () {
    singleAirhorn();
});

$('.multi-horn').click(function () {
    multiAirhorn();
});