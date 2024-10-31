<?php
/*
Plugin Name: Series.ly Widget
Plugin URI: http://www.prosoparidas.com/lab/sly-widget/
Description: Inserta fichas de películas, series, programas y documentales en tu blog
Version: 1.0
Author: ProsoLAB
Author URI: http://www.prosoparidas.com/lab/
*/
 
# Widget para Wordpress
function sly_create_widget(){    
    include_once(plugin_dir_path( __FILE__ ) . '/includes/widget.php');
    register_widget('sly_widget');
}
add_action('widgets_init','sly_create_widget'); 

# Insertar desde editor
function sly_create_editor($atts) {
	// Ejemplo -----> [sly-widget q="Breaking Bad" size="0" border="0"]
    extract(shortcode_atts(array(
        'q' => 'Breaking Bad',
		'size' => 0,
		'border' => 0
    ), $atts));
	
	$sly_width = "350";
	$sly_height = "149";
	if ($size == 1) {
		$sly_width = "350";
		$sly_height = "40";
	}
	if ($size == 2) {
		$sly_width = "200";
		$sly_height = "200";
	}
	
	$sly_border = "";
	if ($border == 1) {
		$sly_border = ' style="border: 2px solid rgb(10, 81, 161)"';
	}
	if ($border == 2) {
		$sly_border = ' style="border: 5px solid rgb(10, 81, 161)"';
	}
	
    return '<p><center><iframe src="http://www.prosoparidas.com/lab/sly-widget/search.php?q=' . $q . '&size=' . $size . '" width="' .  $sly_width . '" height="' . $sly_height . '" frameborder="0" scrolling="no"' . $sly_border . '></iframe></center></p>';
}
add_shortcode('sly-widget', 'sly_create_editor');

add_action('init', 'sly_buttons');
function sly_buttons() {
    add_filter("mce_external_plugins", "sly_add_buttons");
    add_filter('mce_buttons', 'sly_register_buttons');
}
function sly_add_buttons($plugin_array) {
    $plugin_array['sly'] = plugins_url('includes/buttons.js' , __FILE__);
    return $plugin_array;
}
function sly_register_buttons($buttons) {
    array_push($buttons, 'slywidget');
    return $buttons;
}
?>