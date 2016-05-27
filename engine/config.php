<?php

/*
* config.php
* Contains all neccessary configuration vars.
*/

###########
#	Section 0: base
###########
$base_uri = 'http://test1.ru';
//option( 'base_uri', '/' );

###########
#	Section 1: database
###########
$mysql_host = "localhost";
$mysql_database = "motor";
$mysql_user = "root";//"db_admin";
$mysql_password = "";//"MTIzMTIzMTIz";
$dsn = "mysql:host=$mysql_host;dbname=$mysql_database;charset=utf8";



?>