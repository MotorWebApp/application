<?php

/*
* beginHtml.php
* Creates HTML document header.
*/

# args - array of:
# 	title
# 	css
# 	js
function beginHtml( $args ) {
	$args = json_decode( $args );
	$title = "";
	$css = "";
	$js = "";
	if( property_exists( $args, "title" ) ) {
		$title = "<title>" . $args->title . "</title>";
	}
	if( property_exists( $args, "css" ) ) {
		foreach( $args->css as $stylesheet ) {
			if( ( strpos( $stylesheet, "http://" ) === false ) && ( strpos( $stylesheet, "https://" ) === false ) ) {
				$stylesheet = "views/css/" . $stylesheet;
			}
			$css .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $stylesheet . "\" />\n";
		}
	}
	if( property_exists( $args, "js" ) ) {
		foreach( $args->js as $script ) {
			if( ( strpos( $script, "http://" ) === false ) && ( strpos( $script, "https://" ) === false ) ) {
				$script = "views/js/" . $script;
			}
			$js .= "<script type=\"text/javascript\" src=\"" . $script . "\" ></script>\n";
		}
	}
	
	return render( "htmlDocHeader.html.php", null, array( "title" => $title, "css" => $css, "js" => $js ) );
}
?>