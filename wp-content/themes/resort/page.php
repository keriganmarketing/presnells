<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package resort
 */

get_header(); ?>
    <div id="blue-wave" class="support">
    	<div class="container">
        &nbsp;
        </div>
    </div>
    <div id="mid" class="support">
        <div class="container">
        	<div class="row">
            <div id="primary" class="content-area col-md-offset-1 col-md-10 ">
                <main id="main" class="site-main" role="main">
        
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
        
                    <?php endwhile; // End of the loop. ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
            <?php //get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
