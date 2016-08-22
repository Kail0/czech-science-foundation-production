<?php
/*
 * Template Name: Contact Form Page
*/
get_header();
?>
<div id="content" class="container clearfix">
	<div class="row">
		<div class="col l9 tcontact">
			    <div class="card">
        <div class="card-content">
			<h2><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h2>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="col l6 s12">
			                <div class="contact cphone"><?php _e('<i class="small material-icons">phone</i>', 'kailoframework') ?> <?php echo of_get_option('sc_contact_phone') ?></div>
			            	<div class="divider hide"></div>
			            	<div class="contact cfax"><?php _e('<i class="small material-icons">phone</i>', 'kailoframework') ?></strong> <?php echo of_get_option('sc_contact_fax') ?>(fax)</div>
			 				<div class="divider"></div>
			 				<div class="contact cemail"><?php _e('<i class="small material-icons">mail</i>', 'kailoframework') ?> <?php echo of_get_option('sc_contact_email') ?></div>
					  		<div class="divider"></div>
					  		<div class="contact caddress"><?php _e('<i class="small material-icons">location_on</i>', 'kailoframework') ?>Grantová agentura České republiky <br> Evropská 2589/33b<br>160 00<br>Praha 6</div>
						</div>

						<div class="col l6 s12">
							<div class="contact cisdsone"><?php _e('<i class="small material-icons">inbox</i> ISDS pro běžnou komunikaci a uplatnění výsledků RIV:', 'kailoframework') ?> <?php echo of_get_option('sc_contact_ssiddz') ?></div>
				  			<div class="divider hide"></div>
				  			<div class="contact cisdstwo"><?php _e('<i class="small material-icons">inbox</i> ISDS pro návrhy, DZ a ZZ:', 'kailoframework') ?> <?php echo of_get_option('sc_contact_ssidpropo') ?></div>
				            <div class="divider"></div>
				            <div class="contact cico"><?php _e('<i class="small material-icons">error_outline</i> IČO:', 'kailoframework') ?> <?php echo of_get_option('sc_contact_cico') ?></div>
				            <div class="divider"></div>
				            <div class="contact cbank"><?php _e('<i class="small material-icons">payment</i> Bankovní účet: ', 'kailoframework') ?> <?php echo of_get_option('sc_contact_cbank') ?></div>
						</div>
						<div class="col l12">
							<h3>Jak se k nám dostanete</h3>
							<div class="divider"></div>
							<div class="contact csubway"><?php _e('<i class="material-icons">&#xE7F1;</i> <strong>Z centra</strong>:', 'kailoframework') ?> <?php echo of_get_option('sc_contact_metro') ?></div>
							<div class="divider"></div>
							<div class="contact ctram"><?php _e('<i class="material-icons">&#xE53D;</i> <strong>Z letiště</strong>:', 'kailoframework') ?> <?php echo of_get_option('sc_contact_tram') ?></div>
						</div>

						<div class="col l12">
							<div class="divider"></div>
							<h4>Mapa</h4>
							<div id="contact-map">

							<?php echo of_get_option('sc_contact_map') ?>
							</div>
						</div>

					<?php endwhile; ?>
				</article>

						<?php else : ?>

				<article id="post-not-found">
					<header>
						<h1><?php _e("Nenalezeno", "kailoframework"); ?></h1>
					</header>
					<section class="post_content">
						<p><?php _e("Sorry, but the requested resource was not found on this site.", "kailoframework"); ?></p>
					</section>
					<footer>
					</footer>
				</article>

		<?php endif; ?>
		<div class="clearfix"></div>
		</div>
	</div> <!-- end row -->
		</div>
		<div class="col l3 s12">
		<?php get_template_part( 'page', 'sidebar' ); ?>
		</div>
	</div> <!-- end row -->
</div> <!-- end content -->

<?php get_footer(); ?>