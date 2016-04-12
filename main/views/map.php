<?php
// include the configs / constants for the database connection
require_once ("/../login-classes/config/db.php");

// load the registration class
require_once ("geodata-class.php");

// create the geodata object.
//this object shows the gps coords from the user who is logged in
$geodata = new Geodata ();
?>

<!-- map -->
<div class="wrapper">
	<article class="container" id="top">
		<div class="row">
			<div class="12u 12u(mobile)">
				<header>
					<h1>Geo-Location-Map</h1>
				</header>
				<div class="12u">
					<form  method="post" action="index.php?site=map" name="mapform">
						<div>

							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="month" name="gps_date"  class="login_input"  value="<?php echo $geodata->get_month();  ?>" required />
								</div>
							</div>
											
							<div class="row 200%">
								<div class="12u">
									<ul class="actions">
										<li><input name="map_submit" type="submit" value="Monat ändern" /></li>
									</ul>
								</div>
							</div>
							
						</div>
					</form>
				</div>
				<div id="map_canvas"></div>
				<?php
				// show potential errors / feedback (from geodata object)
				if (isset ( $geodata )) {
					if ($geodata->errors) {
						foreach ( $geodata->errors as $error ) {
							echo $error;
						}
					}
					if ($geodata->messages) {
						foreach ( $geodata->messages as $message ) {
							echo $message;
						}
					}
				}
				?>
			</div>
		</div>
	</article>
</div>



<script src='http://maps.google.com/maps/api/js?sensor=false&.js'></script>
<script type="text/javascript">

			 
			function initialize(){

			       var center= new google.maps.LatLng(0,0);
			       var myOptions = {
			                zoom: 2,
			                center: center,
			                mapTypeControl: true,
			                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			                navigationControl: true,
			                mapTypeId: google.maps.MapTypeId.HYBRID
			       }     
			      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			    
			      var polylineCoordinates = [<?php echo $geodata->get_coordinates('5');?>];

				  var locations = [<?php echo $geodata->get_workplace_coords();?>];  

				  var triangleCoords = [<?php echo $geodata->get_workplace_coords_polygon();?>];
			      
			      var polyline = new google.maps.Polyline({
			          path: polylineCoordinates,
			          strokeColor: '#FF0000',
			          strokeOpacity: 1.0,
			          strokeWeight: 2,
			          editable: true
			      });

			      polyline.setMap(map);    

			      var bermudaTriangle = new google.maps.Polygon({
			        paths: triangleCoords,
			        strokeColor: '#949494',
			        strokeOpacity: 0.8,
			        strokeWeight: 2,
			        fillColor: '#CCCCCC',
			        fillOpacity: 0.35
			      });
			      bermudaTriangle.setMap(map);

			      
			      var bounds = new google.maps.LatLngBounds();
			      for (var i = 0; i < locations.length; i++) {
			        var coord = locations[i];
			        var myLatLng = new google.maps.LatLng(coord[0], coord[1]);
			        bounds.extend(myLatLng);
			      }
			      map.fitBounds(bounds);




			      
			}



			initialize();

			</script>
