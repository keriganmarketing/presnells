<?php
/**
 * Template Name: Area Page
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
        	<div class="row">
            <div id="primary" class="content-area col-lg-8">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <?php endwhile; // End of the loop. ?>

            </div><!-- #primary -->
            <div id="secondary" class="widget-area col-lg-4" role="complementary">

            <?php
				$areaPhoto = get_field('main_photo');
				if($areaPhoto != ''){
					echo '<img src="'.$areaPhoto['url'].'" alt="'.$areaPhoto['alt'].'" class="img-fluid" />';
				}
			?>
            <?php
				$tripadvisor = get_field('tripadvisor_embed');
				if($tripadvisor != ''){
					echo $tripadvisor; ?>
					<style>
					#CDSWIDDMO, #CDSWIDDMO .widDMOData .widDMOPhotos table, #CDSWIDDMO .widDMOData .widDMOPhotos table td img { width:100% !important; }
					#CDSWIDDMO .widDMOData .widDMOBranding {
						border-bottom: none !important;
						background-color: transparent !important;
					}
					#CDSWIDDMO .widDMOCnrs span {
						display: none !important;
						width: 0 !important;
						height: 0 !important;
						background: none !important;
					}
					</style>

			<?php }	?>

            <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>