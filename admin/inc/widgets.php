<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
function kailoframework_widgets_init() {

	register_sidebar( array (
    'name' => __( 'Blog', 'kailoframework' ),
    'id' => 'blog',
    'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside></div>',
    'before_title' => '<h5 class="widget-title">',
    'after_title' => '</h5>',
	) );

	register_sidebar( array (
    'name' => __( 'Page', 'kailoframework' ),
    'id' => 'page',
    'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<h5 class="widget-title">',
    'after_title'   => '</h5>',
	) );

	register_sidebar( array(
    'name' => __( 'Footer', 'kailoframework' ),
    'id' => 'footer-sidebar',
	'description' => __( "Widgetized footer", 'kailoframework' ),
    'before_widget' => '<div class="col l3 s12 left widget-container %2$s" id="%1$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>','after_title' => '</h3>'
    ) );


}

add_action( 'init', 'kailoframework_widgets_init' );


/*********************************************************************************************

Register Twitter Widget

*********************************************************************************************/
class kailoframework_twitter_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Kailo Framework Twitter Widget', array( 'description' => 'Kailo Framework Twitter profile widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $screen_name = esc_attr( $instance['screen_name'] );
        $num_tweets = esc_attr( $instance['num_tweets'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'screen_name' ); ?>"><?php _e('Screen name:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'screen_name' ); ?>" name="<?php echo $this->get_field_name( 'screen_name' ); ?>" type="text" value="<?php echo $screen_name; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num_tweets' ); ?>"><?php _e('Number of Tweets:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_tweets' ); ?>" name="<?php echo $this->get_field_name( 'num_tweets' ); ?>" type="text" value="<?php echo $num_tweets; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start twitter widget -->
         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/library/js/tweets/jquery.jtweets-1.2.1.css" />
	    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/tweets/jquery.jtweets-1.2.1.js"></script>

        <div id="jTweets"> </div>
        <script type="text/javascript">
			$j = jQuery.noConflict();
	        $j('#jTweets').jTweetsAnywhere({
	        username: '<?php echo $instance['screen_name']; ?>',
	        count: <?php echo $instance['num_tweets']; ?>,
	        showTweetFeed: {
			showInReplyTo: false,
	        paging: { mode: 'none' }
	        }
	        });
        </script>
        <!-- end twitter widget -->
		<a class="twitter-action" href="http://twitter.com/<?php echo $instance['screen_name']; ?>"><?php _e('Follow Us on Twitter! ', 'kailoframework') ?> &raquo; </a>


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "kailoframework_twitter_widget" );' ) );


/*********************************************************************************************

Register Contact Widget

*********************************************************************************************/
class kailoframework_contact_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Kailo Framework Footer Contact Widget', array( 'description' => 'Kailo Framework footer contact widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $cbsum = esc_attr( $instance['cbsum'] );
        $cphone = esc_attr( $instance['cphone'] );
        $casum = esc_attr( $instance['casum'] );
        $cemail = esc_attr( $instance['cemail'] );
        $caddress = esc_attr( $instance['caddress'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cbsum' ); ?>"><?php _e('Summary Before Address:', 'kailoframework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'cbsum' ); ?>" name="<?php echo $this->get_field_name( 'cbsum' ); ?>"><?php echo $cbsum; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'caddress' ); ?>"><?php _e('Contact Address:', 'kailoframework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'caddress' ); ?>" name="<?php echo $this->get_field_name( 'caddress' ); ?>"><?php echo $caddress; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cphone' ); ?>"><?php _e('Contact Phone:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'cphone' ); ?>" name="<?php echo $this->get_field_name( 'cphone' ); ?>" type="text" value="<?php echo $cphone; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cemail' ); ?>"><?php _e('Contact Email:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'cemail' ); ?>" name="<?php echo $this->get_field_name( 'cemail' ); ?>" type="text" value="<?php echo $cemail; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'casum' ); ?>"><?php _e('Summary After Address', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'casum' ); ?>" name="<?php echo $this->get_field_name( 'casum' ); ?>" type="text" value="<?php echo $casum; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>

            <!-- start contact widget -->
            <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>



	        <div class="contactmap">
					<p>
						<?php echo $instance['cbsum']; ?>
					</p>
	                <address>
						<span class="address"><i class="material-icons">&#xE0C8;</i><?php echo $instance['caddress']; ?></span>
						<span class="phone"><i class="material-icons">&#xE0CD;</i><?php echo $instance['cphone']; ?></span>
                        <span class="email"><i class="material-icons">&#xE158;</i><?php echo $instance['cemail']; ?></span>
					</address>
					<p>
						<?php echo $instance['casum']; ?>
					</p>

	        </div>

        <!-- end contact widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "kailoframework_contact_widget" );' ) );



/*********************************************************************************************

Register Video Widget

*********************************************************************************************/
class kailoframework_video_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Kailo Framework Video Widget', array( 'description' => 'Kailo Framework video widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $video_code = esc_attr( $instance['video_code'] );
        $video_desc = esc_attr( $instance['video_desc'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'video_code' ); ?>"><?php _e('Video Code:', 'kailoframework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'video_code' ); ?>" name="<?php echo $this->get_field_name( 'video_code' ); ?>"><?php echo $video_code; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'video_desc' ); ?>"><?php _e('Video Description:', 'kailoframework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'video_desc' ); ?>" name="<?php echo $this->get_field_name( 'video_desc' ); ?>" type="text" value="<?php echo $video_desc; ?>" />
        </p>

        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>
        <!-- start video widget -->
        <h3 class="widget-title"><?php echo $instance['widget_title']; ?></h3>
		<p class="video-desc"><?php echo $instance['video_desc']; ?></p>
        <p class="video-widget"><?php echo $instance['video_code']; ?></p>
        <!-- end video widget -->

        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "kailoframework_video_widget" );' ) );

?>