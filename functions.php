<?php
require_once('library/siteframework.php');		// core functions
require('theme-options.php');          			// theme options

// Add Editor box into PAGE and POST
add_action( 'add_meta_boxes', 'action_add_meta_boxes', 10, 2 );
function action_add_meta_boxes() {
	global $_wp_post_type_features;
	if (isset($_wp_post_type_features['post']['editor']) && $_wp_post_type_features['post']['editor']) {
		unset($_wp_post_type_features['post']['editor']);
		add_meta_box(
			'description_section',
			__('Editor'),
			'inner_custom_box',
			'post', 'normal', 'default'
		);
	}
	if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
		add_meta_box(
			'description_sectionid',
			__('Editor'),
			'inner_custom_box',
			'page', 'normal', 'default'
		);
	}
}



// Customize menu bar in admin toolbar
function inner_custom_box( $post ) {
	the_editor($post->post_content);
}
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );

if ( 0 != $user_id ) {
/* Add the "My Account" menu */
$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('Welcome, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';

$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );

}
}
/*********************************************************************************************
Register Custom Navigation Walker
*********************************************************************************************/
require_once('admin/inc/wp_md_pagination.php');
    ?>