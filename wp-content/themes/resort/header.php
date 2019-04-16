<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resort
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div id="app" >
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'resort' ); ?></a>
	<div 
		class="site-wrapper" 
		v-bind:class="{
			'full-height': footerStuck, 
			'scrolling': isScrolling,
			'mobile-menu-open': mobileMenuOpen 
		}">
		<div id="top">
			<div class="container">
				<div class="d-flex no-gutters align-items-end align-items-sm-center align-items-lg-end">
					<div id="logoarea" class="col-xs-7 col-sm-auto pt-2 pr-2"  >
						<a href="/" ><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="Presnell's Marina & RV Resort" /></a>
					</div>
					<div id="main-nav" class="col" >

						<div class="top-actions d-sm-flex justify-content-end align-items-md-end py-2 py-lg-0">
							<div class="call-btn px-2 py-1">
								<a href="tel:8502299229" class="btn btn-accent d-flex justify-content-start align-items-center" >
									<i class="fa fa-phone bg-white rounded text-accent" aria-hidden="true"></i> 
									<span class="d-md-none text-uppercase" >Call</span>
									<span class="d-none d-md-inline">(850) 229-9229</span>
								</a>
							</div>
							<div class="menu-btn px-2 py-1 d-lg-none">
								<button class="btn btn-accent d-flex justify-content-start align-items-center" @click="toggleMenu()" >
									<i class="fa fa-bars bg-white rounded text-accent" aria-hidden="true"></i> 
									<span class="text-uppercase">Menu</span>
								</button>
							</div>
							<?php 
								wp_nav_menu( array(
										'theme_location'  => 'primary',
										'menu'            => '',
										'container'       => 'nav',
										'container_class' => 'd-none d-lg-block',
										'container_id'    => '',
										'menu_class'      => 'navbar-nav flex-row',
										'menu_id'         => 'main-menu',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'depth'           => 0,
										'items_wrap'      => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
										'walker' 		  => new Includes\Modules\Helpers\BootstrapNavwalker()
								) );
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div v-if="mobileMenuOpen" class="mobile-menu align-items-center" ref="mobileMenuContainer" v-bind:class="{ 'open': this.mobileMenuOpen }" >
			<mobile-menu v-bind:mobile-nav='<?php echo website_menu(2); ?>' class="navbar-nav w-100 my-auto text-center text-md-left" ></mobile-menu>
		</div>