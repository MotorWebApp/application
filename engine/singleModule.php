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
	
	
	$vk_config = array(
		'app_id'		=> '5631456',
		'api_secret'	=> '8skDiqK3C5KTVaqEkj9S',
		'callback_url'  => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";,
		'api_settings'  => 'friends' // In this example use 'friends'.
	);
	
	$vk = new VK\VK( $vk_config[ 'app_id' ], $vk_config[ 'api_secret' ] );

	if ( !isset( $_REQUEST[ 'code' ] ) ) {
		$$authorize_url = $vk->getAuthorizeURL( $vk_config[ 'api_settings' ], $vk_config[ 'callback_url' ]);
	} else {
		$access_token = $vk->getAccessToken( $_REQUEST[ 'code' ], $vk_config[ 'callback_url' ] );
		echo $access_token;
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
		$lk[1] = "#";
		$lk[2] = "auth( '" . $authorize_url . "' )";
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