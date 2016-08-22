<?php get_header(); ?>
	<div id="primary" class="container clearfix default">
		<!-- content -->
			<div class="section">
			 	<div class="row">
			 		<!-- FIRST -->
			 		<main id="main" class="col l9 m12 s12">
			 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			 				<div class="card">
			 				<?php if (has_post_thumbnail()) { ?>
			 					<div class="card-image"> <?php the_post_thumbnail('card-header');?>
			 						<span class="card-title">
			 							<header class="entry-header hide">
			 								<h2><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?></h2>
			 								<h5><?php }?><span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h5>
			 							</header>
			 						</span>
			 					</div>
			 					<div class="card-content">
			 				<?php } else { ?>
			 					<div class="card-content">
			 						<span class="card-title">
			 							<header class="entry-header">
			 							<h2><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?></h2>
			 							<h5><?php }?><span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h5>
			 							</header>
			 						</span>
			 				<?php } ?>

			 					<div class="entry-content">
			 					<?php the_content(); ?>
			 					</div>
			 				<!-- end article section -->

			 				<?php endwhile; ?>
			 					</div> <!-- card-content -->
			 				</div> <!-- card -->
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
			 		</main>
			 		<!-- SECOND -->
			 		<div id="secondary" class="widget-area col l3 s12" role="complementary">
			 			<?php get_template_part( 'page', 'sidebar' ); ?>
			 		</div>
			 	</div><!-- END ROW -->
			 </div> <!-- END SECTION -->
	</div> <!-- END PRIMARY -->
<?php get_footer(); ?>