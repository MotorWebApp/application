<?php

/*
* config.php
* Contains all neccessary configuration vars.
*/

###########
#	Section 0: base
###########
//$base_uri = 'http://test1.ru';
//option( 'base_uri', '/' );

###########
#	Section 1: database
###########
$pdo = "";
$dbhost = "mysql.hostinger.ru";
$dbport = "3306";
$dbname = "u738076346_main";
$username = "u738076346_root";
$password = "rX0FATjJZb";
$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};";

###########
#	Section 2: Vkontakte
###########
require_once( __dir__ . '/../lib/VK.php' );
require_once( __dir__ . '/../lib/VKException.php' );
$uri = "http://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]";
preg_match("^.*(\/[\-\.\w]+)+", $uri, $matches);
$uri = $matches[ 0 ];
$vk_config = array(
	'app_id'		=> '5631456',
	'api_secret'	=> '8skDiqK3C5KTVaqEkj9S',
	'callback_url'  => $uri,
	'api_settings'  => 'friends,account'
);
$vk = new VK\VK( $vk_config[ 'app_id' ], $vk_config[ 'api_secret' ] );
$authorize_url = $vk->getAuthorizeURL( $vk_config[ 'api_settings' ], $vk_config[ 'callback_url' ]);




?>