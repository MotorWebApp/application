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
$pdo = "";
$dbhost = $_SERVER['RDS_HOSTNAME'];
$dbport = $_SERVER['RDS_PORT'];
$dbname = $_SERVER['RDS_DB_NAME'];

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname}";
$username = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];




?>