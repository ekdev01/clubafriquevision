<?php 
/*	
*	CrunchPress Headers File
*	---------------------------------------------------------------------
* 	@version	1.0
* 	@author		CrunchPress
* 	@link		http://crunchpress.com
* 	@copyright	Copyright (c) CrunchPress
*	---------------------------------------------------------------------
*	This file Contain all the custom Built in function 
*	Developer Note: do not update this file.
*	---------------------------------------------------------------------
*/
	
	function cp_footer_style_1(){ ?>
	
		<!--FOOTER SECTION START-->
		<footer>
			 <!--CALL US ARTICLE START-->
			<?php echo get_themeoption_value('footer_banner','general_settings');?>
			<!--CALL US ARTICLE END-->
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('sidebar-footer'); ?>
				</div>
			</div>
			<article class="copyrights">
				<div class="container">
					<div class="row-fluid">
						<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
						<div class="span8">
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
							<div class="socialicons">
								<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
								<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
								<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
								<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
								<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
								<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
								<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
								<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
								<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
								<a title="instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($github_network) AND $github_network <> ''){ ?>
								<a title="github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
								<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
								<a title="skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
									<span class="da-animate da-slideFromLeft"></span>
								</a>
								<?php }?>
							</div>
							<?php }?>
						</div>
					</div>
					
				</div>
			</article>
		</footer>
		<!--FOOTER SECTION START-->
	<?php }
	
	function cp_footer_style_2(){ ?>
	<!--FOOTER SECTION START-->
    <footer class="cp-footer-multi-2">
		<article class="footer-top">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('sidebar-footer'); ?>
				</div>
			</div>
        </article>

    	<?php echo get_themeoption_value('footer_banner','general_settings');?>


        <article class="copyrights bg-cr">
        	<div class="container">
				<div class="row-fluid">
					<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
					<div class="span8">
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
						<div class="socialicons">
							<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
							<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
							<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
							<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
							<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
							<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
							<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
							<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
							<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
							<a title="Instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($github_network) AND $github_network <> ''){ ?>
							<a title="Github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
							<a title="Skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
				
            </div>
        </article>
    </footer>
    <!--FOOTER SECTION START-->
  
	<?php }
	
	function cp_footer_style_3(){ ?>
		<!--FOOTER SECTION START-->
		<footer class="cp-footer-multi-6">
			<article class="footer-top">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar('sidebar-Upper-Footer'); ?>
					</div>
				</div>
			</article>
			<article class="footer-bottom">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar('sidebar-footer'); ?>
					</div>
				</div>
			</article>
			<article class="copyrights bg-cr">
				<div class="container">
				
				<div class="row-fluid">
					<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
					<div class="span8">
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
						<div class="socialicons">
							<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
							<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
							<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
							<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
							<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
							<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
							<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
							<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
							<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
							<a title="Instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($github_network) AND $github_network <> ''){ ?>
							<a title="Github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
							<a title="Skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
				</div>
			</article>
		</footer>
		<!--FOOTER SECTION START-->  
	<?php }
	
	function cp_footer_style_4(){ ?>
   <!--FOOTER SECTION START-->
    <footer class="cp-footer-multi-3">
		<?php echo get_themeoption_value('footer_banner','general_settings');?>
		
        <article class="footer-top">
    	<div class="container">
        	<div class="row">
            	<?php dynamic_sidebar('sidebar-Upper-Footer'); ?>
            </div>
        </div>
        </article>
        
        <article class="footer-bottom">
    	<div class="container">
        	<div class="row">
            	<?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
        </div>
        </article>

        <article class="copyrights bg-cr">
        	<div class="container">
            					<div class="row-fluid">
					<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
					<div class="span8">
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
						<div class="socialicons">
							<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
							<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
							<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
							<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
							<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
							<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
							<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
							<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
							<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
							<a title="Instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($github_network) AND $github_network <> ''){ ?>
							<a title="Github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
							<a title="Skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
            </div>
        </article>
    </footer>
    <!--FOOTER SECTION START-->
  
	<?php }
	
	function cp_footer_style_5(){ ?>
  
   <!--FOOTER SECTION START-->
    <footer class="cp-footer-multi-4">
        <article class="footer-top">
    	<div class="container">
        	<div class="row">
            	<?php dynamic_sidebar('sidebar-Upper-Footer'); ?>
            </div>
        </div>
        </article>
        
      <?php echo get_themeoption_value('footer_banner','general_settings');?>
        
        <article class="footer-bottom">
    	<div class="container">
        	<div class="row">
            	<?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
        </div>
        </article>

        <article class="copyrights bg-cr">
        	<div class="container">
            					<div class="row-fluid">
					<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
					<div class="span8">
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
						<div class="socialicons">
							<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
							<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
							<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
							<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
							<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
							<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
							<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
							<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
							<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
							<a title="Instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($github_network) AND $github_network <> ''){ ?>
							<a title="Github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
							<a title="Skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
            </div>
        </article>
    </footer>
    <!--FOOTER SECTION START-->
  
	<?php }
	
	function cp_footer_style_6(){ ?>
		 <!--FOOTER SECTION START-->
		<footer class="cp-footer-multi-5">
			<article class="footer-bottom">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('sidebar-footer'); ?>
				</div>
			</div>
			</article>
			<article class="copyrights bg-cr">
				<div class="container">
									<div class="row-fluid">
					<div class="span4 pull-left"><p><?php echo get_themeoption_value('copyright_code','general_settings');?></p></div>
					<div class="span8">
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
						<div class="socialicons">
							<?php if(isset($facebook_network) AND $facebook_network <> ''){?>
							<a title="Facebook Sharing" href="<?php echo $facebook_network;?>" class="fb_hr social_active" id="cp_facebook_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($twitter_network) AND $twitter_network <> ''){?>
							<a title="Twitter Sharing" href="<?php echo $twitter_network;?>" class="twitter_hr social_active" id="cp_twitter_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($linked_in_network) AND $linked_in_network <> ''){?>
							<a title="Linked In Sharing" href="<?php echo $linked_in_network;?>" class="linked_hr social_active" id="cp_linked_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($google_plus_network) AND $google_plus_network <> ''){?>
							<a title="Google Plus Sharing" href="<?php echo $google_plus_network;?>" class="googleplus_hr social_active" id="cp_gplus_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($flickr_network) AND $flickr_network <> ''){?>
							<a title="Flickr Sharing" href="<?php echo $flickr_network;?>" class="flickr_hr social_active" id="cp_flickr_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($youtube_network) AND $youtube_network <> ''){?>
							<a title="Youtube Sharing" href="<?php echo $youtube_network;?>" class="youtube_hr social_active" id="cp_youtube_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($vimeo_network) AND $vimeo_network <> ''){?>
							<a title="Vimeo Sharing" href="<?php echo $vimeo_network;?>" class="vimeo_hr social_active" id="cp_vimeo_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($pinterest_network) AND $pinterest_network <> ''){ ?>
							<a title="Pinterest Sharing" href="<?php echo $pinterest_network;?>" class="pinterest_hr social_active" id="cp_pinterest_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($Instagram_network) AND $Instagram_network <> ''){ ?>
							<a title="Instagram Sharing" href="<?php echo $Instagram_network;?>" class="instagram_hr social_active" id="cp_instagram_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($github_network) AND $github_network <> ''){ ?>
							<a title="Github Sharing" href="<?php echo $github_network;?>" class="github_hr social_active" id="cp_github_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
							<?php if(isset($skype_network) AND $skype_network <> ''){ ?>
							<a title="Skype Sharing" href="<?php echo $skype_network;?>" class="skype_hr social_active" id="cp_skype_hr">
								<span class="da-animate da-slideFromLeft"></span>
							</a>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
				</div>
			</article>
		</footer>
		<!--FOOTER SECTION START-->
	<?php }
	
	//page-option-bottom-footer-style
	
	function cp_footer_html($footer=""){
		
		$footer_style_apply = get_themeoption_value('footer_style_apply','general_settings');
		if($footer_style_apply == 'enable'){$footer = 'enable';}else{}
		
		if($footer == 'Style 1'){
			cp_footer_style_1();
		}else if($footer == 'Style 2'){
			cp_footer_style_2();
		}else if($footer == 'Style 3'){
			cp_footer_style_3();
		}else if($footer == 'Style 4'){
			cp_footer_style_4();
		}else if($footer == 'Style 5'){
			cp_footer_style_5();
		}else if($footer == 'Style 6'){
			cp_footer_style_6();
		}else{
			$select_footer_cp = get_themeoption_value('select_footer_cp','general_settings');
			if($select_footer_cp == 'Style 1'){
				cp_footer_style_1();
			}else if($select_footer_cp == 'Style 2'){
				cp_footer_style_2();
			}else if($select_footer_cp == 'Style 3'){
				cp_footer_style_3();
			}else if($select_footer_cp == 'Style 4'){
				cp_footer_style_4();
			}else if($select_footer_cp == 'Style 5'){
				cp_footer_style_5();
			}else if($select_footer_cp == 'Style 6'){
				cp_footer_style_6();
			}else{
				cp_footer_style_1();
			}
		}
	}
	
