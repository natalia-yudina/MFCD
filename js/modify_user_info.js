/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
$(document).ready(function() {

    load_data();

    function load_data(page) {
        $.ajax({
            url: 'ajax/user_list_ajax.php',
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        })
    }

    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("page_id");
        load_data(page);
    });

    $('.only_integers_allowed').on('keyup keypress', function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {} else {
            var letters = '1234567890';
            return (letters.indexOf(String.fromCharCode(e.which)) != -1);
        }
    });

    $(document).on('click', '.user', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();

        if (action == "edit") {
            $.ajax({
                type: 'post',
                url: 'ajax/user_record_ajax.php',
                data: 'id=' + id,
                success: function(response) {
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show');
                }
            });
        }

        if (action == "update") {

            var fullname = $('#fullname').val().trim();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var role_id = $('#role_id').val().trim();
            var role_string = $("#role_id option:selected").text();


            if ($('#isACompany').prop('checked')) {
                var isACompany = 1;
            } else {
                var isACompany = 0;
            }

            if (isACompany == 0) {
                var pIsACompany = "No";
            } else {
                var pIsACompany = "Yes";
            }

            pError = false;

            if (fullname == "") {
                $('#fullname_warning_message').html('Fullname should be filled');
                $("#fullname_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#fullname_warning_message").switchClass("d-block", "d-none");
            }

            if (email == "") {
                $('#email_warning_message').html('Email should be filled');
                $("#email_warning_message").switchClass("d-none", "d-block");
                pError = true;
            }
            // else if (year.length < 4 || year.length > 4) {
            //     $('#year_warning_message').html('[Year] should contain 4 digits');
            //     $("#year_warning_message").switchClass("d-none", "d-block");
            //     pError = true;
            // }
            else {
                $("#email_warning_message").switchClass("d-block", "d-none");
            }

            if (password == "") {
                $('#password_warning_message').html('Password should be filled');
                $("#password_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#password_warning_message").switchClass("d-block", "d-none");
            }

            if (role_id == "") {
                $('#role_id_warning_message').html('Role should be selected');
                $("#role_id_warning_message").switchClass("d-none", "d-block");
                pError = true;
            } else {
                $("#role_id_warning_message").switchClass("d-block", "d-none");
            }

            if (pError == true) {
                return false;
            }

            $.ajax({
                type: 'POST',
                url: 'ajax/user_update_ajax.php',
                data: {
                    id: id,
                    action: action,
                    fullname: fullname,
                    email: email,
                    password: password,
                    isACompany: isACompany,
                    role_id: role_id
                },
                success: function(result) {
                    if (result.resultOK == true) {
                        $('#recordFullname_' + id).html(fullname);
                        $('#recordEmail_' + id).html(email);
                        $('#recordPassword_' + id).html(password);
                        $('#recordIsACompany_' + id).html(pIsACompany);
                        $('#recordRole_' + id).html(role_string);                        
                        $('#myModal').modal('hide');
                    } else {
                        $("#message").switchClass("d-none", "d-block");
                        $('#message').html(result.message);
                    }
                }
            });
        }

        if (action == "delete") {
          Swal.fire({
              title: 'Are you sure you want to delete record with id:' + id + '?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.value) {

                  $.ajax({
                      type: 'POST',
                      url: 'ajax/user_delete_ajax.php',
                      data: {
                          id: id
                      },
                      success: function(result) {
                          if (result.resultOK == true) {
                              //document.location.href = "/?page=car"; //First option of removing element by refreshing all the page
                              $("#record_" + id).remove(); //Second option of removing element by removing an element with particular id
                              return false;
                          } else {

                          }
                      }
                  });

              }
          })

        }
    });

});
