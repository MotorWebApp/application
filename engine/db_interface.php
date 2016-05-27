<?php

/*
* db_interface.php
* The purpose of this file is to make exchanges with MySQL database
*/

// DataBase connection
$pdo = new PDO( $dsn, $mysql_user, base64_decode( $mysql_password ), 
	array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);

// represents SELECT
// low level
function __dbGet( $sqlQuery ) {
	global $pdo;
	$data = $pdo->query( $sqlQuery )->fetchAll( PDO::FETCH_ASSOC );
	
	// error handling
	
	return $data;
}

// represents UPDATE and INSERT
// low level
function __dbOp( $sqlQuery ) {
	global $pdo;
	$stm = $pdo->prepare( $sqlQuery );
	$stm->execute();
	
	// error handling
}

function __prepareSelectQuery( $from, $what, $where ) {
	$from_parts = explode(",", $from);
	$from = "";
	$i = 1;
	foreach( $from_parts as $item ) {
		$from .= "`" . $item . "`";
		if( $i < count( $from_parts ) ) {
			$from .= ",";
		}
		$i++;
	}
	
	if( $what != "*" ) {
		$what_parts = explode(",", $what);
		$what = "";
		$i = 1;
		foreach( $what_parts as $item ) {
			$item_parts = explode( ".", $item );
			if( count( $item_parts ) == 2 ) {
				$item = "`" . $item_parts[ 0 ] . "`.`" . $item_parts[ 1 ] . "`";
				$what .= $item;
			} else {
				$what .= "`" . $item . "`";
			}
			if( $i < count( $what_parts ) ) {
				$what .= ",";
			}
			$i++;
		}
	}
	
	$where_parts = explode(",", $where);
	$where = "";
	$i = 1;
	foreach( $where_parts as $item ) {
		$item_parts = explode( "=", $item );
		if( count( $item_parts ) == 2 ) {
			$p = explode( ".", $item_parts[ 0 ] );
			if( count( $p ) == 2 ) {
				$item_parts[ 0 ] = "`" . $p[ 0 ] . "`.`" . $p[ 1 ] . "`";
			} else {
				$item_parts[ 0 ] = "`" . $item_parts[ 0 ] . "`";
			}
			$item = $item_parts[ 0 ] . "=" . $item_parts[ 1 ];
			$where .= $item;
		}
		if( $i < count( $where_parts ) ) {
			$where .= " AND ";
		}
		$i++;
	}
	
	$query = "SELECT " . $what . " FROM " . $from . " WHERE " . $where;
	return $query;
}

//print_r( __dbGet( __prepareSelectQuery( "company,company_type", "*", "company.type=1") ) );




















?>