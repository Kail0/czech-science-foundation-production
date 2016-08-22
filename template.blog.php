<?php
/*
 * Template Name: Blog
*/
get_header(); ?>

			<div id="content" class="container section clearfix">

				<!-- page header -->


				<!-- content -->
				<div class="row">
					<div class="col s9">

						<h2><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h2>

						<div id="main" role="main">

								<?php
									// WP 3.0 PAGED BUG FIX


									$args = array(
									'post_type' => 'post',
									'posts_per_page' => '5',
									'cat' => '-4, -2, -87',
									'paged' => $paged );

									query_posts($args);
								?>

								<?php if (have_posts()) : $count = 0; ?>
								<?php while (have_posts()) : the_post(); $count++; global $post; ?>


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
				</div>

			</div> <!-- end #content -->
<?php get_footer(); ?>