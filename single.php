<?php get_header(); ?>
	<div id="primary" class="container section clearfix">
		<!-- page header single-->
		<div class="row">
			<div class="col s12 l9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                    <div class="card post-image-title">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="card-image"> <?php the_post_thumbnail('card-header');?>
                                <span class="card-title">
                                    <header class="entry-header">
                                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                    </header><!-- .entry-header -->
                                    <span class="entry-meta grey-text text-darken-2 hide hide">Zveřejněno: <?php the_time('j. n. Y'); ?></span>
                                </span>
                            </div>
                            <div class="card-content">
                        <?php } else { ?>
                        <div class="card-content">
                            <span class="card-title">
                                    <header class="entry-header">
                                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                    </header><!-- .entry-header -->
                                    <span class="entry-meta grey-text text-darken-2 hide">Zveřejněno: <?php the_time('j. n. Y'); ?></span>
                                </span>
                        <?php } ?>
                            <div class="entry-content">
                                <?php
                                    /* translators: %s: Name of current post */

                                    if (! is_single()) {
                                        the_excerpt( sprintf(
                                            __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gacr' ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                        ) );
                                    } else {
                                        the_content( sprintf(
                                            __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gacr' ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                        ) );
                                    }
                                ?>
                            </div><!-- .entry-content -->
                            <?php if(of_get_option('sc_authorbox') == '1') : ?>
                            <div class="author clearfix">
                                <div class="author-gravatar">
                                    <!-- <img src="/wp-content/uploads/files/GACR-CZ_RGB_SQUARE.png" alt=""> -->
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/GACR-CZ_RGB_SQUARE.png' ); ?>" />
                                </div>
                                <div class="author-about">
                                    <h4>
                                    <?php if(get_the_author_meta( 'first_name') != ''  &&  get_the_author_meta( 'last_name') != '' ) : ?>
                                        <?php the_author_meta( 'first_name'); ?> <?php the_author_meta( 'last_name'); ?>
                                    <?php else: ?>
                                        <?php the_author_meta( 'user_nicename'); ?>
                                    <?php endif; ?>
                                    </h4>
                                    <p class="author-description"><?php the_author_meta( 'description' ); ?></p>
                                </div>
                            </div>
                            <?php endif ?>

                        <?php endwhile; ?>
                         </div> <!-- card-content -->
                    </div> <!-- card -->
                </article> <!-- end article -->
						<?php else : ?>

						<article id="post-not-found">
						    <header>
						    	<h1><?php _e("Zde nic není.", "kailoframework"); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e("Omlouváme se, ale zde nic nenajdete.", "kailoframework"); ?></p>
						    </section>
						</article>
						<?php endif; ?>

				</div><!-- three-fourth -->
				<div class="col s12 l3">
					<?php get_template_part( 'blog', 'sidebar' ); ?>
				</div>
    </div> <!-- ROW -->
	</div> <!-- END PRIMARY -->
<?php get_footer(); ?>