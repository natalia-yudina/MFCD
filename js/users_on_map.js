/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
// $(document).ready(function() {
      function init() {

  // <script type="text/javascript">
	var mymap = L.map('#mapid').setView([-43.53062917044242, 172.63469696044922], 13);

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

		var marker = L.marker([-43.53062917044242, 172.63469696044922]).addTo(mymap);
		marker.bindPopup("");

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

			L.marker([-43.55, 172.63469696044922], {icon: greenIcon}).addTo(mymap);
			L.marker([-43.5306291704, 172.6346969604], {icon: greenIcon}).addTo(mymap);
			L.marker([-43.54, 172.599], {icon: greenIcon}).addTo(mymap);
	// </script>

  // load_data();
  //
  // function load_data(page) {
  //     $.ajax({
  //         url: 'ajax/users_on_map_ajax.php',
  //         method: "POST",
  //         data: {
  //             markers_arr: markers_arr
  //         },
  //         success: function(data) {
  //             $('#user_data').html(data);
  //         }
  //     })
  // }

// });
}
