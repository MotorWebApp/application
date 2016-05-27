<?php

/*
* mod_loader.php
* The purpose of the script is to load required modules.
* Functions defined in the module are called from dispatcher.php
*/ 

require_once( "singleModule.php" );
require_once( "moduleDB.php" );

function addBlock( $block, $args = array() ) {
	$modFileName = "/module/". $block . ".php";
	$response = "";
	if( file_exists( dirname(__file__) . $modFileName ) ) {
		include_once( dirname(__file__) . $modFileName );
		if( is_callable( $block ) ) {
			$response = $block( json_encode( $args ) );
		}
	}
	return $response;
}

function mainPage() {
	$html = loadPageHeader();
	$html .= loadHeader();
	$html .= loadMap();
	$html .= addBlock( "latestNewsBlock", "dcjhd" );
	$html .= addBlock( "counterBlock", "dcjhd" );
	$html .= addBlock( "partnersBlock", "dcjhd" );
	$html .= addBlock( "footerLinksBlock", "dcjhd" );
	$html .= addBlock( "footerBlock", "dcjhd" );
	$html .= loadPageCloser();
	return html( $html );
}

function anotherPage(){

}

function authBlock() {

}



?>