<?php
/*
* header.php
* The module loads header template.
*/

function headerBlock( $args ) {
	$args = json_decode( $args );
	$menu = "";
	if( property_exists( $args, "menu" ) ) {
		foreach( $args->menu as $item ) {
			$menu .= "<li><a href=\"" . $item[ 1 ] . "\"  class=\"page-scroll\">" . $item[ 0 ] . "</a> </li>\n";
		}
	}
	return render( "pageHeader.html.php", null, array( "menu" => $menu ) );
}


?>