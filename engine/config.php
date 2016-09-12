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

$dbhost = "mysql.hostinger.ru";//aamlwu9v9zbeuw.cdxd25ix2ffo.us-west-2.rds.amazonaws.com";
$dbport = "3306";
$dbname = "u738076346_main";//$_SERVER['RDS_DB_NAME'];
$username = "u738076346_root";//$_SERVER['RDS_USERNAME'];
$password = "rX0FATjJZb";//$_SERVER['RDS_PASSWORD'];


$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};";

?>