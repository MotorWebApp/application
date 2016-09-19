<?php

/*
* mapBlock.php
* Map container rendering
*/


function mapBlock( $args ) {
	$args = json_decode( $args );
	return render( "mapBlock.html.php", null, $args );
}

?>