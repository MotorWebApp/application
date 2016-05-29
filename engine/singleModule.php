<?php

/*
* singleModule.php
* The file contains definition of single modules.
*/

function loadCounterBlock() {

}

function loadMap( $city ) {
	$array = array( "city" => $city );
	return addBlock( "mapBlock", $array );
}

function loadHeader() {
	$array = array(
		"menu" => array(
			array( "Home", "#slider_part" ),
			array( "Services", "#service" )
		)
	);
	return addBlock( "headerBlock", $array );
}

function loadPageCloser() {
	return addBlock( "endHtml" );
}

function loadPageHeader() {
	$array = array( 
		"title" => "CheckEngine.ru", 
		"css" => array( 
			"bootstrap.min.css", 
			"font-awesome.min.css",
			"animate.css",
			"owl.carousel.css",
			"owl.theme.css",
			"prettyPhoto.css",
			"red.css",
			"custom.css",
			"responsive.css",
			"jquery.fancybox.css?v=2.1.5",
			"http://fonts.googleapis.com/css?family=Lato:400,300",
			"http://fonts.googleapis.com/css?family=Raleway:400,300,500"), 
		"js" => array( 
			"https://maps.googleapis.com/maps/api/js?sensor=false",
			"gmaps.js", ) );
	return addBlock( "beginHtml", $array );
}


?>