<?php
/*
 * Template Name: Page Fullwidth
 */
get_header(); ?>

<div class="container clearfix">
	<!-- content -->
	<div class="section">
		<div class="row">
			<div class="col l12">
	 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
								<header class="entry-header">
								<h2><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?></h2>
								<h5><?php }?><span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h5>
								</header>
						<div class="entry-content">
						<?php the_content(); ?>
						</div>
					<!-- end article section -->

					<?php endwhile; ?>

				</article>

					<?php else : ?>

					<article id="post-not-found">
						<header>
							<h1><?php _e("Nenalezeno", "kailoframework"); ?></h1>
						</header>
						<section class="post_content">
							<p><?php _e("Omlouváme se, ale Vaše žádost zde nebyla nalezena", "kailoframework"); ?></p>
						</section>
						<footer>
						</footer>
					</article>

			<?php endif; ?>
			</div>
		</div>
	</div>
</div> <!-- end content -->

<?php get_footer(); ?>