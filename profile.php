<?php
/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
?>

<?php
	session_start();
   include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";
?>

<!DOCTYPE html>
<html>

<?php
$page_title = "Profile";
include "head.php" ?>
<!-- <body onLoad="javascript:init();"> -->
<body>
  <!-- header from header.html -->
  <?php
	$img_source = "images/HeaderTop2.png";
  include "header.php"
  ?>

  <div class="container">

  </div>

  <main class="container">

        <?php
        if (isset($_SESSION['role_id'])) {

        ?>

          <!-- <div class="row justify-content-center">
            <div class="col-md-2">
              <div class="card-body">
                <button type="button" id="submit_logout" class="btn btn-primary">
                  Logout
                </button>
              </div>
            </div>
          </div> -->

          <?php
          }
          ?>
<div class="row">


<div class="col-md order-md-last">
	<h5>Nearest users:</h5>
		<!-- <div id="mapid" style="width: 600px; height: 400px;"></div> -->
		<div id="mapid" class="content_map"></div>
</div>
<div class="col-md">
									<!-- Notes: ".$_SESSION['notes']."<br> -->
	<div>

			<?php
				if (isset($_SESSION['user_id'])) {

					// echo "
					//
					// <div class='container'>
					// 	<div class='row'>
					// 		<div class='col-8'>
					// 		<h4>
					// 		Current user: ".$_SESSION['fullname']."<br><br>
					// 		</h4>
					// 			<h3 >
					// 				Role: ".$_SESSION['role']."<br><br>
					//
					// 			</h3>
					//
					// 			<div class='button-wrapper'>
					// 				 <a href='test.php' class='btn btn-secondary col-12 mt-3'> Add an announcement</a>
					// 			</div>
					// 		</div>
					// 		<div class='col-4'>
					//
					// 		</div>
					// 	</div>
					//  </div>
					//
					// ";

					echo "

					<div class='container'>
						<div class='row'>
							<div class='col-8'>
							<ul id='orders'></ul>
							<li id='personalInfo'>
							<p>
							  <strong>Name:</strong>
							  <span class='noedit name'>".$_SESSION['fullname']."</span>
							  <input class='edit name' type='text'>
							</p>
							<p>
							  <strong>Email:</strong>
							  <span class='noedit email'>".$_SESSION['email']."</span>
							  <input class='edit email' type='text'>
							</p>
							<p>
							  <strong>My position</strong>
								<br>
								<label for='latitude'>Latitude:</label>
							  <span class='noedit home_lat' id='lat'>".$_SESSION['home_lat']."</span>
							  <input class='edit home_lat' id='latitude' type='text'>
								<br>
								<label for='longitude'>Longitude:</label>
								<span class='noedit home_lon' id='lon'>".$_SESSION['home_lon']."</span>
							  <input class='edit home_lon' id='longitude' type='text'>
							</p>
							<button class='editProfile noedit btn btn-info'>Edit</button>
							<button class='saveEdit edit btn btn-success' data-id='".$_SESSION['user_id']."'>Save</button>
							<button class='cancelEdit edit btn btn-dark'>Cancel</button>
							</li>

								<div class='button-wrapper'>
									 <a href='test.php' class='btn btn-primary col-12 mt-3'> Add an announcement</a>
								</div>
							</div>
							<div class='col-4'>

							</div>
						</div>
					 </div>

					";

				}
			?>
	 </div>
</div>
</div>


</main>
  <!-- footer from header.html -->
  <?php include "footer.html" ?>


</body>
  <?php include "files.php" ?>

	<script type="text/javascript">
	var rememberLat = $("#lat").text();
	var rememberLong = $("#lon").text();
	var mymap = L.map('mapid').setView([rememberLat, rememberLong], 13);

		// L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		// 	maxZoom: 18,
		// 	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
		// 		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		// 	id: 'mapbox/streets-v11',
		// 	tileSize: 512,
		// 	zoomOffset: -1
		// }).addTo(mymap);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(mymap);

		// L.marker([51.5, -0.09]).addTo(mymap);
		// var popup = L.popup({
		// 	maxWidth:400
		// })
		// .setLatLng([-43.53062917044242, 172.63469696044922])
		// .setContent('fhfhfh')
		// .openOn(mymap);

// 6-04-2021
		// var marker = L.marker([-43.53062917044242, 172.63469696044922],{draggable: true}).addTo(mymap);
		// marker.bindPopup("");
		//
		// var popup = L.popup();
		//
		// function onMapClick(e) {
		//     popup
		//         .setLatLng(e.latlng)
		//         .setContent("You clicked the map at " + e.latlng.toString())
		//         .openOn(mymap);
		// }
		//
		// mymap.on('click', onMapClick);


		// var rememberLat = document.getElementById('latitude').value;
		// var rememberLong = document.getElementById('longitude').value;


		// var marker = L.marker([rememberLat, rememberLong],{draggable: true}).addTo(mymap);
		var marker = L.marker([rememberLat, rememberLong]).addTo(mymap);
		marker.bindPopup("My position");
		marker.on('dragend', function (e) {
			updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
		});
		// mymap.on('click', function (e) {
		// marker.setLatLng(e.latlng);
		// updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
		// });
		function updateLatLng(lat,lng,reverse) {
		if(reverse) {
		marker.setLatLng([lat,lng]);
		mymap.panTo([lat,lng]);
		} else {
		document.getElementById('latitude').value = marker.getLatLng().lat;
		document.getElementById('longitude').value = marker.getLatLng().lng;
		mymap.panTo([lat,lng]);
		}
	};

// Toggle Marker draggability
function draggability() {

		  // Toggle Marker draggability.
		  marker.remove();
		  marker.options.draggable = !marker.options.draggable;
		  marker.addTo(mymap);
		};
// 6-04-2021
		// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

		var LeafIcon = L.Icon.extend({
			options: {
				shadowUrl: 'images/marker-shadow.png'
				// ,
				// iconSize:     [38, 95],
				// shadowSize:   [50, 64],
				// iconAnchor:   [22, 94],
				// shadowAnchor: [4, 62],
				// popupAnchor:  [-3, -76]
			}
		});

			var greenIcon = new LeafIcon({iconUrl: 'images/marker-green.png'});

<?php
$id = $_SESSION['user_id'];
include 'users_on_map_ajax.php';
// include 'ajax/test_ajax.php';
?>

			// L.marker([-43.55, 172.63469696044922], {icon: greenIcon}).addTo(mymap);
			// L.marker([-43.5306291704, 172.6346969604], {icon: greenIcon}).addTo(mymap);
			// L.marker([-43.54, 172.599], {icon: greenIcon}).addTo(mymap);
			// L.marker([lat, lon], {icon: greenIcon}).addTo(mymap);

	</script>
	<?php include "files.php" ?>
	  <script src="js/edit_profile.js"></script>
	  <!-- <script src="js/users_on_map.js"></script> -->
</html>
