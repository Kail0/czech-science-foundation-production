<?php
/*********************************************************************************************

This theme uses wp_nav_menu() in one location.

*********************************************************************************************/
register_nav_menus(                      		// wp3+ menus
		array(
			'main_nav' => 'The Main Menu',   // main nav in header
		)
	);

function kailo_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'main_nav', /* menu name */
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
			'container' => 'div',
            'container_class' => 'aaa',
			'menu_class' => 'menu side-nav', /* menu class */
            'menu_id' => 'slide-out',
    		'fallback_cb' => 'kailo_main_nav_fallback', /* menu fallback */
            'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="mobile-header"><p>Menu</p></li>%3$s</ul>',
    	)
    );
}

// this is the fallback for header menu
function kailo_main_nav_fallback() {
	echo'<ul class="sf-menu">';
    wp_list_pages( 'title_li=&show_home=Home' );
	echo'</ul>';
}

?>