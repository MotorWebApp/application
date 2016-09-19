<?php

/*
* singleModule.php
* The file contains definition of single modules. Application controller.
*/

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

function loadCounterBlock() {

}

function getCity( $city ) {
	$data = __dbGet( __prepareSelectQuery( "city", "*", "short_name=" . $city ) );
	$data = $data[0];
	return $data;
}

function loadMap( $city ) {
	$citydata = getCity( $city );
	$lon = $citydata[ "lon" ];
	$lat = $citydata[ "lat" ];
	$name = $citydata[ "name" ];
	$array = array( "lon" => $lon, "lat" => $lat, "name" => $name );
	return addBlock( "mapBlock", $array );
}

function regUser( $phone, $mail, $pwd, $vkid, $name, $surname ) {
	$user = false; // error in case of false
	if( $vkid != null ) {
		__dbOp( __prepareInsertQuery( "user", array( "vkid" => $vkid, "name" => $name, "surname" => $surname ) ) );
		$d = __dbGet( __prepareSelectQuery( "user", "id", "vkid=" . $vkid ) );
		if( count( $d ) > 0 ) {
			$user = $data[0][ "id" ];
		}
	} elseif( $pwd != null && ( $mail != null || $phone != null ) ) {
	
	}
}

function getUserId( $phone, $mail, $pwd, $vkid ) {
	global $vk;
	$user = false;
	if( $vkid != null ) {
		$data = __dbGet( __prepareSelectQuery( "user", "id", "vkid=" . $vkid ) );
		if( count( $data ) > 0 ) {
			$user = $data[0][ "id" ];
		} else {
			$d = $vk->api( "account" );
			$name = $d[ "first_name" ];
			$surname = $d[ "last_name" ];
			$user = regUser( null, null, null, $vkid, $name, $surname );
		}
	} elseif ( $pwd != null && ( $mail != null || $phone != null ) ) {
	
	}
	return $user;
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
	global $vk, $vk_config $authorize_url;
	
	if ( isset( $_REQUEST[ 'code' ] ) ) {
		$access_token = $vk->getAccessToken( $_REQUEST[ 'code' ], $vk_config[ 'callback_url' ] );
		$sys_id = getUserId( null, null, null, $access_token['user_id'] );
		$_SESSION['userid'] = $access_token['user_id'];
		$_SESSION['access_token'] = $access_token['access_token'];
		header( $vk_config[ 'callback_url' ] );
	}
	
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
		$lk[1] = "";
		$lk[2] = "auth( event, '" . $authorize_url . "' )";
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
		"title" => "EngineCheck.ru", 
		"css" => array( 
			"normalize.css",
			"font-awesome.css",
			"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous",
			"templatemo-style.css",
			"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&subset=cyrillic	"), 
		"js" => array( 
			"vendor/modernizr-2.6.2.min.js",
			"https://api-maps.yandex.ru/2.1/?lang=ru_RU",
			"jquery.js",
			"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous",
			"siteengine.js"
			) 
		);
	return addBlock( "beginHtml", $array );
}

?>