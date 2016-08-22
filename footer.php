
			<!-- begin #footer -->
			<footer id="footer">

				<div class="container clearfix">

					<div class="row"><?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

							<?php dynamic_sidebar( 'footer-sidebar' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->

							<div class="row">
								<div class="col l4 s12">

									<!-- This content shows up if there are no widgets defined in the backend. -->

									<div class="help">

										<p>
											<?php _e("Please activate some Widgets.", "kailoframework"); ?>

											<?php if(current_user_can('edit_theme_options')) : ?>
											<a href="<?php echo admin_url('widgets.php')?>" class="add-widget"><?php _e("Add Widget", "kailoframework"); ?></a>
											<?php endif ?>
										</p>

									</div>

								</div>
							</div>

						<?php endif; ?>

						</div>

				</div> <!-- end #footerWidgets -->

				<!-- begin #copyright -->
				<div id="copyrights">
					<div class="container clearfix">

						<span class="right">

							<a class="backtotop" href="#backtotop">↑</a>
						<a class="footermenu" href="/mapa-stranek/">Mapa stránek</a> | <a class="footermenu" href="/?page_id=1369">O přístupnosti</a>
						</span>



						<?php if(of_get_option('sc_footer_copyright') == '') { ?>
						&copy; <?php bloginfo('name'); ?> is powered by <a href="http://wordpress.org/" title="WordPress">WordPress</a> <span class="amp">&amp;</span> <a href="http://kailo.photography" title="Carefully crafted with WordPress, HTML5 + CSS3">Kailo</a>.
						<?php } else { ?>
						<?php echo of_get_option('sc_footer_copyright')  ?>
						<?php } ?>
                             <br><!--GACR-->
					</div>
				</div>
				<!-- end #copyright -->

			</footer> <!-- end footer -->

		 <!-- end #page container -->

		<!-- scripts are now optimized via Modernizr.load -->



		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>