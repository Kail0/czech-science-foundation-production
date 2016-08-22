<?php
/*********************************************************************************************

WP_Hooks - Enqueue Javascripts

*********************************************************************************************/
function kailoframework_header_init() {
    if (!is_admin()) {

	    wp_deregister_script( 'modernizr' );
	    wp_register_script( 'modernizr', get_template_directory_uri().'/library/js/modernizr-2.6.1.min.js');
	    wp_enqueue_script( 'modernizr' );

	    wp_enqueue_style('roboto-font', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700,100&subset=latin,latin-ext' );
		wp_enqueue_style('material-style', get_template_directory_uri().'/library/css/materialize.css' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style('material-gacr', get_template_directory_uri().'/library/css/material_gacr.css' );
		wp_enqueue_style('material-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );
		wp_enqueue_script('material-script', get_template_directory_uri().'/library/js/materialize.min.js', array(), '1.0', 'in_footer' );
		wp_enqueue_script('imhere', get_template_directory_uri().'/library/js/imhere.js', array(), '1.0', 'in_footer' );
		wp_enqueue_script('kailo_ticker', get_template_directory_uri().'/library/js/kailo_ticker.js', array(), '1.0', 'in_footer' );
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/library/font/font-awesome/css/font-awesome.min.css' );

}

}
add_action('init', 'kailoframework_header_init', 0);

/*********************************************************************************************

Favicon

*********************************************************************************************/
function kailoframework_custom_shortcut_favicon() {
	if (of_get_option('sc_custom_shortcut_favicon') != '') {
    echo '<link rel="shortcut icon" href="'. of_get_option('sc_custom_shortcut_favicon') .'" type="image/ico" />'."\n";
	}
	else { ?><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/library/images/ico/favicon.ico" type="image/ico" />
	<?php }
}
add_action('wp_head', 'kailoframework_custom_shortcut_favicon');

/*********************************************************************************************

Stats

*********************************************************************************************/
function kailoframework_analytics(){
	$output = of_get_option('sc_stats');
	if ( $output <> "" )
	echo stripslashes($output) . "\n";
}
add_action('wp_footer','kailoframework_analytics');
?>