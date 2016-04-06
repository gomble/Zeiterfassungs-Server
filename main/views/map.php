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
									<input type="month" name="gps_date"  class="login_input"  value="<?php echo date('Y')."-".date('m', strtotime('-1 month'));  ?>" required />
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

				

				
			       var center= new google.maps.LatLng(10.012869,76.328802);
			       var myOptions = {
			                zoom: 18,
			                center: center,
			                mapTypeControl: true,
			                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			                navigationControl: true,
			                mapTypeId: google.maps.MapTypeId.HYBRID
			       }     
			      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			    
			      var polylineCoordinates = [<?php echo $geodata->get_coordinates('5');?>];
			      
			      var polyline = new google.maps.Polyline({
			          path: polylineCoordinates,
			          strokeColor: '#FF0000',
			          strokeOpacity: 1.0,
			          strokeWeight: 2,
			          editable: true
			      });

			      polyline.setMap(map);    

			}

			    

			initialize();

			</script>
