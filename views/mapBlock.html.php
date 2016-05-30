<!-- Team MEmber Start -->
<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title"><b>Фильтр - <? echo $name; ?></b></h3>
                    <h3 class="feature_title"><i class="fa fa-angle-double-down fa-3x fw"></i></h3>
                </div>
            </div>  <!-- Col-md-12 End -->

            
        </div>
    </div> <!-- Conatiner Team end -->
    <!-- </div> -->

</section>  <!-- Section TEam End -->


 <!-- Slider start -->
 <div id="g-map" class="no-padding">
	<div class="container-fluid">
		<div class="row">
			<div class="map" id="map"></div>
		</div>
	</div>
</div>


<script>
var map = new google.maps.Map(document.getElementById("map"),{
    center: {lat: <? echo $lat; ?>, lng: <? echo $lon; ?>},
    zoom: 10
  });
</script>