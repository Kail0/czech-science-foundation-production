<?php get_header(); ?>
<div class="container clearfix">
    <!-- TICKER -->
    <div class="eventTicker z-depth-0-half" id="ticker">
        <div class="bn-title">
            <h5>Důležité termíny</h5><span></span></div>
        <?php
            // args
            $args = array(
                        'post_type' => 'gacr-event',
                        'posts_per_page'  => 4,
                        'orderby'         => 'meta_value_num',
                        'order'           => 'ASC',
                        'meta_query' => array(
                            array(
                                    'key' => 'date',
                                    'type' => 'NUMERIC', // MySQL needs to treat date meta values as numbers
                                    'value' => current_time( 'Ymd' ), // Today in ACF datetime format
                                    'compare' => '>=', // Greater than or equal to value
                                ),
                            ),
                        );
        // query
        $event = new WP_Query( $args );
        ?>
            <?php if( $event->have_posts() ): ?>
            <ul>
                <?php while( $event->have_posts() ) : $event->the_post(); ?>
                <li class="gacr-event">
                    <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); ?>
                    <span class="date"><?php echo $date->format('j. n. Y'); ?>&nbsp;|</span>
                    <span><a href="#"><?php the_title(); ?></a></span>
                </li>
                <?php endwhile; ?>
            </ul>
            <div class="bn-navi">
                <span class="arrow aleft"></span>
                <span class="arrow aright"></span>
            </div>
            <?php else : ?>
            <ul>
                <li class="gacr-event">
                    <?php _e( 'V nejbližší době nejsou pro řešitele a žadatele žádné důležité termíny.' ); ?>
                </li>
            </ul>
            <?php endif; ?>
            <?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
    </div><!-- END TICKER -->
    <div class="row">
        <div class="col l9 s12 homepage">
            <main id="main" class="site-main" role="main">
                <!-- NEWS -->
                <?php
                $custom_args = array (
                    // 'cat'                    => '-17, -292, -87, 53',
                    'cat' => '331',
                    'category__not_in' => array(87, 17),  // 87 zverejnene-informace-106; 17 vynikajici projekty;
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'paged' => $paged
                );

                // the query
                $custom_query = new WP_Query( $custom_args );


                 // Output custom query loop
                    if ( $custom_query->have_posts() ) :

                    // <!-- the loop -->
                     while ( $custom_query->have_posts() ) : $custom_query->the_post();

                         get_template_part( 'content', 'single' );

                     endwhile; ?>
                    <!-- end of the loop -->
                    <?php else : ?>
                    <p>
                        <?php esc_html_e ( 'Nic zde není.' ); ?>
                    </p>
                    <?php endif;
                 wp_reset_postdata(); ?>
            </main>
            <!-- END NEWS -->
            <div class="loadmore">
                <a id="a2" class="gacr-blue waves-effect waves-light btn-floating btn-large ajaxload" href="/novinky/">
                    <i class="material-icons">&#xE149;</i>
                </a><span>ARCHIV</span>
            </div>
        </div>
        <!-- col homepage -->
        <?php if ( is_active_sidebar( 'homepage', 'homepage-button' ) ) : ?>
        <div class="col l3 homepage">
            <?php dynamic_sidebar( 'homepage' ); ?>
            <?php dynamic_sidebar( 'homepage-button' ); ?>
        </div>
        <?php else : ?>
        <p>
            <?php _e( 'Nic zde není.' ); ?>
        </p>
        <?php endif; ?>
    </div>
    <!-- END ROW -->
</div>
<!-- END CONTAINER -->
<?php get_footer(); ?>