$('document').ready(function(){

    let username_state = false;
    $('#username').on('blur', function(){
        let username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'username_check' : 1,
                'username' : username,
            },
            success: function(response){
                if (response == 'taken' ) {
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass("form_error");
                    $('#username').siblings("span").text('Sorry... Username already taken');
                }else if (response == 'not_taken') {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass("form_success");
                    $('#username').siblings("span").text('');
                    console.log('un_state: '+username_state);
                }
            }
        });
    });

    let pw_state = false;
    $('#password').on('keyup', function(){
        let pword = $('#password').val();
        if (pword == '') {
            pw_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'pw_check' : 1,
                'password' : pword,
            },
            success: function(response){
                if (response == 'incorrect' ) {
                    pw_state = false;
                    $('#password').parent().removeClass();
                    $('#password').parent().addClass("form_error");
                    $('#password').siblings("span").text('Sorry... Incorrect Password');
                } else if (response == 'correct') {
                    pw_state = true;
                    $('#password').parent().removeClass();
                    $('#password').parent().addClass("form_success");
                    $('#password').siblings("span").text('');
                    console.log('pw_state: '+pw_state);
                }
            }
        });
    });

    $('#bingo-button').mouseenter(function() {
        if (username_state == false || pw_state == false) {
            $('#error_msg').text('Fix the errors in the form first');
            console.log('Mouse Over')
        } else {
            console.log(username_state + pw_state)
            $('#error_msg').text('');
        }
    });


});