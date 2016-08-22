<?php get_header(); ?>

            <div id="content" class="container clearfix">

                <!-- page header -->


                <div class="add_class">
                    <h2>
                    <?php if (is_category()) { ?>
                                <?php _e("Příspěvky z kategorie", "kailoframework"); ?> / <span><?php single_cat_title(); ?></span>
                        <?php } elseif (is_tag()) { ?>
                                <?php _e("Posts Tagged", "kailoframework"); ?> / <span><?php single_cat_title(); ?></span>
                        <?php } elseif (is_author()) { ?>
                                <?php _e("Posts By", "kailoframework"); ?> / <span><?php the_author_meta('display_name', $post->post_author) ?> </span>
                        <?php } elseif (is_day()) { ?>
                                <?php _e("Daily Archives", "kailoframework"); ?> / <span><?php the_time('l, F j, Y'); ?></span>
                        <?php } elseif (is_month()) { ?>
                                <?php _e("Monthly Archives", "kailoframework"); ?> / <span><?php the_time('F Y'); ?></span>
                        <?php } elseif (is_year()) { ?>
                                <?php _e("Yearly Archives", "kailoframework"); ?> / <span><?php the_time('Y'); ?></span>
                        <?php } elseif (is_Search()) { ?>
                                <?php _e("Výsledky vyhledávání", "kailoframework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span>
                        <?php } ?>
                     </h2>


                    <div id="main" role="main">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?> </div>



                        <?php endwhile; ?>

                        <!-- begin #pagination -->
                                <?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>
                        <!-- end #pagination -->

                        <?php else : ?>

                        <article id="post-not-found">
                            <header>
                                <h1><?php _e("Při hledání nebyl bohužel nalezen žádný výsledek.", "kailoframework"); ?></h1>
                            </header>
                            <section class="post_content">
                                <p><?php _e("Při hledání nebyl bohužel nalezen žádný výsledek.", "kailoframework"); ?></p>
                            </section>
                            <footer>
                            </footer>
                        </article>

                        <?php endif; ?>

                    </div> <!-- end #main -->
                </div><!-- three-fourth -->

                <div class="one-fourth last">
                    <?php get_template_part( 'blog', 'sidebar' ); ?>
                </div>

            </div> <!-- end #content -->
<?php get_footer(); ?>