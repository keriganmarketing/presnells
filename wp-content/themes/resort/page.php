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
    <div id="mid" class="support py-5">
        <div class="container">
        	<div class="row justify-content-center">
            <div id="primary" class="content-area col-lg-10 ">
        
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>
    
                <?php endwhile; // End of the loop. ?>
    
            </div><!-- #primary -->
            <?php //get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
