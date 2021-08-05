/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/

$(document).ready(function() {

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    // Logout in the maim menu
    var logoutLink = document.getElementById("logout_link");

    // logoutLink.addEventListener("click", function(event) {
    //   if (confirm("Do you really want to logout?")) return;
    //   event.preventDefault();
    // });

    // $('#submit_logout').click(function() {
    $('#logout_link').click(function() {
        $.ajax({
            type: 'POST',
            url: 'ajax/user_logout_ajax.php',
            data: 'sure=1',
            success: function(result) {
                if (result.resultOK == true) {
                  // //show the profile
                  //   // document.location.href = "./";
                  //   document.location.href = "./signin.php";

                    //show the main page
                    document.location.href = "./register.php";

                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
    });

    $('#submit_logout').click(function() {
    // $('#logout_link').click(function() {
        $.ajax({
            type: 'POST',
            url: 'ajax/user_logout_ajax.php',
            data: 'sure=1',
            success: function(result) {
                if (result.resultOK == true) {
                  // //show the profile
                  //   // document.location.href = "./";
                  //   document.location.href = "./signin.php";

                    //show the login page
                    document.location.href = "./signin.php";

                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
    });


    $('#submit_login').click(function() {

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var email = $('#email').val().trim();;
        var password = $('#password').val().trim();
        pError = false;

        if (email == "") {
            $('#email_warning_message').html('The email field must be filled');
            $("#email_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else if (!validateEmail(email)) {
            $('#email_warning_message').html('The email field must be valid');
            $("#email_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#email_warning_message").switchClass("d-block", "d-none");
        }

        if (password == "") {
            $('#password_warning_message').html('The password field must be filled');
            $("#password_warning_message").switchClass("d-none", "d-block");
            pError = true;
        } else {
            $("#password_warning_message").switchClass("d-block", "d-none");
        }

        // captcha check begin
        if (grecaptcha.getResponse() == '') {
            $("#message").switchClass("d-none", "d-block");
            $('#message').html("Robot verification failed, please try again");

            // return false;
            pError = true;
        }
        // captch check end

        if (pError == true) {
            return false;
        }

        $("#message").switchClass("d-block", "d-none");

        $.ajax({
            type: 'POST',
            url: 'ajax/user_login_ajax.php',
            data: $('.login_form').serialize(),
            success: function(result) {
                if (result.resultOK == true) {
                  // //show the profile
                  //   // document.location.href = "./";
                    // document.location.href = "./signin.php";
                  // document.getElementById("logout_link").style.display = "inline";
                    if (result.role_id == 1) {
                      document.location.href = "./modify_user.php";
                      document.getElementById("logout_link").style.display = "inline";
                    } else {
                    //show the main page
                    document.location.href = "./profile.php";

                  }
                } else {
                    $("#message").switchClass("d-none", "d-block");
                    $('#message').html(result.message);
                }
            }
        });
    });

});
