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
            url: 'ajax/posts_list_ajax.php',
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#posts_list_data').html(data);
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

    $(document).on('click', '.post', async function() {

        var id = $(this).attr('data-id').trim();
        var action = $(this).attr('data-action').trim();

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
                      url: 'ajax/post_delete_ajax.php',
                      data: {
                          id: id
                      },
                      success: function(result) {
                          if (result.resultOK == true) {
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
