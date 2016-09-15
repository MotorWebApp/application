<?php
/*
* header.php
* The module loads header template.
*/

function headerBlock( $args ) {
	$args = json_decode( $args );
	$menu = "";
	if( property_exists( $args, "menu" ) ) {
		$menu = addMenu( $args->menu );
	}
	return render( "pageHeader.html.php", null, array( "menu" => $menu ) );
}

function addMenu($items, $menu) {
	foreach( $items as $item ) {
		$name = isset($item[0]) ? $item[0] : "";
		$href = isset($item[1]) ? $item[1] : "";
		$onclick = isset($item[2]) ? $item[2] : "";
		$subs = "";
		if(isset($item[3]) && count($item[3]) > 0) {
			$subs = addMenu($item[3],"");
		}
		$menu .= "<li><a href=\"" . $href . "\" onclick=\"" . $onclick . "\" class=\"page-scroll\">" . $name . "</a>" . $subs . "</li>\n";
	}
	return $menu;
}



?>