		<!-- Contact -->
			<div class="wrapper style4">
				<article id="contact" class="container 75%">
					<header>

					</header>
					<div>
						<div class="row">
							<div class="12u">

							</div>
						</div>
						<div class="row">
							<div class="12u">
								<hr />
								<h3></h3>

								<hr />
							</div>
						</div>
					</div>

					<footer>
						<ul id="copyright">
							<li>&copy; Leon Strack, Stefan Huhhn, Gökhan Balta</li>
						</ul>
					</footer>
				</article>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<?php 
			if ($site == 'buchungen') {
				echo"

					";
			}
			if ($site == 'map') {
				echo"<script src='http://maps.google.com/maps/api/js?sensor=false&.js'></script>";
				echo"<script src='assets/js/googlemaps.js'></script>";
			}
			
			
			
			?>
	</body>
</html>