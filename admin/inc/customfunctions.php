<?php
/*********************************************************************************************

Set Max Content Width

*********************************************************************************************/
if ( ! isset( $content_width ) ) $content_width = 700;

/*********************************************************************************************

If 3.1 isn't installed display a notice that post type archives will not work

*********************************************************************************************/
function kailoframework_archive_nag(){
    global $pagenow;
    if ( $pagenow == 'themes.php' ) {
         echo '<div class="updated"><p>';
		 _e('Portfolio archive pages will only display in WordPress 3.1 or above.  Please upgrade.', 'kailoframework');
		 echo '</p></div>';
    }
}

if ( get_bloginfo('version') < 3.1 ) {
	add_action('admin_notices', 'kailoframework_archive_nag');
}


/*********************************************************************************************

Adds a body class to indicate sidebar position

*********************************************************************************************/
function kailoframework_body_class($classes) {
	$layout = of_get_option('layout','layout-2cr');
	$classes[] = $layout;
	return $classes;
}

add_filter('body_class','kailoframework_body_class');


/*********************************************************************************************

Add Theme Support

*********************************************************************************************/
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_editor_style('editor_style.css');

/*********************************************************************************************

Post & Page Thumbnails Support

*********************************************************************************************/
add_theme_support( 'post-thumbnails' );
  // add_image_size( 'page-header', 1020, 142, true ); // Page Header
  // add_image_size( 'logo', 250, 86, true );
  // add_image_size( 'page-width', 700, 500, true );
  add_image_size( 'square', 500, 500, true );
  add_image_size( 'card-header', 892, 250, true ); // Page Header


/*********************************************************************************************

Hook Image size option into Media Library

*********************************************************************************************/
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'card-header' => __( 'Card Header' ),
        'square' => __( 'Square dimension' ),
    ) );
}

/*********************************************************************************************

Remove and Reformat Admin Footer

*********************************************************************************************/
function remove_footer_admin () {

  $themename = get_theme_data(get_stylesheet_directory() . '/style.css');
  $version = "version ".$themename['Version'];
  $themename = $themename['Name'];

    echo "<b><a href=http://kailo.photography target=_blank>$themename - $version</a></b> - Carefully crafted with WordPress, HTML5 + CSS3 and Material Design by Google. | <a href=http://kailo.photography target=_blank>Antonin Bousek. All rights reserved.</a> ";
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*********************************************************************************************

Theme Contents Format

*********************************************************************************************/
function theme_content() {
        $content = get_the_content();
        $content = strip_tags($content, '<a><strong><em><b><i><embed><object>');
        $content = preg_replace('/\[.+\]/','', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}



/*********************************************************************************************

Catch First Image

*********************************************************************************************/
function wp_catch_first_image($image_size = '',$return_empty = false) {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
      if(empty($first_img) && $return_empty == false){
            if($image_size == 's') {
                    $first_img = get_template_directory_uri()."/images/thumb_small.jpg";
            }
            else if($image_size == 'm') {
                    $first_img = get_template_directory_uri()."/images/thumb_medium.jpg";
            }
            else if($image_size == 'l') {
                    $first_img = get_template_directory_uri()."/images/thumb_large.jpg";
            }
            else {
                    $first_img = get_template_directory_uri()."/images/default.jpg";
            }
    }

    return $first_img;
}


/*********************************************************************************************

Author Related Posts

*********************************************************************************************/
function get_related_author_posts() {
    global $authordata, $post;
    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post_not_in' => array( $post->ID ), 'posts_per_page' => 10 ) );
    $output = '<ul>';
    foreach ( $authors_posts as $authors_post ) {
        $output .= '<li> <a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
    }
    $output .= '</ul>';
    return $output;
}

/*********************************************************************************************

Enable Threaded Comments

*********************************************************************************************/
function enable_threaded_comments(){
if (!is_admin()) {
     if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
          wp_enqueue_script('comment-reply');
     }
}

add_action('get_header', 'enable_threaded_comments');



function wpthemess_content_nav() {
	global $wp_query;
	if (  $wp_query->max_num_pages > 1 ) :
		if (function_exists('wp_pagenavi') ) {
			wp_pagenavi();
		} else { ?>
        	<nav id="nav-below">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'kailoframework' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'kailoframework' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'kailoframework' ) ); ?></div>
			</nav><!-- #nav-below -->
    	<?php }
	endif;
}

/*********************************************************************************************

WP MU IMAGE SUPPORT

*********************************************************************************************/
function get_image_url() {
    $theImageSrc = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    global $blog_id;
    if (isset($blog_id) && $blog_id > 0) {
        $imageParts = explode('/files/', $theImageSrc);
        if (isset($imageParts[1])) {
            $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
        }
    }
    echo $theImageSrc;
}

/*********************************************************************************************

WP MU CUSTOM META IMAGE SUPPORT

*********************************************************************************************/
function get_image_path($cutommeta_image) {
$theImageSrc1 = $cutommeta_image;
global $blog_id;
if (isset($blog_id) && $blog_id > 0) {
    $imageParts = explode('/files/', $theImageSrc1);
    if (isset($imageParts[1])) {
        $theImageSrc1 = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
    }
}
return $theImageSrc1;
}

/*********************************************************************************************

COMMENT LAYOUT

*********************************************************************************************/
function kailoframework_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='40',$default='<path_to_url>' ); ?>

        <div class="authormeta">
          <h3 class="comment-author"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></h3>
          <span class="datetime">
           <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
          </span>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
        </div>
			</header>

			<div class="comment-text">
				<?php comment_text() ?>
			</div>
      <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.','kailoframework') ?></em>
      <?php endif; ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/*********************************************************************************************

SEARCH FORM LAYOUT

*********************************************************************************************/
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );
/*********************************************************************************************

DELETE PARAGRAPH TAGS on PAGE

*********************************************************************************************/
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

/*********************************************************************************************

REGISTER SIDEBAR ON HOMEPAGE

*********************************************************************************************/
function custom_sidebar() {

  $args = array(
    'id'            => 'homepage',
    'name'          => __( 'Homepage', 'text_domain' ),
    'description'   => __( 'Widgets on the homepage', 'text_domain' ),
    'before_title'  => '<h5 class="widget-title">',
    'after_title'   => '</h5>',
    'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside></div>',
  );
  register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebar' );

// Register Sidebars
function sidebar_widget_button() {

  $args = array(
    'id'            => 'homepage-button',
    'name'          => __( 'Homepage Button', 'text_domain' ),
    'description'   => __( 'Buttons for specific items', 'text_domain' ),
    'before_title'  => '<h5 class="widget-title">',
    'after_title'   => '</h5>',
    'before_widget' => '<a class="waves-effect waves-light btn-large gacr-blue">',
    'after_widget'  => '</a>',
  );
  register_sidebar( $args );

}
add_action( 'widgets_init', 'sidebar_widget_button' );

/*********************************************************************************************

STYLE RECENT POST ON HOMEPAGE

*********************************************************************************************/
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

  function widget($args, $instance) {

    extract( $args );

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

    if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                                                        'posts_per_page' => 5,
                                                        'no_found_rows' => true,
                                                        'cat' => '17',
                                                        'post_status' => 'publish',
                                                        'ignore_sticky_posts' => true
                                                        ) ) );
    if( $r->have_posts() ) :

      echo $before_widget;
      if( $title ) echo $before_title . $title . $after_title; ?>
      <ul class="collection rpwidget">
        <?php while( $r->have_posts() ) : $r->the_post(); ?>
        <li class="collection-item avatar">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/GACR-CZ_RGB_SQUARE.png' ); ?>" class="alignleft circle" alt="GACR-CZ_RGB">
          <span class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
          <p><?php the_time('j. n. Y'); ?></p>
        </li>
        <?php endwhile; ?>
      </ul>

      <?php
      echo $after_widget;

    wp_reset_postdata();

    endif;
  }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

/*********************************************************************************************

REMOVE MORE LINK

*********************************************************************************************/
add_filter( 'the_content_more_link', 'remove_more_link', 10, 2 );

function remove_more_link( $more_link, $more_link_text ) {
    return;
}
/*********************************************************************************************

JQUERY

*********************************************************************************************/
function register_jquery() {
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2', false );
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'register_jquery');

?>
