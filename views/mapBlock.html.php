<!-- MAIN CONTENT -->
<div class="main-content full-height">
	<div class="fluid-container full-height">
		<div class="content-wrapper full-height">
			<!-- ABOUT -->
			<div class="full-height page-section" id="about">
				<div class="row full-height">
					<div class="col-md-12 full-height">
					<!-- Slider start -->
						<div id="g-map full-height" class="no-padding">
							<div class="container-fluid full-height">
								<div class="row full-height">
									<div class="map full-height" id="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- #about -->
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