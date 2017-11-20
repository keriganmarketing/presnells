<?php
/**
 * Template Name: Reviews
 * @package Cool_As_A_Cucumber
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
            <div id="primary" class="content-area col-md-offset-1 col-md-10">
                    <main id="main" class="site-main" role="main">
            			<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            	<header class="entry-header">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                </header><!-- .entry-header -->
                                <div class="entry-content">
                                    <?php the_content(); ?>
                        
                        
							<?php 
                            
                            $sargs = array( 
                                'post_type'        => 'testimonial',
                                'posts_per_page'	=> -1,
                                'orderby'			=> 'date',
                                'order'            => 'DESC',
                                'offset'			=> 0,
                                'post_status'		=> 'publish'
                            );
                            
                            $stories = get_posts( $sargs );
                            foreach ( $stories as $story ){
                                $id = $story->ID; 
								$slug = $story->post_name; 
								$dateposted = human_time_diff( get_the_time('U', $id), current_time('timestamp') ) . ' ago';  
								$title = get_the_title($id);
								$author = get_field('author', $id);
								$star_rating = get_field('star_rating', $id);
								$source = get_field('source', $id);
								$truncated = FALSE;
								
								$testimonial_text = apply_filters('the_content', get_post_field('post_content', $id));
        
                                 ?>
                                                            

                                	<div id="<?php echo $slug; ?>" class="testimonial-list col-sm-12" >
                                    <div class="row">
                                 	<?php
                                    	
										echo '<div class="review-text col-xs-12">';
                                        echo $testimonial_text;
                                    	echo '</div>';
										echo '<div class="review-signoff col-xs-12">';
										echo '<p class="review-author">&mdash;<strong>'.$author.'</strong>';
										if( $star_rating!='' && $source!='' ){ echo ', rated '.$star_rating.' out of 5 on '.$source; }
										echo ' '.$dateposted.'</p>';
										
										echo '</div>';
                                    ?>
                                    </div>
                                    <hr>
                                	</div>


                            <?php } ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->
						<?php endwhile; // End of the loop. ?>
						</main><!-- #main -->
                </div><!-- #primary -->
            	<?php //get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
