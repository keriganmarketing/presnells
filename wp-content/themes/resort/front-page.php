<?php
/**
 * The template for displaying the page designated as the "front page"
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package resort
 */
 
$button1['img'] = get_field('button_one_photo');
$button1['label'] = get_field('button_one_label');
$button1['link'] = get_field('button_one_link');

$button2['img'] = get_field('button_two_photo');
$button2['label'] = get_field('button_two_label');
$button2['link'] = get_field('button_two_link');

$button3['img'] = get_field('button_three_photo');
$button3['label'] = get_field('button_three_label');
$button3['link'] = get_field('button_three_link');

$photoone = get_field('photo_one');
$phototwo = get_field('photo_two');
$photothree = get_field('photo_three');

get_header(); ?>
	<div id="mast" class="home">
    	<div class="container">
        <img id="photoone" src="<?php echo $photoone['url']; ?>" alt="<?php echo $photoone['alt']; ?>" />
        <img id="phototwo" src="<?php echo $phototwo['url']; ?>" alt="<?php echo $phototwo['alt']; ?>" />
        <img id="photothree" src="<?php echo $photothree['url']; ?>" alt="<?php echo $photothree['alt']; ?>" />
    	<div id="slider" >
            <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <?php 
              $args = array( 
                  'post_type'        => 'slide',
                  'posts_per_page'	=> -1,
                  'orderby'			=> 'menu_order',
                  'offset'			=> 0,
                  'post_status'		=> 'publish'
              );
              
              $slider = get_posts( $args );
              $dots = '';
              $i = 0;
              foreach ( $slider as $slide ){
                  
                  $id = $slide->ID; 
                  $slug = $slide->post_name; 
                  $title = get_the_title($id);
                  $link_url = get_field('link_url', $id);
                  $link_text = get_field('link_text', $id);
                  $slider_photo = get_field('slide_photo', $id); 
                  $newwindow = get_field('open_link_in_new_window', $id); 
              
                  echo '<div class="item'; if($i < 1){ echo ' active'; } echo '">';
                  if( $link_url!='' ){ echo '<a href="'.$link_url.'" >'; }
                  echo '	<img src="'.$slider_photo['url'].'" alt="'.$slider_photo['alt'].'" class="img-responsive" />';
                  if( $link_url!='' ){ echo '</a>'; }
                  if( $link_url!='' && $link_text!='' ){
                  echo '	<div class="carousel-caption" data-animation="animated fadeIn">';
                  echo '		<p class="slider-title">'.$title.'</p>';
                  echo '		<p class="carousel-more"><a href="'.$link_url.'"'; 
                  if($newwindow){ echo ' target="_blank"'; }
                  echo ' >'.$link_text.' <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>';
                  echo '	</div>';
                  }
                  echo '</div>';
                  
                  $dots .= '<li data-target="#home-carousel" data-slide-to="'.$i.'" '; if($i < 1){ $dots .= 'class="active"'; } $dots .= '></li>';
                  
                  $i++;
              }
              ?>
            </div>
             
            <!-- Controls -->
            <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
            	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            	<span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
            	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            	<span class="sr-only">Next</span>
            </a>
            
            <!-- Indicators -->
            <ol class="carousel-indicators">
            	<?php echo $dots; ?>
            </ol>
            </div>
        </div>
        
        </div>
    </div>
    <div id="mid" class="home">
        <div class="container">
        	<div id="feat-buttons" class="text-center">
            	<div class="row">
                	<div id="feat-button-1" class="col-sm-4" >
                    	<a class="feat-button center-block" href="<?php echo $button1['link']; ?>" ><span class="button-label"><?php echo $button1['label']; ?></span>
                    	<img src="<?php echo $button1['img']['url']; ?>" alt="<?php echo $button1['img']['alt']; ?>" class="img-responsive center-block" /></a>
                    </div>
                    <div id="feat-button-2" class="col-sm-4" >
                    	<a class="feat-button center-block" href="<?php echo $button2['link']; ?>" ><span class="button-label"><?php echo $button2['label']; ?></span>
                    	<img src="<?php echo $button2['img']['url']; ?>" alt="<?php echo $button2['img']['alt']; ?>" class="img-responsive center-block" /></a>
                    </div>
                    <div id="feat-button-3" class="col-sm-4" >
                    	<a class="feat-button center-block" href="<?php echo $button3['link']; ?>" ><span class="button-label"><?php echo $button3['label']; ?></span>
                    	<img src="<?php echo $button3['img']['url']; ?>" alt="<?php echo $button3['img']['alt']; ?>" class="img-responsive center-block" /></a>
                    </div>
                </div>
            </div>
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
                    <?php while ( have_posts() ) : the_post(); ?>
        				<div class="row" >
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                            <header class="entry-header col-md-12 col-lg-6">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header>
                        
                            <div class="entry-content col-md-12 col-lg-6">
                                <?php the_content(); ?>
                            </div>
                        
                        </article>
        				</div>
                    <?php endwhile; // End of the loop. ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
    <div id="blue-wave" class="home">
    	<div class="container">
        	<div class="row">
                <div id="review-snippets" class="col-lg-6" >
                	<div id="review-container">
                        <h3>Recent Reviews</h3>                         
                         <?php
							$sargs = array( 
								'post_type'        => 'testimonial',
								'posts_per_page'	=> 4,
								'orderby'			=> 'date',
								'offset'			=> 0,
								'post_status'		=> 'publish'
							);
							
							$count_posts = wp_count_posts('testimonial');
							$numreviews = $count_posts->publish;
							$stories = get_posts( $sargs );
							$j = 0;
							foreach ( $stories as $story ){
								$id = $story->ID; 
								$slug = $story->post_name; 
								$dateposted = human_time_diff( get_the_time('U', $id), current_time('timestamp') ) . ' ago';  
								$author = get_field('author', $id);
								$star_rating = get_field('star_rating', $id);
								$source = get_field('source', $id);
								
								$content = strip_tags(apply_filters('the_content', get_post_field('post_content', $id)));
								
								 ?>
															
				
									<div class="testimonial-home <?php if($j>0){ echo 'hidden-xs'; } ?>" >
									
									<?php
										echo '<p class="review-text">';
										echo truncate($content, 157, '<a class="review-more" href="/reviews/#'.$slug.'" >READ MORE</a>' );
										echo '</p>';
										echo '<span class="reviewby">&mdash; ';
										if($author !=''){ echo $author.', ';  }
										if($star_rating !=''){ echo ' rated '.$star_rating.' out of 5'; }
										if($source !=''){ echo ' on '.$source; }
										if($dateposted !=''){ echo ' '.$dateposted; }
										echo '</span>';
										
									?>
									</div>
									
									
							<?php $j++; } ?>
                         
                         
                         
                         <div id="review-link-container">
                         	<a href="/reviews/">Read all <?php echo $numreviews; ?> reviews</a>
                         	<a href="#">Write a review</a>
                         </div>  
                    </div>
                </div>
                <div id="social-feeds" class="col-lg-6" >
                    <div class="row">
                    	<div id="facebook-feed" class="col-sm-6" >
                        <div class="feed-container radbox" >
                        <div id="fb-root"></div>
							<script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=301113123239090";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        	<div class="fb-page" data-href="https://www.facebook.com/presnellsbaysidemarina" data-tabs="timeline" data-width="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/presnellsbaysidemarina"><a href="https://www.facebook.com/presnellsbaysidemarina">Presnell&#039;s Bayside Marina &amp; RV Resort</a></blockquote></div></div>
                        </div>
                        </div>
                        <div id="tripadvisor-feed" class="col-sm-6" >
                        <div class="feed-container radbox" >
                        	<!--<div id="TA_selfserveprop307" class="TA_selfserveprop">
                                <ul id="GDab0xB6" class="TA_links Ws8fx4AH8TYD">
                                <li id="3ynR4Tp09T" class="rrKa4ic19RE7">
                                <a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                                </li>
                                </ul>
                            </div>
                            <script src="http://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=307&amp;locationId=2189491&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=false&amp;display_version=2"></script>-->
							<div id="TA_selfserveprop677" class="TA_selfserveprop">
                            <ul id="p5NJpHXFrQcN" class="TA_links eVocry">
                            <li id="ef1ZWPvDCz" class="3ROXJMD3zV6M">
                            <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                            </li>
                            </ul>
                            </div>
                            <script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=677&amp;locationId=10066464&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=false&amp;display_version=2"></script>

						</div>
                        </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
