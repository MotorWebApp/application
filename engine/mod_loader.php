<?php

/*
* mod_loader.php
* The purpose of the script is to load required modules.
* Functions defined in the module are called from dispatcher.php
*/ 

require_once( "singleModule.php" );
require_once( "moduleDB.php" );

function mainPage( $city = "msk" ) {
	require_once( __dir__ . '/../lib/VK.php' );
	require_once( __dir__ . '/../lib/VKException.php' );
	$html = loadPageHeader();
	$html .= loadHeader();
	$html .= loadMap( $city );
	$html .= addBlock( "authBlock" );
	$html .= addBlock( "latestNewsBlock", "dcjhd" );
	$html .= addBlock( "counterBlock", "dcjhd" );
	$html .= addBlock( "partnersBlock", "dcjhd" );
	$html .= addBlock( "footerLinksBlock", "dcjhd" );
	$html .= addBlock( "footerBlock", "dcjhd" );
	$html .= loadPageCloser();
	return html( $html );
}

function city() {
	$c = params('c');
	if( empty($c) ) {
		$c = "msk";
	}
	return mainPage( $c );
}

function anotherPage(){

}

?>