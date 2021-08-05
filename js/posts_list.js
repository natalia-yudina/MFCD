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
              url: 'ajax/posts_ajax.php',
              method: "POST",
              data: {
                  page: page
              },
              success: function(data) {
                  $('#post_data').html(data);
              }
          })
      }

      $(document).on('click', '.pagination_link', function() {
          var page = $(this).attr("page_id");
          load_data(page);
      });


});
