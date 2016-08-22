<?php
/*
 * Template Name: TEST Blog
*/
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col l4 left"> LEFT SIDEBAR</div>
        <div class="col l8">

            <main id="main" class="site-main" role="main">
            <?php

                $custom_query = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                $custom_args = array (
                    'cat'                    => '',
                    'posts_per_page'         => '10',
                    'paged' => $paged
                );

                // Get current page and append to custom query parameters array


                // the query
                $custom_query = new WP_Query( $custom_args );

                // Pagination fix
                $temp_query = $wp_query;
                $wp_query   = NULL;
                $wp_query   = $custom_query;
            ?>

                <?php // Output custom query loop
                    if ( $custom_query->have_posts() ) : ?>

                    <!-- the loop -->
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                        <?php get_template_part( 'content', 'single' ); ?>

                    <?php endwhile; ?>
                    <!-- end of the loop -->




                <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>


            </main>

        </div>
    </div>
</div>

<?php get_footer(); ?>