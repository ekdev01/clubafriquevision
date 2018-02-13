<?php 
	/*
	 * This file is used to generate single post page.
	 */	
get_header(); 
if ( have_posts() ){ while (have_posts()){ the_post();

	global $post,$post_id;
	// Get Album Meta Elements detail 
	$sermons_detail_xml = '';
	$event_social = '';
	$sidebar = '';
	$right_sidebar_event = '';
	$left_sidebar_event = '';
	$video_url_type = '';
	$soundcloud_url_type = '';
	$sermons_detail_xml = get_post_meta($post->ID, 'sermons_detail_xml', true);
	if($sermons_detail_xml <> ''){
		$cp_album_xml = new DOMDocument ();
		$cp_album_xml->loadXML ( $sermons_detail_xml );
		$event_social = find_xml_value($cp_album_xml->documentElement,'event_social');
		$sidebar_event = find_xml_value($cp_album_xml->documentElement,'sidebar_event');
		$left_sidebar_event = find_xml_value($cp_album_xml->documentElement,'left_sidebar_event');
		$right_sidebar_event = find_xml_value($cp_album_xml->documentElement,'right_sidebar_event');
		$video_url_type = find_xml_value($cp_album_xml->documentElement,'video_url_type');
		$soundcloud_url_type = find_xml_value($cp_album_xml->documentElement,'soundcloud_url_type');
	}
	
	$select_layout_cp = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
	}
	
	
	$track_name_xml = get_post_meta($post->ID, 'track_name_xml', true);
	$track_url_xml = get_post_meta($post->ID, 'track_url_xml', true);
	$track_des_xml = get_post_meta($post->ID, 'track_des_xml', true);
	$track_down_xml = get_post_meta($post->ID, 'track_down_xml', true);
	$sidebar_class = '';
	$content_class = '';
	
	//Sidebar function
	$sidebar_class = sidebar_func($sidebar);
	
	wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
	wp_enqueue_script('prettyPhoto');

	wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
	wp_enqueue_script('cp-pscript');	

	wp_enqueue_style('prettyPhoto',CP_PATH_URL.'/frontend/css/prettyphoto.css');
	
	?>
	<div id="progress_news" class="mbtm cp-margin-top">
		<!--Inner Pages Heading Area Start-->
		<div class="inner-headding">
		  <div class="container">
			<div class="row-fluid">
				<div class="span12">
					<h1><?php echo get_the_title();?></h1>
					<?php
						if(!is_front_page()){
							echo cp_breadcrumbs();
						}
					?>
				</div>
			</div>
		  </div>
		</div>
		<!--Inner Pages Heading Area End--> 
		<div class="<?php if($select_layout_cp == 'full_layout'){echo 'container';}else{echo 'container-boxed';}?>">
			<div class="<?php if($select_layout_cp == 'full_layout'){echo '';}else{echo 'container-fluid';}?>">
				<div id="blockContainer" class="row-fluid">
					<div class="page_content">
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
						<div id="post-<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> blog_post_detail post-bar">
							<div <?php post_class(); ?>>
								<div class="sermon-frame">
								  <?php echo get_the_post_thumbnail($post_id, array(1170,350));?>
									<div class="sermon-detail-row">
										<ul class="left gallery">
											<li><a href="<?php echo get_permalink();?>"><i class="fa fa-user"></i><?php echo get_the_author();?></a></li>
											<li><a href="<?php echo get_permalink();?>"><i class="fa fa-calendar"></i><?php echo get_the_date();?></a></li>
											<li>
												<?php
													//Get Post Comment 
													comments_popup_link( __('<i class="fa fa-comments-o"></i>0 Comment','crunchpress'),
													__('<i class="fa fa-comments-o"></i>1 Comment','crunchpress'),
													__('<i class="fa fa-comments-o"></i>% Comments','crunchpress'), '',
													__('<i class="fa fa-comments-o"></i>Comments are off','crunchpress') );										
												?>
											</li>
											<?php if($video_url_type <> ''){ ?><li><a data-rel="prettyphoto" href="<?php echo $video_url_type;?>"><i class="fa fa-video-camera"></i><?php _e('Video','crunchpress');?></a></li><?php }?>													
											<?php if($soundcloud_url_type <> ''){ ?><li><a class="cp-detail-soundrock" ><i class="fa fa-soundcloud"></i><?php _e('Sound Cloud','crunchpress');?></a></li><?php }?>
										</ul>
										<?php include_social_shares();?>
									</div>
									<?php if($soundcloud_url_type <> ''){ ?>
										<div class="soundcloud-sermon-detail">
											<?php echo do_shortcode('[soundcloud type="visual-embed" url="https://api.soundcloud.com/tracks/'.$soundcloud_url_type.'" color="#1e73be" auto_play="false" hide_related="true" show_artwork_or_visual="true" width="100%" height="200" iframe="true" /]');?>
										</div>
									<?php }?>									
								</div>
								<?php 
								echo '<h4>'.get_the_title().'</h4>';
									echo '<div class="content-sermon">';
										the_content();				
									echo '</div>';
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rockon' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );	
								?>
								<div class="auther-box">
									<h4><?php _e('Sermons List','crunchpress');?></h4>
								<?php
									//Fetching All Tracks from Database
									$track_name_xml = get_post_meta($post->ID, 'track_name_xml', true);
									$track_url_xml = get_post_meta($post->ID, 'track_url_xml', true);
									$track_des_xml = get_post_meta($post->ID, 'track_des_xml', true);
									$track_down_xml = get_post_meta($post->ID, 'track_down_xml', true);
									
									//Empty Variables
									$children = '';
									$children_title = '';

									//Track Name
									if($track_name_xml <> ''){
										$ingre_xml = new DOMDocument();
										$ingre_xml->recover = TRUE;
										$ingre_xml->loadXML($track_name_xml);
										$children_name = $ingre_xml->documentElement->childNodes;
									}		
									
									//Track URL
									if($track_url_xml <> ''){	
										$ingre_title_xml = new DOMDocument();
										$ingre_title_xml->recover = TRUE;
										$ingre_title_xml->loadXML($track_url_xml);
										$children_title = $ingre_title_xml->documentElement->childNodes;
									}
									
									//Track Description
									if($track_des_xml <> ''){	
										$ingre_des_xml = new DOMDocument();
										$ingre_des_xml->recover = TRUE;
										$ingre_des_xml->loadXML($track_des_xml);
										$children_des = $ingre_des_xml->documentElement->childNodes;
									}
									
									//Track Download Fetch
									if($track_down_xml <> ''){	
										$ingre_down_xml = new DOMDocument();
										$ingre_down_xml->recover = TRUE;
										$ingre_down_xml->loadXML($track_down_xml);
										$children_down = $ingre_down_xml->documentElement->childNodes;
										
									}
									//Jplayer Music Started	
									wp_register_script('cp-jplayer', CP_PATH_URL.'/frontend/js/jquery.jplayer.min.js', false, '1.0', true);
									wp_enqueue_script('cp-jplayer');?>
										
										<?php
									//Combine Loop
									if($track_name_xml <> '' || $track_url_xml <> ''){
										$counter_track = 0;
										$nofields = $ingre_xml->documentElement->childNodes->length;
										for($i=0;$i<$nofields;$i++) { 
										$counter_track++; ?>
										<div class="sermons-list-box">
											<div class="text-box">
												<div class="text-box gallery">
													<?php if($children_des->item($i)->nodeValue <> ''){ ?><a data-rel="prettyPhoto[inline]" class="lyrics download" href="#lyrics_class-<?php echo $i;?>"><i class="fa fa-file-text"></i></a><?php }?>
													<?php if($children_down->item($i)->nodeValue <> 'No'){ ?><a class="download" href="<?php echo $children_title->item($i)->nodeValue;?>"><i class="fa fa-arrow-circle-down"></i></a><?php }?>
													<div id="lyrics_class-<?php echo $i;?>" class="hide lyrics_class"><?php echo $children_des->item($i)->nodeValue;?></div>												
													<a class="play"><i class="fa fa-play-circle"></i></a>
													<div class="sermon-desc">
														<strong class="title"><?php echo $children_name->item($i)->nodeValue;?></strong>
														<p><?php echo substr($children_des->item($i)->nodeValue,0,85);?></p>
													</div>
												</div>
												<figure class="main-gallery-slider single-sermon-playlist">
													<div id="jp_container_<?php echo $counter_track;?>" class="jp-video jp-video-270p">
														<div class="jp-type-playlist">
															<div id="jquery_jplayer_<?php echo $counter_track;?>" class="jp-jplayer"></div>
															<div class="jp-gui">
																<div class="jp-video-play">
																	<a href="javascript:;" class="jp-video-play-icon" tabindex="1"><?php _e('play','crunchpress');?></a>
																</div>
																<div class="jp-interface">
																	<div class="jp-controls-holder">
																		<ul class="jp-controls">
																			<li><a href="javascript:;" class="jp-previous" tabindex="1"></a></li>
																			<li><a href="javascript:;" class="jp-play" tabindex="1"></a></li>
																			<li><a href="javascript:;" class="jp-pause" tabindex="1"></a></li>
																			<li><a href="javascript:;" class="jp-next" tabindex="1"></a></li>
																			
																		</ul>
																		<div class="jp-progress">
																			<div class="jp-seek-bar">
																				<div class="jp-play-bar"></div>
																			</div>
																		</div>
																		<ul class="volume-control">
																			<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute"></a></li>
																			<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"></a></li>
																			<li class="jp-volume-bar"><div class="jp-volume-bar-value"></div></li>
																			<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume"></a></li>
																		</ul>
																		<ul class="jp-toggles">
																			<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat"></a></li>
																			<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off"></a></li>
																		</ul>
																	</div>
																	<div class="jp-title">
																		<ul>
																			<li></li>
																		</ul>
																	</div>
																</div>
															</div>
															<div class="jp-playlist">
																<ul>
																	<!-- The method Playlist.displayPlaylist() uses this unordered list -->
																	<li></li>
																</ul>
															</div>
															<div class="jp-no-solution">
																<span><?php _e('Update Required','crunchpress');?></span>
																<?php _e('To play the media you will need to either update your browser to a recent version or update your','crunchpress');?> <a href="http://get.adobe.com/flashplayer/" target="_blank"><?php _e('Flash plugin','crunchpress');?></a>.
															</div>
														</div>
													</div>
												</figure>
												<script type="text/javascript">
													//<![CDATA[
													jQuery(document).ready(function($){
														var stream = {
															<?php	
																$img_url_aa = 'http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png';															
																echo 'title:"'.$children_name->item($i)->nodeValue.'",';
																echo 'artist:"'.$children_name->item($i)->nodeValue.'",';
																echo 'mp3:"'.$children_title->item($i)->nodeValue.'",';
																echo 'poster:"'.$img_url_aa.'"';
															?>
														},
														ready = false;
														$("#jquery_jplayer_<?php echo $counter_track;?>").jPlayer({
															ready: function (event) {
																ready = true;
																$(this).jPlayer("setMedia", stream);
															},
															pause: function() {
																$(this).jPlayer("clearMedia");
															},
															error: function(event) {
																if(ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET) {
																	// Setup the media stream again and play it.
																	$(this).jPlayer("setMedia", stream).jPlayer("play");
																}
															},
															cssSelectorAncestor: "#jp_container_<?php echo $counter_track;?>",
															swfPath: "<?php echo CP_PATH_URL?>/frontend/js/Jplayer.swf",
															supplied: "mp3",
															preload: "none",
															wmode: "window",
															keyEnabled: true
														});
														$('#jp_poster_0').remove();
														$('#jp_poster_1').remove();
														$('#jp_poster_2').remove();
														$('#jp_poster_3').remove();
														$('#jp_poster_4').remove();
														$('#jp_poster_5').remove();
														$('#jp_poster_6').remove();
														$('#jp_poster_7').remove();
														$('#jp_poster_8').remove();
														$('#jp_poster_9').remove();
														$('#jp_poster_10').remove();
														$('#jp_poster_11').remove();
														$('#jp_poster_12').remove();
														$('#jp_poster_13').remove();
														$('#jp_poster_14').remove();
													});
													//]]>
												</script>
											</div>	
										</div>	
									<?php }?>											  
								<?php }?>
								</div>
							</div>
							<div class="auther-box">
								<h4><?php _e('About Author','crunchpress');?></h4>
								<div class="frame"><a href="#"><?php echo get_avatar(get_the_author_meta( 'ID' ));?></a></div>
								<div class="text-box">
									<strong class="title"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></strong>
									<p><?php echo mb_substr(get_the_author_meta( 'description' ),0,360);?></p>
								</div>
							</div>
							<?php comments_template(); ?>
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
	</div>
<?php 
	}
}
?>
<div class="clear"></div>
<?php get_footer(); ?>
