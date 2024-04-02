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

$button4['img'] = get_field('button_four_photo');
$button4['label'] = get_field('button_four_label');
$button4['link'] = get_field('button_four_link');

$photoone = get_field('photo_one');
$phototwo = get_field('photo_two');
$photothree = get_field('photo_three');

get_header(); ?>
<div id="headline" class="text-center"><img src="<?php echo get_template_directory_uri() . '/img/headline.png'; ?>" class="img-fluid" alt="Savor the Sun"></div>
<kma-slider id="mast"></kma-slider>
<div id="cta-bar" class="bg-accent py-3 py-md-4 py-lg-5 text-center d-flex justify-content-center flex-wrap">
    <div class="p-2 px-md-3" ><a href="https://www.campspot.com/book/presnell-vacation-resort-and-rv-park" target="_blank" class="btn btn-white bitter btn-lg">Book Online</a></div>
    <div class="p-2 px-md-3" ><a href="/sites-rates/rv-sites-pricing/" class="btn btn-white bitter btn-lg">RV Site Rates</a></div>
</div>
<div id="mid" class="home py-4 flex-grow-1">
    <div class="container">
        <div id="feat-buttons" class="text-center">
            <div class="row">
                <div id="feat-button-1" class="col-6 col-lg-3 mt-1 mb-4" >
                    <a class="feat-button d-block" href="<?php echo $button1['link']; ?>" >
                        <div class="feat-img flex-grow-1" style="background-image: url(<?php echo $button1['img']['url']; ?>);" ></div>
                        <div class="button-label"><?php echo $button1['label']; ?></div>
                    </a>
                </div>
                <div id="feat-button-2" class="col-6 col-lg-3 mt-1 mb-4" >
                    <a class="feat-button d-block" href="<?php echo $button2['link']; ?>" >
                    <div class="feat-img flex-grow-1" style="background-image: url(<?php echo $button2['img']['url']; ?>);" ></div>
                        <div class="button-label"><?php echo $button2['label']; ?></div>
                    </a>
                </div>
                <div id="feat-button-3" class="col-6 col-lg-3 mt-1 mb-4" >
                    <a class="feat-button d-block" href="<?php echo $button3['link']; ?>" >
                        <div class="feat-img flex-grow-1" style="background-image: url(<?php echo $button3['img']['url']; ?>);" ></div>
                        <div class="button-label"><?php echo $button3['label']; ?></div>
                    </a>
                </div>
                <div id="feat-button-4" class="col-6 col-lg-3 mt-1 mb-4" >
                    <a class="feat-button d-block" href="<?php echo $button4['link']; ?>" >
                        <div class="feat-img flex-grow-1" style="background-image: url(<?php echo $button4['img']['url']; ?>);" ></div>
                        <div class="button-label"><?php echo $button4['label']; ?></div>
                    </a>
                </div>
            </div>
        </div>
        <div id="primary" class="content-area">
            <main id="main" class="site-main text-center" role="main">
    
                <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <div class="row justify-content-center" >
                        <div class="entry-content col-lg-10">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            <?php the_content(); ?>
                            <p class="about-button"><a href="/about/our-property/" class="btn btn-outline-accent" >About Presnell's</a></p>
                        </div>
                    </div>
                </article>
                <?php endwhile; // End of the loop. ?>
    
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
</div>
<div id="sun" v-parallax="0.15" :min-width="992"></div>
<div id="sunset" v-parallax="0.05" :min-width="992"></div>
<div id="blue-wave" class="home">
    <div class="container">
        <div class="row no-gutters py-5">
            <div id="review-snippets" class="col-lg-6" >
                <div id="review-container">
                    <h3 class="bitter">Recent Reviews</h3>                         
                    <?php
                    $sargs = array( 
                        'post_type'        => 'testimonial',
                        'posts_per_page'	=> 3,
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
                                                    
        
                            <div class="testimonial-home <?php if($j>0){ echo 'd-none d-md-block'; } ?>" >
                            
                            <?php
                                echo '<p class="review-text">';
                                echo truncate($content, 157, '... <a style="color:rgba(255,255,255,.6)" class="review-more" href="/reviews/#'.$slug.'" >READ MORE</a>' );
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
                                            
                    <div class="d-flex flex-column flex-sm-row pt-4 pb-4 pb-lg-0">
                        <div class="py-2 px-3">
                        <a class="text-white" href="/reviews/">Read all <?php echo $numreviews; ?> reviews</a>
                        </div>
                        <div class="py-2 px-3">
                        <a class="text-white" target="_blank" href="https://www.facebook.com/pg/presnellsbaysidemarina/reviews/">Write a review</a>
                        </div>
                    </div>  
                </div>
            </div>
            <div id="social-feeds" class="col-lg-6" >
                <div class="row h-100">
                    <div id="facebook-feed" class="col-sm-6 px-5 px-sm-1 py-2 py-md-0 px-lg-2" >
                        <div class="feed-container radbox h-100" >
                            <facebook-feed 
                                page-url="https://www.facebook.com/presnellsbaysidemarina"
                                width="375"
                                height="500"
                                small-header="true"
                                hide-cover="true"
                                show-facepile="false"
                            ></facebook-feed>
                        </div>
                    </div>
                    <div id="tripadvisor-feed" class="col-sm-6 px-5 px-sm-1 py-md-0 px-lg-2" >
                        <div class="feed-container radbox h-100" >
                            <tripadvisor-feed
                                location-id="10066464"
                                num-reviews="3"
                            ></tripadvisor-feed>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tree-left" class="d-none d-md-block" ></div>
    <div id="tree-right" class="d-none d-md-block" ></div>
</div>
<?php get_footer(); ?>
<script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=951&amp;locationId=10066464&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=false&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>