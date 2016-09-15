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



<script src="/views/js/vendor/jquery-1.10.2.min.js"></script>
<script src="/views/js/min/plugins.min.js"></script>
<script src="/views/js/min/main.min.js"></script>
<script>
ymaps.ready(init);
    var myMap;

    function init(){     
        myMap = new ymaps.Map("map", {
            center: [<? echo $lat; ?>, <? echo $lon; ?>],
            zoom: 7
        });
    }
</script>