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
	/*
	 * params:
	 * 	menu:
	 *		0 - menu item name
	 *		1 - href
	 *		2 - js onclick() function
	 *		3 - array of subitems
	*/
	$authorized = false;
	if( isset( $_SESSION['userid'] ) ) {
		$authorized = true;
	}
	$lk = array();
	if( $authorized ) {
		$lk[0] = $_SESSION[ 'username' ];
		$lk[1] = "/lk";
		$lk[2] = "";
		$lk[3] = array(); //there will be subitems
	} else {
		$lk[0] = "Войти";
		$lk[1] = "#";
		$lk[2] = "auth()";
	}
	$array = array(
		"menu" => array(
			array( "Home", "#slider_part" ),
			array( "Services", "#service" ),
			$lk
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
			"normalize.css",
			"font-awesome.css",
			"bootstrap.min.css",
			"templatemo-style.css",
			"http://fonts.googleapis.com/css?family=Lato:400,300",
			"http://fonts.googleapis.com/css?family=Raleway:400,300,500"), 
		"js" => array( 
			"vendor/modernizr-2.6.2.min.js",
			"https://maps.googleapis.com/maps/api/js?sensor=false",
			"gmaps.js", 
			"siteengine.js"
			) 
		);
	return addBlock( "beginHtml", $array );
}

?>