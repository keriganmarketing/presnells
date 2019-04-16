<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resort
 */

?>
		<div id="bot" class="py-4">
			<div class="container">
				<div class="row align-items-center">
					<div id="footer-nav-container" class="col-lg-6" >
						<div class="redundant-nav">
							<nav>
								<div class="row">
									<?php 
									wp_nav_menu( array(
										'theme_location'  => 'footer-nav-one',
										'menu'            => '',
										'container'       => 'div',
										'container_class' => 'col-md-auto',
										'container_id'    => '',
										'menu_class'      => 'm-0 p-0 px-lg-2',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									) );
									?>
									<?php 
									wp_nav_menu( array(
										'theme_location'  => 'footer-nav-two',
										'menu'            => '',
										'container'       => 'div',
										'container_class' => 'col-md-auto',
										'container_id'    => '',
										'menu_class'      => 'm-0 p-0 px-lg-2',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									) );
									?>
									<?php 
									wp_nav_menu( array(
										'theme_location'  => 'footer-nav-three',
										'menu'            => '',
										'container'       => 'div',
										'container_class' => 'col-md-auto',
										'container_id'    => '',
										'menu_class'      => 'm-0 p-0 px-lg-2',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									) );
									?>
								</div>
								<h3 class="p-lg-2">Our Area</h3>
								<?php 
								wp_nav_menu( array(
									'theme_location'  => 'footer-areas',
									'menu'            => '',
									'container'       => 'div',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'd-md-flex m-0 p-0 px-lg-2',
									'menu_id'         => 'area-menu',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								) );
								?>
							</nav>   
						</div>
					</div>
					<div id="google-map" class="radbox col-lg-6" >
						<div id="styled-google-map" class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3464.056618378146!2d-85.30603018451619!3d29.747074539513104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8894966c11dfd971%3A0xae288e01003ff02a!2sPresnell&#39;s+Bayside+Marina+%26+Rv+Resort!5e0!3m2!1sen!2sus!4v1455286594199"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="bot-bot">
			<div class="container">
				<div class="row align-items-center">
					<div id="social-media-icons" class="col-md-3 col-lg-2 text-center text-md-left m-0">
						<a href="https://www.facebook.com/presnellsbaysidemarina/" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/fb-icon.png" alt="Like us on Facebook" /></a>
						<a href="https://www.tripadvisor.com/Hotel_Review-g34578-d10066464-Reviews-Presnell_s_Bayside_Marina_RV_Resort-Port_Saint_Joe_Florida.html" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/ta-icon.png" alt="Review us on TripAdvisor" /></a>
						<a href="https://twitter.com/presnellmarina" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/tr-icon.png" alt="Follow us on Twitter" /></a>

					</div>
					<div class="copyright col-md text-center flex-grow-1" >
						<p class="m-0 p-0"><strong>&copy;<?php echo date('Y'); ?> Presnell's Vacation Resort & RV Park, LLC. All rights reserved.</strong> <a href="/sitemap_index.xml">Sitemap</a></p>
					</div>
					<div id="siteby" class="col-md-auto text-center text-md-right m-0 p-0" >
						<p class="m-0 p-0"><img src="<?php echo get_template_directory_uri() ?>/img/kma.png" alt="Site by Kerigan Marketing Associates" />Site by <a href="https://keriganmarketing.com" target="_blank">KMA.</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- #app -->
<?php wp_footer(); ?>
</body>
</html>
