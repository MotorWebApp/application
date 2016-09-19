<?php

/*
* mapBlock.php
* Map container rendering
*/


function mapBlock( $args ) {
	$args = json_decode( $args );
	return render( "mapBlock.html.php", null, array( "lon" => $args->lon, "lat" => $args->lat, "cityname" => $args->name ) );
}

?>