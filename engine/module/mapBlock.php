<?php

/*
* mapBlock.php
* Map container rendering
*/

function getCity( $city ) {
	$data = __dbGet( __prepareSelectQuery( "city", "*", "short_name=" . $city) );
	$data = $data[0];
	return $data;
}

function mapBlock( $args ) {
	$args = json_decode( $args );
	$citydata = getCity( $args->city );
	$lon = $citydata[ "lon" ];
	$lat = $citydata[ "lat" ];
	$name = $citydata[ "name" ];
	return render( "mapBlock.html.php", null, array( "lon" => $lon, "lat" => $lat, "name" => $name ) );
}

?>