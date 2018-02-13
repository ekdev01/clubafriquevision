<?php
/*	
	*	CrunchPress Social Sharing File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file return the Social Sharing to the selected post_type
	*	---------------------------------------------------------------------
	*/
	function include_social_shares(){
		
		global $cp_social_settings;
		
		//Social Sharing 
		$facebook_sharing = '';
		$twitter_sharing = '';
		$stumble_sharing = '';
		$delicious_sharing = '';
		$googleplus_sharing = '';
		$digg_sharing = '';
		$myspace_sharing = '';
		$reddit_sharing = '';	
		$cp_social_settings = '';
		
		//Getting Values from database
		$cp_social_settings = get_option('social_settings');
		if($cp_social_settings <> ''){
			$cp_social = new DOMDocument ();
			$cp_social->loadXML ( $cp_social_settings );
		
			// Social Sharing Values
			$facebook_sharing = find_xml_value($cp_social->documentElement,'facebook_sharing');
			$twitter_sharing = find_xml_value($cp_social->documentElement,'twitter_sharing');
			$stumble_sharing = find_xml_value($cp_social->documentElement,'stumble_sharing');
			$delicious_sharing = find_xml_value($cp_social->documentElement,'delicious_sharing');
			$googleplus_sharing = find_xml_value($cp_social->documentElement,'googleplus_sharing');
			$digg_sharing = find_xml_value($cp_social->documentElement,'digg_sharing');
			$myspace_sharing = find_xml_value($cp_social->documentElement,'myspace_sharing');
			$reddit_sharing = find_xml_value($cp_social->documentElement,'reddit_sharing');
		}
	
	
	
		$currentUrl = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		if( !empty($_SERVER['HTTPS']) ){
			$currentUrl = "https://" . $currentUrl;
		}else{
			$currentUrl = "http://" . $currentUrl;
		}
		?>
			<ul class="topbar-social topbar-social-cp">
				<?php if($facebook_sharing == 'enable'){ ?><li><a href="http://www.facebook.com/share.php?u=<?php echo $currentUrl;?>"><i class="fa fa-facebook"></i><span><?php _e('Facebook','crunchpress');?></span></a></li><?php }?>
				<?php if($twitter_sharing == 'enable'){ ?><li><a href="http://twitter.com/home?status=<?php echo str_replace(' ', '%20', get_the_title());?>%20-%20<?php echo $currentUrl;?>"><i class="fa fa-twitter"></i><span><?php _e('Twitter','crunchpress');?></span></a></li><?php }?>
				<?php if($delicious_sharing == 'enable'){ ?><li><a href="http://delicious.com/post?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>"><i class="fa fa-delicious"></i><span><?php _e('Delicious','crunchpress');?></span></a></li><?php }?>
				<?php if($googleplus_sharing == 'enable'){ ?><li><a href="https://plus.google.com/share?url={<?php echo $currentUrl;?>}"><i class="fa fa-google-plus"></i><span><?php _e('Google Plus','crunchpress');?></span></a></li><?php }?>
				<!--<?php if($facebook_sharing == 'enable'){ ?><li><a href="http://www.linkedin.com/shareArticle?mini=true&#038;url=<?php echo $currentUrl;?>&#038;title=<?php echo str_replace(' ', '%20', get_the_title()); ?>"><i class="fa fa-linkedin"></i></a></li><?php }?>-->
				<?php if($reddit_sharing == 'enable'){ ?><li><a href="http://reddit.com/submit?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>"><i class="fa fa-reddit"></i><span><?php _e('Reddit','crunchpress');?></span></a></li><?php }?>
				<?php if($digg_sharing == 'enable'){ ?><li><a href="http://digg.com/submit?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>"><i class="fa fa-digg"></i><span><?php _e('Digg','crunchpress');?></span></a></li><?php }?>
				<?php if($myspace_sharing == 'enable'){ ?><li><a href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo $currentUrl;?>"><i class="fa fa-maxcdn"></i><span><?php _e('My Space','crunchpress');?></span></a></li><?php }?>
			</ul>				
		<?php
	}
	
?>