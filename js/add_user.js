/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
$(document).ready(function() {

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $('.only_defined_integers_allowed').on('keyup keypress', function(e) {
        var id = $(this).attr('id').trim();
        var val = $('#' + id).val().trim();

        if (id == 'year') {
            if (val.length > 3) {
                return false;
            }
        }
    });

    $(document).on('click', '.new_user', function() {

        var fullname = $('#fullname').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();

        pError = false;

        if (fullname == "") {
            $('#fullname_warning_message').html('Full name should be filled');
            $("#fullname_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#fullname_warning_message").switchClass("d-block", "d-none");
        }

        if (email == "") {
            $('#email_warning_message').html('Email should be filled');
            $("#email_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#email_warning_message").switchClass("d-block", "d-none");
        }

        if (password == "") {
            $('#password_warning_message').html('Password should be filled');
            $("#password_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#password_warning_message").switchClass("d-block", "d-none");
        }

        if (pError == true) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: 'ajax/user_add_ajax.php',
            data: {
                fullname: fullname,
                email: email,
                password: password
            },
            success: function(result) {
                if (result.resultOK == true) {


                    $('#fullname').val('');
                    $('#email').val('');
                    $('#password').val('');


                    Swal.fire(
                        'Congratulations!',
                        'Record has just been inserted',
                        'success'
                    )

                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
    });

});
