<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gacr
 */

get_header(); ?>

			<div id="content" class="clearfix">

				<!-- page header -->

				     <!-- end page header -->
				<div id="main" role="main" class="container clearfix">

					<div class="row">
						<div class="col l12 s12"><article id="post-not-found">


								<header>

									<h1 class="not-found-text"> · <span class='colored'>404</span> <?php _e("Error", "kailoframework"); ?> · </h1>

								</header> <!-- end article header -->

								<section class="post_content">

									<p style="text-align: center"><?php _e("Omlouváme se, ale stránka kterou hledáte tu není.", "kailoframework"); ?></p>

								</section> <!-- end article section -->
							</div>
					</div>
					</article> <!-- end article -->

				</div> <!-- end #main -->

			</div> <!-- end #content -->

<?php
get_footer();