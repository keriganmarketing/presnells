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
	<div id="bot">
    	<div class="container">
        	<div class="row">
                <div id="footer-nav-container" class="col-lg-6" >
                	<div id="reservation-div"><!--<a href="#" id="reservations-button" class="btn btn-warning">Online Reservations</a>--></div>
                    <div class="redundant-nav">
                    	<nav>
                        	<div>
                                <!--<ul class="float-footer-nav">
                                    <li><a href="#" class="heavy-nav-link">Home</a></li>
                                    <li><a href="#" class="heavy-nav-link">RV Site</a></li>
                                    <li><a href="#" class="heavy-nav-link">Reviews</a></li>
                                    <li><a href="#" class="heavy-nav-link">Contact</a></li>                   
                                </ul>
                                <ul class="float-footer-nav">
                                    <li><a href="#" class="heavy-nav-link">About Us</a></li>
                                    <li><a href="#" class="light-nav-link">Our Property</a></li>
                                    <li><a href="#" class="light-nav-link">FAQs</a></li>
                                    <li><a href="#" class="light-nav-link">Directions</a></li>
                                    <li><a href="#" class="light-nav-link">Media</a></li>
                                </ul>
                                <ul class="float-footer-nav">
                                    <li><a href="#" class="heavy-nav-link">Amenities</a></li>
                                    <li><a href="#" class="light-nav-link">Boat Rentals</a></li>
                                    <li><a href="#" class="light-nav-link">Marina</a></li>
                                </ul>-->
                                <?php 
								wp_nav_menu( array(
									'theme_location'  => 'footer-nav-one',
									'menu'            => '',
									'container'       => 'div',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'float-footer-nav',
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
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'float-footer-nav',
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
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'float-footer-nav',
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
                            <h3>Our Area</h3>
                            <!--<ul id="horizontal-list">
                                <li><a href="#" class="light-nav-link">Mexico Beach</a></li>
                                <li><a href="#" class="light-nav-link">Port St. Joe</a></li>
                                <li><a href="#" class="light-nav-link">WindMark Beach</a></li>
                                <li><a href="#" class="light-nav-link">Cape San Blas</a></li>
                            </ul>-->
                            <?php 
                            wp_nav_menu( array(
                                'theme_location'  => 'footer-areas',
                                'menu'            => '',
                                'container'       => 'div',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => 'horizontal-list',
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
            <div class="bot-bot-container">
            	<div id="social-media-icons" class="col-md-3">
                	<a href="https://www.facebook.com/presnellsbaysidemarina/" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/fb-icon.png" alt="Like us on Facebook" /></a>
                    <a href="https://www.tripadvisor.com/Hotel_Review-g34578-d10066464-Reviews-Presnell_s_Bayside_Marina_RV_Resort-Port_Saint_Joe_Florida.html" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/ta-icon.png" alt="Review us on TripAdvisor" /></a>
                    <a href="https://twitter.com/presnellmarina" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/tr-icon.png" alt="Follow us on Twitter" /></a>
                    <a href="https://plus.google.com/110791802221742017875/about" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/gp-icon.png" alt="Find us on Google+" /></a>
                    <!--<a href="#" target="_blank" ><img src="<?php echo get_template_directory_uri() ?>/img/yt-icon.png" alt="Subscribe on YouTube" /></a>-->
                </div>
                <div class="copyright col-md-6" >
            		<p>&copy;<?php echo date('Y'); ?> Presnell's Vacation Resort & RV Park, LLC. All rights reserved. <a href="/sitemap_index.xml">Sitemap</a></p>
                </div>
                <div id="siteby" class="col-md-3" >
                	<p><img src="<?php echo get_template_directory_uri() ?>/img/kma.png" alt="Site by Kerigan Marketing Associates" />Site by <a href="http://keriganmarketing.com" target="_blank">KMA.</a></p>
                </div>
            </div>
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75118168-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
