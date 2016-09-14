<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="fluid-container">
		<div class="content-wrapper">
			<!-- ABOUT -->
			<div class="page-section" id="about">
				<div class="row">
					<div class="col-md-12">
					<!-- Slider start -->
					<div id="g-map" class="no-padding">
						<div class="container-fluid">
							<div class="row">
								<div class="map" id="map"></div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- #about -->
		</div>
					<div class="row" id="footer">
						<div class="col-md-12 text-center">
							<p class="copyright-text">Copyright &copy; 2015 Company Name</p>
						</div>
					</div>

				</div>

			</div>
		</div>



<script src="js/vendor/jquery-1.10.2.min.js"></script>
<script src="js/min/plugins.min.js"></script>
<script src="js/min/main.min.js"></script>
<script>
var map = new google.maps.Map(document.getElementById("map"),{
	center: {lat: <? echo $lat; ?>, lng: <? echo $lon; ?>},
	zoom: 10
  });
</script>