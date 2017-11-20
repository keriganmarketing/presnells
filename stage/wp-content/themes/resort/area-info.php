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
    <div id="mid" class="support">
        <div class="container">
        	<div class="row">
            <div id="primary" class="content-area col-md-9 col-lg-8">
                <main id="main" class="site-main" role="main">
        
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
        
                    <?php endwhile; // End of the loop. ?>
                    
                    
					<?php $map = get_field('area_map');
                    if( !empty($map)){ ?>
					<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
					<script type="text/javascript">
                    (function($) {
                    
                    /*
                    *  new_map
                    *
                    *  This function will render a Google Map onto the selected jQuery element
                    *
                    *  @type	function
                    *  @date	8/11/2013
                    *  @since	4.3.0
                    *
                    *  @param	$el (jQuery element)
                    *  @return	n/a
                    */
                    
                    function new_map( $el ) {
                        
                        // var
                        var $markers = $el.find('.marker');
                        
                        
                        // vars
                        var args = {
                            zoom		: 16,
                            center		: new google.maps.LatLng(0, 0),
                            mapTypeId	: google.maps.MapTypeId.ROADMAP
                        };
                        
                        
                        // create map	        	
                        var map = new google.maps.Map( $el[0], args);
                        
                        
                        // add a markers reference
                        map.markers = [];
                        
                        
                        // add markers
                        $markers.each(function(){
                            
                            add_marker( $(this), map );
                            
                        });
                        
                        
                        // center map
                        center_map( map );
                        
                        
                        // return
                        return map;
                        
                    }
                    
                    /*
                    *  add_marker
                    *
                    *  This function will add a marker to the selected Google Map
                    *
                    *  @type	function
                    *  @date	8/11/2013
                    *  @since	4.3.0
                    *
                    *  @param	$marker (jQuery element)
                    *  @param	map (Google Map object)
                    *  @return	n/a
                    */
                    
                    function add_marker( $marker, map ) {
                    
                        // var
                        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
                    
                        // create marker
                        var marker = new google.maps.Marker({
                            position	: latlng,
                            map			: map
                        });
                    
                        // add to array
                        map.markers.push( marker );
                    
                        // if marker contains HTML, add it to an infoWindow
                        if( $marker.html() )
                        {
                            // create info window
                            var infowindow = new google.maps.InfoWindow({
                                content		: $marker.html()
                            });
                    
                            // show info window when marker is clicked
                            google.maps.event.addListener(marker, 'click', function() {
                    
                                infowindow.open( map, marker );
                    
                            });
                        }
                    
                    }
                    
                    /*
                    *  center_map
                    *
                    *  This function will center the map, showing all markers attached to this map
                    *
                    *  @type	function
                    *  @date	8/11/2013
                    *  @since	4.3.0
                    *
                    *  @param	map (Google Map object)
                    *  @return	n/a
                    */
                    
                    function center_map( map ) {
                    
                        // vars
                        var bounds = new google.maps.LatLngBounds();
                    
                        // loop through all markers and create bounds
                        $.each( map.markers, function( i, marker ){
                    
                            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
                    
                            bounds.extend( latlng );
                    
                        });
                    
                        // only 1 marker?
                        if( map.markers.length == 1 )
                        {
                            // set center of map
                            map.setCenter( bounds.getCenter() );
                            map.setZoom( 12 );
                        }
                        else
                        {
                            // fit to bounds
                            map.fitBounds( bounds );
                        }
                    
                    }
                    
                    /*
                    *  document ready
                    *
                    *  This function will render each map when the document is ready (page has loaded)
                    *
                    *  @type	function
                    *  @date	8/11/2013
                    *  @since	5.0.0
                    *
                    *  @param	n/a
                    *  @return	n/a
                    */
                    // global var
                    var map = null;
                    
                    $(document).ready(function(){
                    
                        $('.acf-map').each(function(){
                    
                            // create map
                            map = new_map( $(this) );
                    
                        });
                    
                    });
                    
                    })(jQuery);
                    </script>
                    <div class="acf-map-container">
                        <div class="acf-map">
                            <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
                        </div>
                    </div>
                    <?php }	?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
            <div id="secondary" class="widget-area col-md-3 col-lg-4" role="complementary">
	
            <?php
				$areaPhoto = get_field('main_photo');
				if($areaPhoto != ''){
					echo '<img src="'.$areaPhoto['url'].'" alt="'.$areaPhoto['alt'].'" class="img-responsive" />';
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
