<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CrunchPress
 * @subpackage Rockon
 */
?>
	
	<?php	
	$footer_style = get_themeoption_value('select_footer_cp','general_settings');
	$twitter_feed = get_themeoption_value('twitter_feed','general_settings');
	$twitter_home_button = get_themeoption_value('twitter_home_button','general_settings');
	$twitter_id = get_themeoption_value('twitter_id','general_settings');
	$consumer_key = get_themeoption_value('consumer_key','general_settings');
	$consumer_secret = get_themeoption_value('consumer_secret','general_settings');
	$access_token = get_themeoption_value('access_token','general_settings');
	$access_secret_token = get_themeoption_value('access_secret_token','general_settings');
	//Turn on Twitter from theme options
	if(class_exists('function_library')){
		if($twitter_feed == 'enable'){ 
			if($twitter_home_button == 'enable'){
				wp_reset_query();
				wp_reset_postdata();
				if(is_front_page()){
					$tweets = get_tweets( $twitter_id,10, $consumer_key, $consumer_secret, $access_token, $access_secret_token ); ?>
					<script type="text/javascript">
						jQuery(document).ready(function($){
							$('#twitter-fade').bxSlider({
								mode:'fade',
								auto:true
							});
						});
					</script>
					<!--Twitter Area Start-->
					<div class="twitter-area">
						<div class="twitter-area-head">&nbsp;</div>
						  <div class="container">
							<div class="row-fluid">
								<ul id="twitter-fade">
								<?php
								//print_r($tweets);
								
								//Twitter condition start
								if($tweets <> ''){
									$counter_twitter = 0;
									foreach($tweets as $values){ ?>
											<li>
												<div class="twitter-box">
													<div class="top-row">
														<div class="twit-round-outer">
															<div class="twit-round"><i class="fa fa-twitter"></i></div>
														</div>
														<div class="name-box">
															<strong class="name"><?php echo $values->user->name;?></strong>
															<div class="name-box-inner"><strong>@<?php echo $values->user->screen_name;?></strong></div>
														</div>
														<div class="twit-round-outer">
															<div class="img-round"><img src="<?php echo $values->user->profile_image_url;?>" alt="<?php echo $values->user->screen_name;?>" /></div>
														</div>
													</div>
													<div class="text-row">
														<strong class="title"><?php echo $values->text;?></strong> <strong class="time"><?php echo date(get_option('date_format'),strtotime($values->created_at));?></strong>
														<div class="twitter-info-box">
															<ul>
																<li> <strong class="number"><?php echo $values->user->statuses_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $values->user->screen_name; ?>/status/<?php echo $values->id_str; ?>">Tweets</a> </li>
																<li> <strong class="number"><?php echo $values->user->friends_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $values->user->screen_name; ?>/status/<?php echo $values->id_str; ?>">Following</a> </li>
																<li> <strong class="number"><?php echo $values->user->followers_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $values->user->screen_name; ?>/status/<?php echo $values->id_str; ?>">Followers</a> </li>
															</ul>
														</div>
													</div>
												</div>
											</li>
									<?php
									} // Foreach loop Ends Here
									
								}// Condition Ends Here
								?>
								</ul>
							</div>
						</div>
					</div>
					<!--Twitter Area End--> 
			<?php 
				}
			}else{ 			
				$tweets = get_tweets( $twitter_id,10, $consumer_key, $consumer_secret, $access_token, $access_secret_token ); ?>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('#twitter-fade').bxSlider({
							mode:'fade',
							auto:true
						});
					});
				</script>
				<!--Twitter Area Start-->
				<div class="twitter-area">
					<div class="twitter-area-head">&nbsp;</div>
					  <div class="container">
						<div class="row-fluid">
							<ul id="twitter-fade">
							<?php
							//Twitter condition start
							if($tweets <> ''){
								$counter_twitter = 0;
								foreach($tweets as $keys=>$val){ ?>
										<li>
											<div class="twitter-box">
												<div class="top-row">
													<div class="twit-round-outer">
														<div class="twit-round"><i class="fa fa-twitter"></i></div>
													</div>
													<div class="name-box">
														<strong class="name"><?php echo $val->user->name;?></strong>
														<div class="name-box-inner"><strong>@<?php echo $val->user->screen_name;?></strong></div>
													</div>
													<div class="twit-round-outer">
														<div class="img-round"><img src="<?php echo $val->user->profile_image_url;?>" alt="<?php echo $val->user->screen_name;?>" /></div>
													</div>
												</div>
												<div class="text-row">
													<strong class="title"><?php echo $val->text;?></strong> <strong class="time"><?php echo date(get_option('date_format'),strtotime($val->created_at));?></strong>
													<div class="twitter-info-box">
														<ul>
															<li> <strong class="number"><?php echo $val->user->statuses_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $val->user->screen_name; ?>/status/<?php echo $val->id_str; ?>">Tweets</a> </li>
															<li> <strong class="number"><?php echo $val->user->friends_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $val->user->screen_name; ?>/status/<?php echo $val->id_str; ?>">Following</a> </li>
															<li> <strong class="number"><?php echo $val->user->followers_count;?></strong> <a class="tweet" href="http://twitter.com/<?php echo $val->user->screen_name; ?>/status/<?php echo $val->id_str; ?>">Followers</a> </li>
														</ul>
													</div>
												</div>
											</div>
										</li>
								<?php
								} // Foreach loop Ends Here
								
							}// Condition Ends Here
							?>
							</ul>
						</div>
					</div>
				</div>
				<!--Twitter Area End--> 
			<?php }
		}
	}
	?>

    <!--Footer 1 Start-->
	
	<?php $footer_style = get_themeoption_value('select_footer_cp','general_settings');
	if( $footer_style == 'Style 1'){?>

    <footer id="footer"> 
		<!--Footer Top Start-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('sidebar-footer'); ?>
				</div>
			</div>
		</div>
		<?php
			$footer_logo = get_themeoption_value('footer_logo','general_settings');
			$footer_link = get_themeoption_value('footer_link','general_settings');
			$footer_logo_width = get_themeoption_value('footer_logo_width','general_settings');
			$footer_logo_height = get_themeoption_value('footer_logo_height','general_settings');
		?>
		<!--Footer Top End--> 
		<div class="clear"></div>
		<!--Footer Social Start-->
		<div class="footer-social">
			<div class="container">
				<div class="footer-top-sec">
					<strong class="footer-logo">
						<a class="" title="<?php bloginfo('name'); ?><?php wp_title( ' - ', true, 'left' ); ?>" href="<?php echo home_url(); ?>">
							<?php
							if(!empty($footer_logo)){ 
								$image_src_head = wp_get_attachment_image_src( $footer_logo, 'full' );
								$image_src_head = (empty($image_src_head))? '': $image_src_head[0];
								$thumb_src_preview = wp_get_attachment_image_src( $footer_logo, 'full');
								if($thumb_src_preview[0] <> ''){
									echo '<img width="'.$footer_logo_width.'" height="'.$footer_logo_height.'" src="'.$thumb_src_preview[0].'" alt="footer logo" />';
								}else{
									echo '<img src="'.CP_PATH_URL.'/images/footer-logo.png" alt="footer logo" />';
								}
							}else{
								echo '<img src="'.CP_PATH_URL.'/images/footer-logo.png" alt="footer logo" />';
							}
							?>
						</a>
					</strong>
					<div class="footer-social-box">
						<?php		
						$social_networking = get_themeoption_value('social_networking','general_settings');
						if($social_networking == 'enable'){ 
						$facebook_network = get_themeoption_value('facebook_network','social_settings');
						$twitter_network = get_themeoption_value('twitter_network','social_settings');
						$delicious_network = get_themeoption_value('delicious_network','social_settings');
						$google_plus_network = get_themeoption_value('google_plus_network','social_settings');
						$linked_in_network = get_themeoption_value('linked_in_network','social_settings');
						$youtube_network = get_themeoption_value('youtube_network','social_settings');
						$flickr_network = get_themeoption_value('flickr_network','social_settings');
						$vimeo_network = get_themeoption_value('vimeo_network','social_settings');
						$pinterest_network = get_themeoption_value('pinterest_network','social_settings'); 
						$Instagram_network = get_themeoption_value('Instagram_network','social_settings'); 
						$github_network = get_themeoption_value('github_network','social_settings'); 
						$skype_network = get_themeoption_value('skype_network','social_settings'); ?>
							<ul>
								<?php if($facebook_network <> ''){ ?><li><a title="Facebook" class="social-color-1" href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
								<?php if($twitter_network <> ''){ ?><li><a title="Twitter" class="social-color-2" href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
								<?php if($delicious_network <> ''){ ?><li><a title="Delicious" class="social-color-3" href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
								<?php if($google_plus_network <> ''){ ?><li><a title="Google Plus" class=" social-color-4" href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
								<?php if($linked_in_network <> ''){ ?><li><a title="LinkedIn" class="social-color-5" href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
								<?php if($youtube_network <> ''){ ?><li><a title="Youtube" class="social-color-6" href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
								<?php if($flickr_network <> ''){ ?><li><a title="Flickr" class="social-color-1" href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
								<?php if($vimeo_network <> ''){ ?><li><a title="Vimeo" class="social-color-3" href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
								<?php if($pinterest_network <> ''){ ?><li><a title="Pinterest" class="social-color-4" href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
								<?php if($Instagram_network <> ''){ ?><li><a title="Instagram" class="social-color-1" href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
								<?php if($github_network <> ''){ ?><li><a title="GitHub" class="social-color-6" href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
								<?php if($skype_network <> ''){ ?><li><a title="Skype" class="social-color-7" href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
							</ul>	
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<!--Footer Social End--> 
		<!--Footer Copyright Start-->
		<div class="footer-copyright"><?php echo get_themeoption_value('copyright_code','general_settings');?></div>
		<!--Footer Copyright End--> 
	</footer>
	<?php }else{ // footer style 2 ?>
	<footer id="footer"> 
      <!--CAUSES FOOTER START-->
      <div class="causes-footer">
        <div class="container">
          <div class="row">
            <?php dynamic_sidebar('sidebar-footer'); ?>
           </div>
		</div>
        <div class="cp_newsletter-row">
          <div class="container">
            <div class="row">
              <div class="span6">
			
				<?php
					$footer_logo = get_themeoption_value('footer_logo','general_settings');
					$footer_link = get_themeoption_value('footer_link','general_settings');
					$footer_logo_width = get_themeoption_value('footer_logo_width','general_settings');
					$footer_logo_height = get_themeoption_value('footer_logo_height','general_settings');
				?>
			 <?php	//$newsletter_config = '';
					// $show_name = '';
					// $news_letter_des = '';
					// $newsletter_config = '';
					// $feed_burner_text = '';
					// $footer_subscribe = '';
					// $cp_newsletter_settings = get_option('newsletter_settings');
					// if($cp_newsletter_settings <> ''){
						// $cp_newsletter = new DOMDocument ();
						// $cp_newsletter->loadXML ( $cp_newsletter_settings );
						// $newsletter_config = find_xml_value($cp_newsletter->documentElement,'newsletter_config');
						// $footer_subscribe = find_xml_value($cp_newsletter->documentElement,'footer_subscribe');
						// $feed_burner_text = find_xml_value($cp_newsletter->documentElement,'feed_burner_text');
					// }
	
			//if($newsletter_config <> 'google_feed_burner'){ ?>
				<!-- Newsletter Start -->
				<!--<script type="text/javascript">
					function slideout_msgs(){
						setTimeout(function(){
							jQuery("#newsletter_mess").slideUp("slow", function () {
							});
						}, 5000);
					}	
					function frm_newsletter(){
					   jQuery("#btn_newsletter").hide();
						jQuery("#process_newsletter").html('<img src="<?php //echo CP_PATH_URL?>/images/ajax_loading.gif" />');
					   jQuery.ajax({
							type:'POST', 
						   url: '<?php //echo CP_PATH_URL?>/framework/extensions/newsletter.php',
							data: jQuery('#frm_newsletter').serialize(), 
							success: function(response) {
								jQuery('#frm_newsletter').get(0).reset();
								jQuery('#newsletter_mess').show('');
								jQuery('#newsletter_mess').html(response);
								jQuery("#btn_newsletter").show('');
								jQuery("#process_newsletter").html('');
								slideout_msgs();
								//$('#frm_slide').find('.form_result').html(response);
							}
						});
					}
				</script>-->
				
				<strong class="footer-logo">
					<a class="" title="<?php bloginfo('name'); ?><?php wp_title( ' - ', true, 'left' ); ?>" href="<?php echo home_url(); ?>">
						<?php
						if(!empty($footer_logo)){ 
							$image_src_head = wp_get_attachment_image_src( $footer_logo, 'full' );
							$image_src_head = (empty($image_src_head))? '': $image_src_head[0];
							$thumb_src_preview = wp_get_attachment_image_src( $footer_logo, 'full');
							if($thumb_src_preview[0] <> ''){
								echo '<img width="'.$footer_logo_width.'" height="'.$footer_logo_height.'" src="'.$thumb_src_preview[0].'" alt="footer logo" />';
							}else{
								echo '<img src="'.CP_PATH_URL.'/images/footer-logo.png" alt="footer logo" />';
							}
						}else{
							echo '<img src="'.CP_PATH_URL.'/images/footer-logo.png" alt="footer logo" />';
						}
						?>
					</a>
				</strong>
			
				<!-- Newsletter End -->
				<!--<form class="newsletter get-touch-form" id="frm_newsletter" action="javascript:frm_newsletter()">
						<div class="message-box-wrapper red" id="newsletter_mess"></div>
							// <?php //if($news_letter_des <> ''){ 
										// echo '<p>';
										// echo substr($news_letter_des, 0, 400); 
										// if ( strlen($news_letter_des) > 400 ) echo "..."; 
										// echo '</p><br />';
									// }
							?>
						<div class="field-holder row">
							<input name="show_name" type="hidden" value="<?php //echo $show_name;?>" />
							<?php 
							// $show_name = 'Yes';
							// if($show_name <> 'No'){?>
							<div class = "span3">
								<input type="text" class="input-newsletter" name="newsletter_name" value="Enter Your Name" onfocus="if(this.value=='Enter Your Name') {this.value='';}" onblur="if(this.value=='') {this.value='Enter Your Name';}" />
							</div>
							<?php //}?>
							<div class="field-set-section span3">
							
								<input type="text" class="input-newsletter" name="newsletter_email" value="Enter Email Address" onfocus="if(this.value=='Enter Email Address') {this.value='';}" onblur="if(this.value=='') {this.value='Enter Email Address';}" />
						
								<button class="btn-search btn-submit-news" id="btn_newsletter" ><i class="fa fa-angle-double-right"></i></button>
							</div>
							<div id="process_newsletter"></div>                            
						</div>	
				</form>-->
			<?php //} ?>
              </div>
              <div class="span6">
                <div class="causes-social">
                  <?php		
						$social_networking = get_themeoption_value('social_networking','general_settings');
						if($social_networking == 'enable'){ 
						$facebook_network = get_themeoption_value('facebook_network','social_settings');
						$twitter_network = get_themeoption_value('twitter_network','social_settings');
						$delicious_network = get_themeoption_value('delicious_network','social_settings');
						$google_plus_network = get_themeoption_value('google_plus_network','social_settings');
						$linked_in_network = get_themeoption_value('linked_in_network','social_settings');
						$youtube_network = get_themeoption_value('youtube_network','social_settings');
						$flickr_network = get_themeoption_value('flickr_network','social_settings');
						$vimeo_network = get_themeoption_value('vimeo_network','social_settings');
						$pinterest_network = get_themeoption_value('pinterest_network','social_settings'); 
						$Instagram_network = get_themeoption_value('Instagram_network','social_settings'); 
						$github_network = get_themeoption_value('github_network','social_settings'); 
						$skype_network = get_themeoption_value('skype_network','social_settings'); ?>
							<ul>
								<?php if($facebook_network <> ''){ ?><li class = "social-2" ><a title="Facebook" class="social-color-1" href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
								<?php if($twitter_network <> ''){ ?><li class = "social-1"><a title="Twitter" class="social-color-2" href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
								<?php if($Instagram_network <> ''){ ?><li class = "social-3"><a title="Instagram" class="social-color-1" href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
								<?php if($pinterest_network <> ''){ ?><li class = "social-4"><a title="Pinterest" class="social-color-4" href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
								<?php if($linked_in_network <> ''){ ?><li class = "social-5"><a title="LinkedIn" class="social-color-5" href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
								<?php if($youtube_network <> ''){ ?><li class = "social-6"><a title="Youtube" class="social-color-6" href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
								<?php if($flickr_network <> ''){ ?><li class = "social-7"><a title="Flickr" class="social-color-1" href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
								<?php if($delicious_network <> ''){ ?><li class = "social-10"><a title="Delicious" class="social-color-3" href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
								<?php if($google_plus_network <> ''){ ?><li class = "social-9"><a title="Google Plus" class="social-color-4" href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
								<?php if($vimeo_network <> ''){ ?><li class = "social-8"><a title="Vimeo" class="social-color-3" href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
								<?php if($github_network <> ''){ ?><li class = "social-11"><a title="GitHub" class="social-color-6" href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
								<?php if($skype_network <> ''){ ?><li class = "social-12"><a title="Skype" class="social-color-7" href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
							</ul>	
					<?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
		<!--Footer Copyright Start-->
		<div class="cp_copyrights"><div class="container"><?php echo get_themeoption_value('copyright_code','general_settings');?></div></div>
		<!--Footer Copyright End--> 
      </div>
      <!--CAUSES FOOTER END--> 
    </footer>
	<?php }?>
	<!-- Footer Area End--> 
	<div class="clear"></div>
</div>
<!--Wrapper End--> 
<?php wp_footer();
//echo color_picker();
?>
</body>
</html>