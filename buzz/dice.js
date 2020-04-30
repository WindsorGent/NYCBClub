//Three Man Starts Here
let threeManDice = [];
let threeManDiceCont = 'Roll the Dice';

//Three Man Dice Roll

function threeManRoll() {
    emptythreeMan();
    for (let i = 0; i < 2; i++) {
        let diceNum = diceRoll();
        threeManDice.push(diceNum);
    }
    displaythreeMan();
}

function emptythreeMan() {
    threeManDice.length = 0;
    threeManDiceCont = '';
}

function displaythreeMan() {
    threeManDice.forEach(function(threeManDice) {
        threeManDiceCont += '<li>'+ threeManDice + '</li>';
    });
    document.getElementById("threeman-dice").innerHTML = threeManDiceCont;
}

$('.roll-threemandice').click(function() {
    threeManRoll();
    diceRollNoise();
    console.log('DICE:'+threeManDice);
});

//Three Man Finished Here
//Cee-Lo Starts Here
let ceeloDice1 = [];
let ceeloDiceCont1 = 'Roll the Dice';
let ceeloDice2 = [];
let ceeloDiceCont2 = 'Roll the Dice';

//Player 1 Dice Set

function ceelo1() {
    emptyCeelo1();
    for (let i = 0; i < 3; i++) {
        let diceNum = diceRoll();
        ceeloDice1.push(diceNum);
    }
    displayCeelo1();
}

function emptyCeelo1() {
    ceeloDice1.length = 0;
    ceeloDiceCont1 = '';
}

function displayCeelo1() {
    ceeloDice1.forEach(function(ceeloDice1) {
        ceeloDiceCont1 += '<li>'+ ceeloDice1 + '</li>';
    });
    document.getElementById("plyr1").innerHTML = ceeloDiceCont1;
}

//Player 2 Dice Set

function ceelo2() {
    emptyCeelo2();
    for (let i = 0; i < 3; i++) {
        let diceNum = diceRoll();
        ceeloDice2.push(diceNum);
    }
    displayCeelo2();
}

function emptyCeelo2() {
    ceeloDice2.length = 0;
    ceeloDiceCont2 = '';
}

function displayCeelo2() {
    ceeloDice2.forEach(function(ceeloDice1) {
        ceeloDiceCont2 += '<li>'+ ceeloDice1 + '</li>';
    });
    document.getElementById("plyr2").innerHTML = ceeloDiceCont2;
}

function diceRoll() {
    return 1 + Math.floor(Math.random()*6);
}

$('.roll-dice1').click(function() {
    ceelo1();
    diceRollNoise();
    console.log('DICE1:'+ceeloDice1);
});

$('.roll-dice2').click(function() {
    ceeloDice2.length = 0;
    ceelo2();
    diceRollNoise();
    console.log('DICE2:'+ceeloDice2);
});
//Cee-Lo Finishes Here
//Nav Buttons

$('.ceelo-btn').click(function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
    $('#ceelo').show();
    $('#threeman').hide();
});

$('.threeman-btn').click(function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
    $('#ceelo').hide();
    $('#threeman').show();
});

//Dice Roll Noise
function diceRollNoise() {
    const origAudio = document.getElementById("diceroll-audio");
    const newAudio = origAudio.cloneNode();
    newAudio.play();
}