<?php
/**
 * boiler Custom Short Codes
 *
 * @package boiler
 */


function blue_button($atts, $content = null){
	extract (shortcode_atts(array(
		'link' => 'null',
		'width' => 'null',
	), $atts));
	
	if($width === 'full') {
		return "<div class='blue_border_button large_blue_border_button'><a href='$link'>".$content."</a></div>";
	} else {
		return "<div class='blue_border_button'><a href='$link'>".$content."</a></div>";
	}
}
add_shortcode('blue_button', 'blue_button');

?>