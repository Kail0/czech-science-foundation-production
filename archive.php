<?php get_header(); ?>

			<div id="content" class="container section clearfix">

				<!-- page header -->

                <div class="row">
				<div class="col s9">
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

							<?php get_template_part( 'content', 'single' ); ?>

						<?php endwhile; ?>

							<!-- begin #pagination -->
								<?php
								  if ( function_exists('wp_md_pagination') )
								    wp_md_pagination();
								?>

							<!-- end #pagination -->

						<?php else : ?>

							<article id="post-not-found">
							    <header>
							    	<h2><?php _e("Doposud žádný příspěvek", "kailoframework"); ?></h2>
							    </header>
							    <section class="post_content">
							    	<p><?php _e("Omlouváme se, ale zde nic nenajdete.", "kailoframework"); ?></p>
							    </section>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->
				</div><!-- three-fourth -->

					<div class="col s3">
						<?php get_template_part( 'blog', 'sidebar' ); ?>
					</div>

			</div> <!-- end #content -->
			</div>
<?php get_footer(); ?>