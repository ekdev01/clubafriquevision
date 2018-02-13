<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $post,$EM_Event;
	
	// Get Post Meta Elements detail 
	$event_social = '';
	$sidebar = '';
	$left_sidebar = '';
	$right_sidebar = '';
	$event_thumbnail = '';
	$video_url_type = '';
	$select_slider_type = '';
	$event_detail_xml = get_post_meta($post->ID, 'event_detail_xml', true);
	if($event_detail_xml <> ''){
		$cp_event_xml = new DOMDocument ();
		$cp_event_xml->loadXML ( $event_detail_xml );
		$event_social = find_xml_value($cp_event_xml->documentElement,'event_social');
		$sidebar = find_xml_value($cp_event_xml->documentElement,'sidebar_event');
		$left_sidebar = find_xml_value($cp_event_xml->documentElement,'left_sidebar_event');
		$right_sidebar = find_xml_value($cp_event_xml->documentElement,'right_sidebar_event');
		$event_thumbnail = find_xml_value($cp_event_xml->documentElement,'event_thumbnail');
		$video_url_type = find_xml_value($cp_event_xml->documentElement,'video_url_type');
		$select_slider_type = find_xml_value($cp_event_xml->documentElement,'select_slider_type');
	}
	
	
	$select_layout_cp = '';
	$color_scheme = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		$color_scheme = find_xml_value($cp_logo->documentElement,'color_scheme');
	}
	
	$sidebar_class = '';
	$content_class = '';
	
	$header_style = '';
	$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
	//Print Style 6
	if(print_header_html_val($header_style) == 'Style 6'){
		print_header_html($header_style);
	}
	
	//Get Sidebar for page
	$sidebar_class = sidebar_func($sidebar);
	//print_r($EM_Event);
	if(!empty($EM_Event->location_id->name)){
		$location_summary = "<b>" . $EM_Event->get_location()->name . "</b><br/>" . $EM_Event->get_location()->address . " - " . $EM_Event->get_location()->town;
	}
	?>
<?php if($EM_Event->get_location()->location_latitude <> 0 AND $EM_Event->get_location()->location_longitude <> 0){ ?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript">
		jQuery(function () {
			var map;
			var myLatLng = new google.maps.LatLng(<?php echo $EM_Event->get_location()->location_latitude;?>, <?php echo $EM_Event->get_location()->location_longitude;?>)
			//Initialize MAP
			var myOptions = {
				zoom: 13,
				center: myLatLng,
				disableDefaultUI: true,
				zoomControl: true,
				styles:[
					{
						stylers: [
							{ hue: '<?php echo $color_scheme;?>' },
							{ saturation: -10 },
						]
					}
				],
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById('map_contact_1'),myOptions);
			//End Initialize MAP
			//Set Marker
			var marker = new google.maps.Marker({
			  position: map.getCenter(),
			  map: map
			});
			marker.getPosition();
			//End marker
			
			//Set info window
			var contentString = '<div id="content">'+
			  '<div id="siteNotice">'+
			  '<p><?php echo $EM_Event->event_name;?></p>'+
			  '<?php echo get_the_post_thumbnail($EM_Event->post_id, array(60,60));?>'+
			  '</div>'+
			  '<div id="bodyContent">'+
			  '<p><i class="fa fa-map-marker"></i>' +
			  '</p>'+
			  '</div>'+
			  '</div>';
			
			var infowindow = new google.maps.InfoWindow({
			content: contentString,
			position: myLatLng
			});
			var marker, i;
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.open(map);
				}
			})(marker, i));
			
		});
	</script>
	<?php }	
	$header_style = '';
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
	?>
	 <!--Banner Start-->
    <div id="banner">
	<?php $breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
	if($breadcrumbs == 'enable'){ ?>
      <div id="inner-banner">
        <div class="container">
          <div class="row-fluid">
            <h1><?php echo $EM_Event->event_name;?></h1>
			<!--Breadcrumb Start-->
			<?php
				if(!is_front_page()){
					echo cp_breadcrumbs();
				}
			}
			?>
          </div>
        </div>
      </div>
    </div>
    <!--Banner End--> 

	<!--Inner Pages Heading Area End--> 
    <div class="contant">
    	<div class="container">
             <!--BREADCRUMS START-->
            <div class="loc">
			   <?php
				//print_r($EM_Event);
				if(!empty($EM_Event->location_id->name)){
					$location_summary = "<b>" . $EM_Event->get_location()->name . "</b><br/>" . $EM_Event->get_location()->address . " - " . $EM_Event->get_location()->town;
				}
			   ?>
            </div>
            <!--BREADCRUMS END-->
            <!--MAIN CONTANT ARTICLE START-->
			<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp';
			}else {
				$class_margin='';
			}
			?>
            <div class="main-content <?php echo $class_margin;?>">
				<div class="single_content row-fluid">
					<?php
					if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
						<div id="block_first" class="sidebar <?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-left'){?>
					<div id="block_first_left" class="sidebar <?php echo $sidebar_class[0];?>">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>
					<div id="event-<?php the_ID(); ?>"  class="blog-content <?php echo $sidebar_class[1];?> em-cp-events"> 
						<div <?php post_class(); ?>>
							<!--Photo Post Start-->
							<div class="blog-box-1">
								<div class="frame"> <a href="<?php echo $EM_Event->guid;?>"><?php echo get_the_post_thumbnail($EM_Event->post_id, array(1170,350));?></a>
									<div class="inner row-fluid">
										<div class="inner-map span8">
											<div id="map_contact_1" class="map_canvas-2 active"></div>
										</div>
										<div class="timer-area span4">
											<ul>
												<li><a href="<?php echo $EM_Event->guid;?>"><i class="fa fa-calendar"></i><?php _e('Start Date :','crunchpress');?><?php echo date(get_option('date_format'),strtotime($EM_Event->start_date));?></a></li>
												<li><a href="<?php echo $EM_Event->guid;?>"><i class="fa fa-clock-o"></i><?php _e('End Date :','crunchpress');?><?php echo date(get_option('date_format'),strtotime($EM_Event->end_date));?></a></li>
												<li><a href="<?php echo $EM_Event->guid;?>"><i class="fa fa-microphone"></i><?php echo get_the_author();?></a></li>
												<li><a href="<?php echo $EM_Event->guid;?>"><i class="fa fa-map-marker"></i><?php if($EM_Event->location_id <> 0){ echo $EM_Event->location->location_address; }else{_e('Location Disabled','crunchpress');}?></a></li>
											</ul>
											<?php
											//Get Date in Parts
											$event_year = date('Y',$EM_Event->start);
											$event_month = date('m',$EM_Event->start);
											$event_month_alpha = date('M',$EM_Event->start);
											$event_day = date('d',$EM_Event->start);

											//Change time format
											$event_start_time_count = date("G,i,s", strtotime($EM_Event->start_time)); ?>
											
											<div class="event-detail-timer">
												<script>
													jQuery(function () {
														var austDay = new Date();
														austDay = new Date(<?php echo $event_year;?>, <?php echo $event_month;?>-1, <?php echo $event_day;?>,<?php echo $event_start_time_count;?>)
														jQuery('#count_<?php echo $EM_Event->post_id; ?>').countdown({
															labels: ['<?php _e('YRS','crunchpress');?>', '<?php _e('MNTH','crunchpress');?>', '<?php _e('Weeks','crunchpress');?>', '<?php _e('Days','crunchpress');?>', '<?php _e('HRS','crunchpress');?>', '<?php _e('MIN','crunchpress');?>', '<?php _e('SEC','crunchpress');?>'],
															until: austDay
														});
														jQuery('#year').text(austDay.getFullYear());
													});                
												</script>
												<div class="defaultCountdown" id="count_<?php echo $EM_Event->post_id; ?>"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="text">
									<?php 
									echo '<h2>'.get_the_title().'</h2>';
									//Fetching the Description from Database and Printing here
									$content = str_replace(']]>', ']]&gt;',$EM_Event->post_content); ?>
									<p> <?php echo do_shortcode($content); ?> </p>
								  <div class="contact-me-row2"> <strong class="title"><?php _e('Tags:','crunchpress');?></strong>
								    <ul>
										<?php 
											$variable_category = wp_get_post_terms( $EM_Event->post_id, 'event-tags');
											$counterr = 0;
											foreach($variable_category as $values){
												//if($counterr == 0){ echo '<i class="fa fa-tags"></i>';}
												$counterr++;
												echo ' <li><a class="event-tag" href="'.get_term_link(intval($values->term_id),'event-tags').'">'.$values->name.'</a>,</li>';
											}
										?>
									</ul>
									<br/><hr />
									<ul>
									<strong class="title"><?php _e('Bookings:','crunchpress');?></strong>
										<?php booking_form_event_manager();?>
									</ul>
								  </div>
								  <div class="share-socila"> <strong class="title"><?php _e('Share:','crunchpress');?></strong>
									<?php include_social_shares();?>
								  </div>
									<?php comments_template(); ?>
								</div>
							</div>
						</div>
					</div>		
					<?php
					if($sidebar == "both-sidebar-right"){?>
						<div class="<?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
					<div class="<?php echo $sidebar_class[0];?>">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>						   
				</div>
		</div>
		</div>
	</div>
<?php 
	}
}

?>
<div class="clear"></div>
<?php get_footer(); ?>