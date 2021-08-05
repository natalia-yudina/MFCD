
$(document).ready(function() {
  var $orders = $('#orders');
  // $orders.delegate('.editProfile', 'click', function(){
    $('.editProfile').click(function() {
    var $li = $(this).closest('li');
    $li.find('input.name').val($li.find('span.name').html());
    $li.find('input.email').val($li.find('span.email').html());
    $li.find('input.home_lat').val($li.find('span.home_lat').html());
    $li.find('input.home_lon').val($li.find('span.home_lon').html());
    $li.addClass('edit');
    draggability();
  });

    $('.cancelEdit').click(function() {
      $(this).closest('li').removeClass('edit');
      draggability();
      updateLatLng($("#lat").text(),$("#lon").text(),1);
  });

  $('.saveEdit').click(function() {
    var $li = $(this).closest('li');
    var fullname = $li.find('input.name').val().trim();
    var email = $li.find('input.email').val().trim();
    // geo position
    var home_lat = $li.find('input.home_lat').val().trim();
    var home_lon = $li.find('input.home_lon').val().trim();
    var id = $(this).attr('data-id').trim();
    var p_info = {
      name: $li.find('input.name').val(),
      email: $li.find('input.email').val()
    };
    updateLatLng(home_lat,home_lon,1);
    draggability();

    // $.ajax ({
    //   type: 'POST',
    //   url:'',
    //   data: p_info,
    //   success: function(newOrder) {
    //     $li.find('span.name').html(p_info.name);
    //     $li.find('span.email').html(p_info.email);
    //     $li.removeClass('edit');
    //   },
    //   error: function() {
    //     alert('error updating order');
    //   }
    // });

    $.ajax({
        type: 'POST',
        url: 'ajax/profile_update_ajax.php',
        // url: '',
        data: {
            id: id,
            fullname: fullname,
            email: email,
            home_lat: home_lat,
            home_lon: home_lon
        },
        success: function(result) {
              // $li.find('span.name').html(p_info.name);
              // $li.find('span.email').html(p_info.email);
              $li.find('span.name').html(fullname);
              $li.find('span.email').html(email);
              $li.find('span.home_lat').html(home_lat);
              $li.find('span.home_lon').html(home_lon);
              // updateLatLng(document.getElementById('latitude').value,document.getElementById('longitude').value,1);
              // $('#recordFullname_' + id).html(fullname);
              // $('#recordFullname_' + id).html(fullname);
              $li.removeClass('edit');

            },
            error: function() {
              alert('error updating order');
            }
    });

});

});
