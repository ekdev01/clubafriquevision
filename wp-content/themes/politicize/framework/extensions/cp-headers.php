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
	
function header_style_1(){ ?>
  <!--Header Style 1 Start-->
  <header id="header"> 
    <!--Head Topbar Start-->
    <div class="head-topbar">
      <div class="container">
	  <div class = "cp_inner_container" > 
        <div class="row-fluid">
          <div class="left">
			<?php echo get_themeoption_value('contact_us_code','general_settings');?>
          </div>
         <?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
				<ul class="header-social">
					<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
					<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
					<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
					<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
					<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
					<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
					<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
					<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
					<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
					<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
					<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
					<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
				</ul>	
			<?php }?>
			  <div id = "style_1" class = "shopping_cart">
				<?php if(class_exists("Woocommerce")){ ?>
				<div class="nav-last2">
					<?php
					//WooCommerce
					if(class_exists("Woocommerce")){
						$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
						if($topcart_icon == 'enable'){
							echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
						} 		
					} ?>
				</div>
				<?php } ?>
			  </div>
        </div>
		</div>
      </div>
    </div>
    <!--Head Topbar End--> 
    <!--Menu Row Start-->
    <div class="menu-row">
		<div class="container">
			<div class="row-fluid">
				<strong class="logo">
				<?php 
					$header_logo = get_themeoption_value('header_logo','general_settings');
					$logo_width = get_themeoption_value('logo_width','general_settings');
					$logo_height = get_themeoption_value('logo_height','general_settings');
					//Print Logo
					$image_src = '';
					if(!empty($header_logo)){ 
						$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
						$image_src = (empty($image_src))? '': $image_src[0];			
					}?>
					<a href="<?php echo home_url(); ?>">
						<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo ''; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
					</a>
				</strong>
			</div>
		</div>
      <!--Navigation Area Start-->
      <div class="navigation-area">
        <div class="container">
          <div class="row-fluid">
		  <?php
			$donation_button = get_themeoption_value('donation_button','general_settings');
			$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
			$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
			$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
			$donate_title = get_themeoption_value('donate_title','general_settings');
			if($donation_button == 'enable'){
				echo '<a href="'.get_permalink($donation_page_id).'" class="btn-donate curl-top-left"><i class="fa fa-money"></i>'.$donate_btn_text.'</a>';
			}
		  ?>
		  
            <!--Navbar Start-->
            <div class="navbar margin-none">
              <div class="container">
                <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <div class="nav-collapse collapse">
				<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => '', 
					  'container_class' => 'menu-{menu slug}-container', 
					  'container_id'    => 'navbar',
					  'menu_class'      => '', 
					  'menu_id'         => 'nav',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
						<div id="navbar" class="desktop_view nav-collapse collapse">
							<?php wp_nav_menu( $defaults);?>
						</div>
					<?php }else{
						$args = array(
							'sort_column' => 'menu_order, post_title',
							'include'     => '',
							'exclude'     => '',
							'echo'        => true,
							'show_home'   => false,
							'menu'            => '', 
							'container'       => '', 
							'link_before' => '',
							'link_after'  => '' );?>
							<div id="navbar" class="desktop_view nav-collapse collapse">
								<?php wp_page_menu( $args ); ?>                
							</div>
					<?php } ?>
                </div>
              </div>
              <a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
			  <div class="search-box">
				<form method="get" action="<?php  echo home_url(); ?>/">
					<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
					<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
				</form>
              </div>		
            </div>
            <!--Navbar End--> 
          </div>
        </div>
      </div>
     <!--Navigation Area End--> 
    </div>
  <!--Menu Row End--> 
 </header>
<!--Header Style 1 End-->
	<?php }
	
	//Header Function 2 Start
function header_style_2(){ ?>
	<!--Header Style 2 Start-->
 <header id="cp-header-2"> 
    <!--Head Topbar Start-->
    <div class="head-topbar">
      <div class="container">
	  <div class = "cp_inner_container" > 
        <div class="row-fluid">
          <div class="left">
		  <?php echo get_themeoption_value('contact_us_code','general_settings');?>		
          </div>
			<?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
				<ul class="header-social">
					<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
					<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
					<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
					<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
					<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
					<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
					<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
					<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
					<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
					<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
					<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
					<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
				</ul>	
			<?php }?>
			<div id = "style_1" class = "shopping_cart">
				<?php if(class_exists("Woocommerce")){ ?>
				<div class="nav-last2">
					<?php
					//WooCommerce
					if(class_exists("Woocommerce")){
						$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
						if($topcart_icon == 'enable'){
							echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
						} 		
					} ?>
				</div>
				<?php } ?>
			</div>
        </div>
		</div>
      </div>
    </div>
   <!--Head Topbar End--> 
   <!--Menu Row Start-->
    <div class="menu-row">
      <div class="container">
        <div class="row-fluid"> 
			<strong class="logo pull-left">
				<?php 
				$header_logo = get_themeoption_value('header_logo','general_settings');
				$logo_width = get_themeoption_value('logo_width','general_settings');
				$logo_height = get_themeoption_value('logo_height','general_settings');
				//Print Logo
				$image_src = '';
				
				if(!empty($header_logo)){ 
					$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
					$image_src = (empty($image_src))? '': $image_src[0];	
				}
				if($image_src == ''){$logo_width = ''; $logo_height = '';}
				?>
				<a href="<?php echo home_url(); ?>">
					<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo ''; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
				</a>
			</strong> 
		</div>
      </div>
      <!--Navigation Area Start-->
      <section class="navigation-area">
        <div class="container">
          <div class="row-fluid">
		  <?php
			$donation_button = get_themeoption_value('donation_button','general_settings');
			$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
			$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
			$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
			$donate_title = get_themeoption_value('donate_title','general_settings');
			if($donation_button == 'enable'){
				echo '<a href="'.get_permalink($donation_page_id).'" class="btn-donate-2 curl-top-left"><i class="fa fa-money"></i>'.$donate_btn_text.'</a>';
			}
		  ?>
            <!--Navbar Start-->
            <div class="navbar margin-none">
				<div class="container">
					<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<div class="nav-collapse collapse">
						<?php 
							// Menu parameters		
							$defaults = array(
							  'theme_location'  => 'top-menu',
							  'menu'            => '', 
							  'container'       => '', 
							  'container_class' => 'menu-{menu slug}-container', 
							  'container_id'    => 'navbar',
							  'menu_class'      => '', 
							  'menu_id'         => 'nav',
							  'echo'            => true,
							  'fallback_cb'     => '',
							  'before'          => '',
							  'after'           => '',
							  'link_before'     => '',
							  'link_after'      => '',
							  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							  'depth'           => 0,
							  'walker'          => '',);				
							if(has_nav_menu('top-menu')){ ?>
								<div id="navbar" class="navbar">
									<?php wp_nav_menu( $defaults);?>
								</div>
							<?php }else{
								$args = array(
									'sort_column' => 'menu_order, post_title',
									'menu_class'  => 'nav',
									'include'     => '',
									'exclude'     => '',
									'echo'        => true,
									'show_home'   => false,
									'menu'            => '', 
									'container'       => '', 
									'link_before' => '',
									'link_after'  => '' );?>
								<div id="nav">
									<?php wp_page_menu( $args ); ?>                
								</div>
							<?php } ?>
						</div>
				</div>
				<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
				<div class="search-box">
					<form method="get" action="<?php  echo home_url(); ?>/">
						<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
						<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
					</form>
				</div>			  
            </div>
            <!--Navbar End--> 
          </div>
        </div>
      </section>
    <!--Navigation Area End--> 
   </div>
  <!--Menu Row End--> 
 </header>
<!--Header End-->
  <?php } 
  
  //Header Function 3
 function header_style_3(){ ?>
  <!--Headre Start-->
 <div id="cp-header-2" class="height"> 
    <!--Head Topbar Start-->
    <div class="head-topbar">
      <div class="container">
	  <div class = "cp_inner_container" > 
        <div class="row-fluid">
          <div class="left">
			<?php echo get_themeoption_value('contact_us_code','general_settings');?>
          </div>
		  <?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
				<ul class="header-social">
					<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
					<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
					<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
					<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
					<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
					<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
					<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
					<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
					<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
					<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
					<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
					<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
				</ul>	
			<?php }?>
				<div id = "style_1" class = "shopping_cart">
					<?php if(class_exists("Woocommerce")){ ?>
					<div class="nav-last2">
						<?php
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
								echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
							} 		
						} ?>
					</div>
					<?php } ?>
			    </div>
        </div>
		</div>
      </div>
    </div>
    <!--Head Topbar End--> 
    <!--Menu Row Start-->
    <div class="menu-row">
      <div class="container">
        <div class="row-fluid"> 
			<strong class="logo-3">
				<?php 
				$header_logo = get_themeoption_value('header_logo','general_settings');
				$logo_width = get_themeoption_value('logo_width','general_settings');
				$logo_height = get_themeoption_value('logo_height','general_settings');
				//Print Logo
				$image_src = '';
				if(!empty($header_logo)){ 
					$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
					$image_src = (empty($image_src))? '': $image_src[0];			
				}
				if($image_src == ''){$logo_width = ''; $logo_height = '';}
				?>
				<a href="<?php echo home_url(); ?>">
					<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo ''; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo ''; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/header-3-logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
				</a>
			</strong> 
		</div>
      </div>
      <!--Navigation Area	Start-->
      <section class="navigation-area nav-margin">
        <div class="container">
          <div class="row-fluid">
		   <?php
			$donation_button = get_themeoption_value('donation_button','general_settings');
			$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
			$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
			$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
			$donate_title = get_themeoption_value('donate_title','general_settings');
			if($donation_button == 'enable'){
				echo '<a href="'.get_permalink($donation_page_id).'" class="btn-donate curl-top-left"><i class="fa fa-money"></i>'.$donate_btn_text.'</a>';
			}
		  ?>
            <!--Navbar Start-->
            <div class="navbar margin-none">
				<div class="container">
					<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<div class="nav-collapse collapse">
							<?php 
								// Menu parameters		
								$defaults = array(
								  'theme_location'  => 'top-menu',
								  'menu'            => '', 
								  'container'       => '', 
								  'container_class' => 'menu-{menu slug}-container', 
								  'container_id'    => 'navbar',
								  'menu_class'      => '', 
								  'menu_id'         => 'nav',
								  'echo'            => true,
								  'fallback_cb'     => '',
								  'before'          => '',
								  'after'           => '',
								  'link_before'     => '',
								  'link_after'      => '',
								  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								  'depth'           => 0,
								  'walker'          => '',);				
								if(has_nav_menu('top-menu')){ ?>
										<div id="navbar" class="navbar">
										<?php wp_nav_menu( $defaults);?>
										</div>
								<?php }else{
									$args = array(
										'sort_column' => 'menu_order, post_title',
										'menu_class'  => 'nav',
										'include'     => '',
										'exclude'     => '',
										'echo'        => true,
										'show_home'   => false,
										'menu'            => '', 
										'container'       => '', 
										'link_before' => '',
										'link_after'  => '' );?>
										<div id="nav">
											<?php wp_page_menu( $args ); ?>                
										</div>
								<?php } ?>
						</div>
				</div>
				<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
				<div class="search-box">
					<form method="get" action="<?php  echo home_url(); ?>/">
						<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
						<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
					</form>
				</div>
            </div>
            <!--Navbar End--> 
          </div>
        </div>
      </section>
      <!--Navigation Area End--> 
    </div>
    <!--Menu Row End--> 
  </div>
  <!--Header End-->
  
  <?php } 
  
  //Header Function 4
function header_style_4(){ ?>
   <!--Header Start-->
  <header id="cp-header-2" class="height-2 head-4-space"> 
    <!--Head Topbar Start-->
    <div class="head-topbar">
      <div class="container">
	  <div class = "cp_inner_container" > 
        <div class="row-fluid">
          <div class="left left-top-padding">
           	<?php echo get_themeoption_value('contact_us_code','general_settings');?>
          </div>
		  <div id = "style_2" class = "shopping_cart">
				<?php if(class_exists("Woocommerce")){ ?>
				<div class="nav-last2">
					<?php
					//WooCommerce
					if(class_exists("Woocommerce")){
						$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
						if($topcart_icon == 'enable'){
							echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
						} 		
					} ?>
				</div>
			<?php } ?>
		  </div>
          <div class="head-4-search"> 
		  <a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
            <div class="search-box">
				<form method="get" action="<?php  echo home_url(); ?>/">
					<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
					<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
				</form>
            </div>			
          </div>			
			<?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
				<ul class="header-social left-top-padding">
					<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
					<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
					<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
					<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
					<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
					<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
					<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
					<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
					<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
					<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
					<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
					<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
				</ul>	
			<?php }?>
        </div>
		</div>
      </div>
    </div>
    <!--Head Topbar End--> 
    <!--Menu Row Start-->
	<div class="menu-row"> 
		<!--Navigation Area	Start-->
		<section class="navigation-area">
			<div class="container">
				<div class="row-fluid"> 
					<!--Navbar Start-->
					<div id="nav-outer">
						<strong class="logo-4">
							<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}
								if($image_src == ''){$logo_width = ''; $logo_height = '';}
							?>
							<a href="<?php echo home_url(); ?>">
								<img class="" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/header-3-logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
						</strong>
						<div class="nav-holder">
							<div class="navbar margin-none">
							  <div class="container">
								<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<div class="nav-collapse collapse">
									   <?php 
										// Menu parameters		
										$defaults = array(
										  'theme_location'  => 'top-menu',
										  'menu'            => '', 
										  'container'       => '', 
										  'container_class' => 'menu-{menu slug}-container', 
										  'container_id'    => 'navbar',
										  'menu_class'      => '', 
										  'menu_id'         => 'nav-2',
										  'echo'            => true,
										  'fallback_cb'     => '',
										  'before'          => '',
										  'after'           => '',
										  'link_before'     => '',
										  'link_after'      => '',
										  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										  'depth'           => 0,
										  'walker'          => '',);				
										if(has_nav_menu('top-menu')){ ?>
												<?php wp_nav_menu( $defaults);?>
										<?php }else{
											$args = array(
											'sort_column' => 'menu_order, post_title',
											'menu_class'  => 'nav',
											'include'     => '',
											'exclude'     => '',
											'echo'        => true,
											'show_home'   => false,
											'menu'            => '', 
											'container'       => '', 
											'link_before' => '',
											'link_after'  => '' );?>
											<div id="nav-2">
												<?php wp_page_menu( $args ); ?>                
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php
						$donation_button = get_themeoption_value('donation_button','general_settings');
						$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
						$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
						$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
						$donate_title = get_themeoption_value('donate_title','general_settings');
						if($donation_button == 'enable'){
							echo '<a href="'.get_permalink($donation_page_id).'" class="btn-donate3 curl-top-left"><i class="fa fa-money"></i>'.$donate_btn_text.'</a>';
						}
					  ?>
					</div>
				</div>
				<!--Navbar End--> 
			</div>
		</section>
	</div>
   <!--Navigation Area End--> 
 <!--Menu Row End--> 
</header>
<!--Header End-->
  <?php } 
   
   //Header Function 5
  function header_style_5(){ ?>
   <!--Header Start-->
  <header id="cp-header-3" class="header-5-height"> 
    <!--Head Topbar Start-->
    <div class="menu-row">
		<div class="container">
			<div class="row-fluid">
				<strong class="logo-5">
					<?php 
					$header_logo = get_themeoption_value('header_logo','general_settings');
					$logo_width = get_themeoption_value('logo_width','general_settings');
					$logo_height = get_themeoption_value('logo_height','general_settings');
					//Print Logo
					$image_src = '';
					if(!empty($header_logo)){ 
						$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
						$image_src = (empty($image_src))? '': $image_src[0];			
					}
					if($image_src == ''){$logo_width = ''; $logo_height = '';}
					?>
					<a href="<?php echo home_url(); ?>">
						<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo ''; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo ''; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo_politisize.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
					</a>
				</strong> 
				<?php
					$donation_button = get_themeoption_value('donation_button','general_settings');
					$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
					$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
					$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
					$donate_title = get_themeoption_value('donate_title','general_settings');
					if($donation_button == 'enable'){
						echo '<a href="'.get_permalink($donation_page_id).'" class="btn-donate5 curl-top-left">'.$donate_btn_text.'</a>';
					}
				  ?>
			<?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
				<ul class="head-5-social">
					<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
					<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
					<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
					<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
					<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
					<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
					<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
					<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
					<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
					<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
					<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
					<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
				</ul>	
			<?php }?>
			</div>
		</div>
    <!--Head Topbar End--> 
    
    <!--Logo Row Star-->
     <section class="navigation-area">
       <div class="container">
          <div class="row-fluid"> 
            <!--Navbar Start-->
            <div class="navbar margin-none">
              <div class="container">
                <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<div class="nav-collapse collapse">
					<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => '', 
						  'container_class' => 'menu-{menu slug}-container', 
						  'container_id'    => 'navbar',
						  'menu_class'      => 'navbar_id', 
						  'menu_id'         => 'nav',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
								<?php wp_nav_menu( $defaults);?>
						<?php }else{
							$args = array(
							'sort_column' => 'menu_order, post_title',
							'menu_class'  => 'nav',
							'include'     => '',
							'exclude'     => '',
							'echo'        => true,
							'show_home'   => false,
							'menu'            => '', 
							'container'       => '', 
							'link_before' => '',
							'link_after'  => '' );?>
							<div id="nav">
								<?php wp_page_menu( $args ); ?>                
							</div>
						<?php } ?>
					</div>
				</div>
				<div id = "style_3" class = "shopping_cart">
						<?php if(class_exists("Woocommerce")){ ?>
						<div class="nav-last2">
							<?php
							//WooCommerce
							if(class_exists("Woocommerce")){
								$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
								if($topcart_icon == 'enable'){
									echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
								} 		
							} ?>
						</div>
					<?php } ?>
				  </div>
				<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
				<div class="search-box">
					<form method="get" action="<?php  echo home_url(); ?>/">
						<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
						<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
					</form>	
				</div>
			</div>
		 </div>
	   </div>
     </section>
   </div>
</header>
<!-- Header Style End-->

  <?php }
  
	//Pageant's header 6 ingenio
	function header_style_6(){ ?>
	<header id="cp-causes-header">
		<div class = "container">
			<div class="navigation-row">
				<strong class="causes-logo">
					<?php 
						$header_logo = get_themeoption_value('header_logo','general_settings');
						$logo_width = get_themeoption_value('logo_width','general_settings');
						$logo_height = get_themeoption_value('logo_height','general_settings');
						//Print Logo
						$image_src = '';
						if(!empty($header_logo)){ 
							$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
							$image_src = (empty($image_src))? '': $image_src[0];			
						}?>
						<a href="<?php echo home_url(); ?>">
							<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
						</a>
				</strong>
				<div class="cp_causes-navigation">
				  <div class="navbar navbar-inverse">
					<div class="navbar-inner">
					  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					  <div class="nav-collapse collapse">
							   <?php 
								// Menu parameters		
								$defaults = array(
								  'theme_location'  => 'top-menu',
								  'menu'            => '', 
								  'container'       => '', 
								  'container_class' => 'menu-{menu slug}-container', 
								  'container_id'    => 'navbar',
								  'menu_class'      => 'nav', 
								  'menu_id'         => 'cp_causes-navigation',
								  'echo'            => true,
								  'fallback_cb'     => '',
								  'before'          => '',
								  'after'           => '',
								  'link_before'     => '',
								  'link_after'      => '',
								  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								  'depth'           => 0,
								  'walker'          => '',);				
								if(has_nav_menu('top-menu')){ ?>
										
										<?php wp_nav_menu( $defaults);?>
										
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
					$donation_button = get_themeoption_value('donation_button','general_settings');
					$donate_btn_text = get_themeoption_value('donate_btn_text','general_settings');
					$donation_page_id = get_themeoption_value('donation_page_id','general_settings');
					$donate_email_id = get_themeoption_value('donate_email_id','general_settings');
					$donate_title = get_themeoption_value('donate_title','general_settings');

					if($donation_button == 'enable'){ ?>
						<div class="head-right-box"> <a href="<?php echo get_permalink($donation_page_id);?>" class="btn-donate"><?php echo $donate_btn_text;?></a></div>
					<?php } ?>
	
					<div class = "navigation-area_6">
						<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
						<div class="search-box">
							<form method="get" action="<?php  echo home_url(); ?>/">
								<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
								<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
							</form>	
						</div>
					</div>
					<div id = "style_4" class = "shopping_cart">
						<?php if(class_exists("Woocommerce")){ ?>
						<div class="nav-last2">
							<?php
							//WooCommerce
							if(class_exists("Woocommerce")){
								$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
								if($topcart_icon == 'enable'){
									echo woo_commerce_cart('','<i class="fa fa-shopping-cart"></i>','icon');
								} 		
							} ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</header>
	  <?php 
	  }
  
  
	function header_style_7(){ ?>
	<header class="cp-header-multi-3"> 
		<!--TOP STRIP SECTION START-->
		<section class="topbar">
			<div class="container">
					<div class="hide-sub-nav">					
						<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'header-menu',
						  'menu'            => '', 
						  'container'       => '',		  
						  'container_id'    => '',
						  'menu_class'      => 'pull-left topleft', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('header-menu')){ ?>
							<div class="topbarmenu">
								<?php wp_nav_menu( $defaults);?>					
							</div>
						<?php }?>
					</div>
					<ul class="pull-right topright">
						<?php 
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
							global $post,$post_id,$product,$woocommerce;	
							$currency = get_woocommerce_currency_symbol();?>
							
							<li class="cart-item"><span class="topcartbg"> <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i> Cart <strong>0 item(s) - $0.00</strong> </a> </span>
							<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
									<div class="widget_shopping_cart_content"></div>
								<?php }else{ ?>
									<div class="hide_cart_widget_if_empty"></div>
								<?php }?>
							</li>
							<?php } ?>
						<?php }else{ ?>
						<li>&nbsp;</li>
						<?php } ?>
					</ul>
					<ul class="pull-right topright">
						<li><?php _e('Welcome!','crunchpress');?> <a href="#signin" data-toggle="modal"><?php _e('Login','crunchpress');?></a> <?php _e('or','crunchpress');?> <a href="#signup" data-toggle="modal"><?php _e('Create an account','crunchpress');?></a></li>
					</ul>
			</div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="header-area">
		  <div class="container">
			<div class="row">
				<div class="span4">
					<div class="logo"> 
						<?php 
						$header_logo = get_themeoption_value('header_logo','general_settings');
						$logo_width = get_themeoption_value('logo_width','general_settings');
						$logo_height = get_themeoption_value('logo_height','general_settings');
						//Print Logo
						$image_src = '';
						if(!empty($header_logo)){ 
							$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
							$image_src = (empty($image_src))? '': $image_src[0];			
						}?>
						<a href="<?php echo home_url(); ?>">
							<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
						</a>
					</div>
				</div>
				<div class="span8"> 
					<div class="header-area-nav"><a href="#"><?php _e('My Account','crunchpress');?></a>  /  <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e('My Cart','crunchpress');?></a>  /  <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>"><?php _e('Checkout','crunchpress');?></a>  /  <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>"><?php _e('Track Your Order','crunchpress');?></a></div>
					<div class="header-area-search">
						<form method="get" action="<?php  echo home_url(); ?>/">
							<input type="submit" name="Submit" value="Submit" />
							<input name="s" type="text" placeholder="Search for..." value="<?php the_search_query(); ?>">
						</form>
					</div>
				</div>
			</div>
		  </div>
		</section>
		<section class="navigation">
		  <div class="container">
			<div class="row">
			  <div class="span12">
			<?php 
				// Menu parameters		
				$defaults = array(
				  'theme_location'  => 'top-menu',
				  'menu'            => '', 
				  'container'       => '', 
				  'container_class' => 'main-nav', 
				  'container_id'    => 'navbar',
				  'menu_class'      => '', 
				  'menu_id'         => '',
				  'echo'            => true,
				  'fallback_cb'     => '',
				  'before'          => '',
				  'after'           => '',
				  'link_before'     => '',
				  'link_after'      => '',
				  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  'depth'           => 0,
				  'walker'          => '',);				
				if(has_nav_menu('top-menu')){ ?>
					<div class="main-nav">
						<?php wp_nav_menu( $defaults);?>
					</div>	
				<?php }else{
					$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav" >
							<?php wp_page_menu( $args ); ?>                
						</div>
				<?php } ?>
			  </div>
			</div>
		  </div>
		</section>
		<!--NAVIGATION SECTION END--> 
	</header>
	
	<?php }
	
	function header_style_8(){ ?>
	
	<header class="cp-header-multi-1">
    	<!--TOP STRIP SECTION START-->
    	<section class="topbar bg-purple">
        	<div class="container">
            	<div class="top-nav-cp hide-sub-nav">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>		
                    <ul class="pull-right topright">
                        <li class="ac-links"><a href="#signin" role="button" data-toggle="modal"><?php _e('Login /','crunchpress');?> </a>  <a href="#signup" role="button" data-toggle="modal"><?php _e('Signup','crunchpress');?></a></li>
						<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
								<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
								<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
								<?php if($google_plus_network <> ''){ ?><li><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
								<?php if($linked_in_network <> ''){ ?><li><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
								<?php if($youtube_network <> ''){ ?><li><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a></li><?php }?>
								<?php if($flickr_network <> ''){ ?><li><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a></li><?php }?>
								<?php if($vimeo_network <> ''){ ?><li><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a></li><?php }?>
								<?php if($pinterest_network <> ''){ ?><li><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a></li><?php }?>
								<?php if($Instagram_network <> ''){ ?><li><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a></li><?php }?>
								<?php if($github_network <> ''){ ?><li><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a></li><?php }?>
								<?php if($skype_network <> ''){ ?><li><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a></li><?php }?>
						<?php }?>
                    </ul>
                </div>
            </div>
        </section>
        <!--TOP STRIP SECTION END-->
        <!--NAVIGATION SECTION START-->
        <section class="navigation">
        	<div class="container">
            	<!--MAIN NAVIGATION START-->
            	<div class="row">
                	<div class="span4">
                    	<div class="logo">
                        	<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}?>
								<a href="<?php echo home_url(); ?>">
									<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
								</a>
                        </div>
                    </div>
                    <div class="span8">
						<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => '', 
						  'container_class' => 'main-nav', 
						  'container_id'    => 'navbar',
						  'menu_class'      => '', 
						  'menu_id'         => 'cp_nav',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
								<?php wp_nav_menu( $defaults);?>
						<?php }else{
							$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div class="main-nav" >
									<?php wp_page_menu( $args ); ?>                
								</div>
						<?php } ?>
                    </div>
                 </div>
            </div>
        </section>
        <!--NAVIGATION SECTION END-->
    </header>
	<?php }
	
	function header_style_9(){ ?>
	
	<header class="cp-header-multi-2">
    	<!--TOP STRIP SECTION START-->
    	<section class="inner bg-purple">
        	<div class="container">
            	<div class="topbar hide-sub-nav">
                	<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
                    <ul class="pull-right topright">
                        <li class="ac-links"><a href="#signin" role="button" data-toggle="modal"><i class="fa fa-lock"></i><?php _e('Login','crunchpress');?></a>  <a href="#signup" role="button" data-toggle="modal"><i class="fa fa-plus"></i> <?php _e('Signup','crunchpress');?></a></li>                        
						<li>
						<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
								<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
								<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
								<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
								<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
								<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
								<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
								<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
								<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
								<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
								<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
								<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
						<?php }?>
						</li>
                        <li class="search cp-search-box">
							<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
							<div class="search-box">
								<form method="get" action="<?php  echo home_url(); ?>/">
									<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
									<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--TOP STRIP SECTION END-->
        <!--NAVIGATION SECTION START-->
        <section class="navigation">
        	<div class="container">
            	<!--MAIN NAVIGATION START-->
            	<div class="row">
                	<div class="span5">
                    	<div class="logo">
                        	<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}?>
								<a href="<?php echo home_url(); ?>">
									<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
								</a>
                        </div>
                    </div>
                    <div class="span7">
					<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => 'div', 
						  'container_class' => 'main-nav', 
						  'container_id'    => '',
						  'menu_class'      => '', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
								<?php wp_nav_menu( $defaults);?>
						<?php }else{
							$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div class="main-nav" >
									<?php wp_page_menu( $args ); ?>                
								</div>
						<?php } ?>
                    </div>
                    
                 </div>
            </div>
        </section>
        <!--NAVIGATION SECTION END-->
    </header>
	
	<?php }
	
	
	function header_style_10(){ ?>
	<header class="cp-header-multi-5">
        <!--NAVIGATION SECTION START-->
        <section class="navigation">
        	<div class="container">
            	<!--MAIN NAVIGATION START-->
            	<div class="row">
                	<div class="span3">
                    	<div class="logo">
                        	<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}?>
								<a href="<?php echo home_url(); ?>">
									<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
								</a>
                        </div>
                    </div>
                    <div class="span9">
                    	<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => '', 
						  'container_class' => 'main-nav', 
						  'container_id'    => 'navbar',
						  'menu_class'      => '', 
						  'menu_id'         => 'cp_nav',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
								<?php wp_nav_menu( $defaults);?>
						<?php }else{
							$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div class="main-nav" >
									<?php wp_page_menu( $args ); ?>                
								</div>
						<?php } ?>
                    </div>
                 </div>
            </div>
        </section>
        <!--NAVIGATION SECTION END-->
    </header>
	
	<?php }
	
	function header_style_11(){ ?>
	
		<header class="cp-header-multi-6"> 
			<!--TOP STRIP SECTION START-->
			<section class="bg-purple">
				<div class="container">
					<div class="topbar top-strip hide-sub-nav">
						<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'header-menu',
						  'menu'            => '', 
						  'container'       => '',		  
						  'container_id'    => '',
						  'menu_class'      => 'pull-left topleft', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('header-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>					
						<?php }?>	
						<ul class="pull-right">
						<li>
						<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
								<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
								<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
								<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
								<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
								<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
								<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
								<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
								<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
								<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
								<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
								<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
						<?php }?>
						</li>
							<?php 
							//WooCommerce
							if(class_exists("Woocommerce")){
								$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
								if($topcart_icon == 'enable'){
								global $post,$post_id,$product,$woocommerce;	
								$currency = get_woocommerce_currency_symbol();?>
								<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
								<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
										<div class="widget_shopping_cart_content"></div>
									<?php }else{ ?>
										<div class="hide_cart_widget_if_empty"></div>
									<?php }?>
								</li>
								<?php } ?>
							<?php }else{ ?>
								<li>&nbsp;</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</section>
			<!--TOP STRIP SECTION END--> 
			<!--NAVIGATION SECTION START-->
			<section class="navigation">
				<div class="container"> 
					<!--MAIN NAVIGATION START-->
					<div class="row">
						<div class="span2">
							<div class="logo">
								<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}?>
								<a href="<?php echo home_url(); ?>">
									<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
								</a>
							</div>
						</div>
						<div class="span9">
							<?php 
							// Menu parameters		
							$defaults = array(
							  'theme_location'  => 'top-menu',
							  'menu'            => '', 
							  'container'       => '', 
							  'container_class' => 'main-nav', 
							  'container_id'    => 'navbar',
							  'menu_class'      => '', 
							  'menu_id'         => '',
							  'echo'            => true,
							  'fallback_cb'     => '',
							  'before'          => '',
							  'after'           => '',
							  'link_before'     => '',
							  'link_after'      => '',
							  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							  'depth'           => 0,
							  'walker'          => '',);				
							if(has_nav_menu('top-menu')){ ?>
									<?php wp_nav_menu( $defaults);?>
							<?php }else{
								$args = array(
									'sort_column' => 'menu_order, post_title',
									'menu_class'  => 'nav',
									'include'     => '',
									'exclude'     => '',
									'echo'        => true,
									'show_home'   => false,
									'menu'            => '', 
									'container'       => '', 
									'link_before' => '',
									'link_after'  => '' );?>
									<div class="main-nav" >
										<?php wp_page_menu( $args ); ?>                
									</div>
							<?php } ?>
						</div>
						<div class="span1">			  
							<div class="search cp-search-box">
								<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
								<div class="search-box">
									<form method="get" action="<?php  echo home_url(); ?>/">
										<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
										<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--NAVIGATION SECTION END--> 
		</header>
	
	<?php }
	
	function header_style_12(){ ?>
	
	<header class="cp-header-multi-6"> 
		<!--TOP STRIP SECTION START-->
		<section class="bg-purple">
			<div class="container">
				<div class="topbar top-strip hide-sub-nav">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
					<ul class="pull-right">
						<li class="ac-links">
							<a href="#signin" role="button" data-toggle="modal"><i class="fa fa-user"></i> <?php _e('Login |','crunchpress');?> </a>
							<a href="#signup" role="button" data-toggle="modal"><?php _e('Signup','crunchpress');?></a>
						</li>
						<?php 
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
							global $post,$post_id,$product,$woocommerce;	
							$currency = get_woocommerce_currency_symbol();?>
							<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
									<div class="widget_shopping_cart_content"></div>
								<?php }else{ ?>
									<div class="hide_cart_widget_if_empty"></div>
								<?php }?>
							</li>
							<?php } ?>
						<?php }else{ ?>
							<li>&nbsp;</li>
						<?php } ?>
						<li>
							<div class="topsearch">
								<form method="get" action="<?php  echo home_url(); ?>/">
									<input name="s" type="text" placeholder="Search for..." value="<?php the_search_query(); ?>">
									<input type="submit" name="Submit" value="Submit" />
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="navigation">
			<div class="container"> 
				<!--MAIN NAVIGATION START-->
				<div class="row">
					<div class="span2">
						<div class="logo">
							<?php 
							$header_logo = get_themeoption_value('header_logo','general_settings');
							$logo_width = get_themeoption_value('logo_width','general_settings');
							$logo_height = get_themeoption_value('logo_height','general_settings');
							//Print Logo
							$image_src = '';
							if(!empty($header_logo)){ 
								$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
								$image_src = (empty($image_src))? '': $image_src[0];			
							}?>
							<a href="<?php echo home_url(); ?>">
								<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
						</div>
					</div>
					<div class="span10">
						<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => 'div', 
						  'container_class' => 'main-nav', 
						  'container_id'    => '',
						  'menu_class'      => '', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
								<?php wp_nav_menu( $defaults);?>
						<?php }else{
							$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div class="main-nav" >
									<?php wp_page_menu( $args ); ?>                
								</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		<!--NAVIGATION SECTION END--> 
	</header>
	
	<?php }
	
	function header_style_13(){ ?>
	 <header class="cp-header-multi-8 cp-header-f-13"> 
    <!--TOP STRIP SECTION START-->
    <section class="topbar">
      <div class="container">
        <div class="topbar hide-sub-nav">
		<?php 
		// Menu parameters		
		$defaults = array(
		  'theme_location'  => 'header-menu',
		  'menu'            => '', 
		  'container'       => '',		  
		  'container_id'    => '',
		  'menu_class'      => 'pull-left topleft', 
		  'menu_id'         => '',
		  'echo'            => true,
		  'fallback_cb'     => '',
		  'before'          => '',
		  'after'           => '',
		  'link_before'     => '',
		  'link_after'      => '',
		  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		  'depth'           => 0,
		  'walker'          => '',);				
		if(has_nav_menu('header-menu')){ ?>
			<?php wp_nav_menu( $defaults);?>					
		<?php }?>	
          <ul class="topright pull-right">
          
          <li class="social">
			<?php 
			$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
			if($topsocial_icon == 'enable'){ 
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
					<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
					<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
					<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
					<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
					<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
					<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
					<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
					<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
					<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
					<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
					<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
					<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
			<?php }?>
          </li>
          <li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
			<?php 
			//WooCommerce
			if(class_exists("Woocommerce")){
				$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
				if($topcart_icon == 'enable'){
				global $post,$post_id,$product,$woocommerce;	
				$currency = get_woocommerce_currency_symbol();?>
				<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
				<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
						<div class="widget_shopping_cart_content"></div>
					<?php }else{ ?>
						<div class="hide_cart_widget_if_empty"></div>
					<?php }?>
				</li>
				<?php } ?>
			<?php }else{ ?>
				<li>&nbsp;</li>
			<?php } ?>
          </ul>
        </div>
      </div>
    </section>
    <!--TOP STRIP SECTION END--> 
    <!--NAVIGATION SECTION START-->
    <section class="navigation">
      <div class="container"> 
        <!--MAIN NAVIGATION START-->
        <div class="row">
        <div class="head-nav">
			<div class="span3">
				<div class="logo">
					<?php 
					$header_logo = get_themeoption_value('header_logo','general_settings');
					$logo_width = get_themeoption_value('logo_width','general_settings');
					$logo_height = get_themeoption_value('logo_height','general_settings');
					//Print Logo
					$image_src = '';
					if(!empty($header_logo)){ 
						$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
						$image_src = (empty($image_src))? '': $image_src[0];			
					}?>
					<a href="<?php echo home_url(); ?>">
						<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo-black.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
					</a>
				</div>
			</div>
			<div class="span8">
				<?php 
				// Menu parameters		
				$defaults = array(
				  'theme_location'  => 'top-menu',
				  'menu'            => '', 
				  'container'       => 'div', 
				  'container_class' => 'main-nav', 
				  'container_id'    => '',
				  'menu_class'      => '', 
				  'menu_id'         => '',
				  'echo'            => true,
				  'fallback_cb'     => '',
				  'before'          => '',
				  'after'           => '',
				  'link_before'     => '',
				  'link_after'      => '',
				  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  'depth'           => 0,
				  'walker'          => '',);				
				if(has_nav_menu('top-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>
				<?php }else{
					$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav" >
							<?php wp_page_menu( $args ); ?>                
						</div>
				<?php } ?>
			</div>
			<div class="span1">
				<div class="search cp-search-box cp-search-f-13">
					<a href="#" id="no-active-btn" class="search-cp"><i class="fa fa-search"></i></a>
					<div class="search-box">
						<form method="get" action="<?php  echo home_url(); ?>/">
							<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
							<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
        </div>
      </div>
      </div>
    </section>
    <!--NAVIGATION SECTION END--> 
  </header>
	
	<?php }
	
	function header_style_14(){ ?>	
	<header class="cp-header-multi-14"> 
        <!--NAVIGATION SECTION START-->
        <section class="navigation <?php if($topbutton_icon <> 'enable'){echo 'no-top-bar';}else{}?>">
        	<div class="container bg-purple nav_menu_top">
            	<!--MAIN NAVIGATION START-->
            	<div class="row-fluid">
                	<div class="span2">
                    	<div class="logo">
							<?php 
							$header_logo = get_themeoption_value('header_logo','general_settings');
							$logo_width = get_themeoption_value('logo_width','general_settings');
							$logo_height = get_themeoption_value('logo_height','general_settings');
							//Print Logo
							$image_src = '';
							if(!empty($header_logo)){ 
								$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
								$image_src = (empty($image_src))? '': $image_src[0];			
							}?>
							<a href="<?php echo home_url(); ?>">
								<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo ''; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
                        </div>
                    </div>
					<?php $topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');?>
					
                    <div class="<?php if($topsocial_icon == 'enable'){ echo 'span8';}else{echo 'span10';}?>">
                    	<?php 
						// Menu parameters		
						$defaults = array(
						  'theme_location'  => 'top-menu',
						  'menu'            => '', 
						  'container'       => '', 
						  'container_class' => 'menu-{menu slug}-container', 
						  'container_id'    => '',
						  'menu_class'      => 'nav', 
						  'menu_id'         => 'menusection',
						  'echo'            => true,
						  'fallback_cb'     => '',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => 0,
						  'walker'          => '',);				
						if(has_nav_menu('top-menu')){ ?>
							<div id="mymenu" class="desktop_view nav-collapse collapse">
								<?php wp_nav_menu( $defaults);?>
							</div>
						<?php }else{
							$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div id="custom_menu_cp" class="desktop_view nav-collapse collapse">
									<?php wp_page_menu( $args ); ?>                
								</div>
						<?php } ?>
					</div>
					<?php 
					$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
					if($topsocial_icon == 'enable'){ ?>
					<div class="span2">
						
						 <?php 
							$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
							if($topsocial_icon == 'enable'){ 
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
								<ul class="social">
									<?php if($facebook_network <> ''){ ?><li><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a></li><?php }?>
									<?php if($twitter_network <> ''){ ?><li><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a></li><?php }?>
									<?php if($delicious_network <> ''){ ?><li><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a></li><?php }?>
								
								</ul>	
							<?php }?>
                    </div>
				<?php }?>	
                </div>
            </div>
        </section>
        <!--NAVIGATION SECTION END-->
	</header>
	
	<?php }
	
	
	function header_style_15(){ ?>
	
	<header class="cp-header-multi-8 cp-header-f-15"> 
		<!--TOP STRIP SECTION START-->
		<section class="topbar">
			<div class="container">
				<div class="topbar hide-sub-nav">
					<div class="topright pull-left">
						<form method="get" action="<?php  echo home_url(); ?>/">
							<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
							<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<ul class="topbar hide-sub-nav pull-right">
					
						<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
						<?php 
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
							global $post,$post_id,$product,$woocommerce;	
							$currency = get_woocommerce_currency_symbol();?>
							<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
									<div class="widget_shopping_cart_content"></div>
								<?php }else{ ?>
									<div class="hide_cart_widget_if_empty"></div>
								<?php }?>
							</li>
							<?php } ?>
						<?php }else{ ?>
							<li>&nbsp;</li>
						<?php } ?>
					</ul>
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-right topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
					
				</div>
			</div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="navigation">
			<div class="container"> 
				<!--MAIN NAVIGATION START-->
				<div class="row">
					<div class="head-nav">
						<div class="span3">
							<div class="logo">
								<?php 
								$header_logo = get_themeoption_value('header_logo','general_settings');
								$logo_width = get_themeoption_value('logo_width','general_settings');
								$logo_height = get_themeoption_value('logo_height','general_settings');
								//Print Logo
								$image_src = '';
								if(!empty($header_logo)){ 
									$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
									$image_src = (empty($image_src))? '': $image_src[0];			
								}?>
								<a href="<?php echo home_url(); ?>">
									<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo-slog.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
								</a>
							</div>
						</div>
						<div class="span9">
							<?php 
							// Menu parameters		
							$defaults = array(
							  'theme_location'  => 'top-menu',
							  'menu'            => '', 
							  'container'       => 'div', 
							  'container_class' => 'main-nav', 
							  'container_id'    => '',
							  'menu_class'      => '', 
							  'menu_id'         => '',
							  'echo'            => true,
							  'fallback_cb'     => '',
							  'before'          => '',
							  'after'           => '',
							  'link_before'     => '',
							  'link_after'      => '',
							  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							  'depth'           => 0,
							  'walker'          => '',);				
							if(has_nav_menu('top-menu')){ ?>
									<?php wp_nav_menu( $defaults);?>
							<?php }else{
								$args = array(
								'sort_column' => 'menu_order, post_title',
								'menu_class'  => 'nav',
								'include'     => '',
								'exclude'     => '',
								'echo'        => true,
								'show_home'   => false,
								'menu'            => '', 
								'container'       => '', 
								'link_before' => '',
								'link_after'  => '' );?>
								<div class="main-nav" >
									<?php wp_page_menu( $args ); ?>                
								</div>
							<?php } ?>
							
							<ul class="topbar hide-sub-nav">
								<li class="social">
								<?php 
								$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
								if($topsocial_icon == 'enable'){ 
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
										<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
										<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
										<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
										<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
										<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
										<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
										<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
										<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
										<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
										<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
										<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
										<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
								<?php }?>
							</li>
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--NAVIGATION SECTION END--> 
	</header>
	
	<?php }
	
	function header_style_16(){ ?>
	
	<header class="cp-header-multi-9"> 
		<!--TOP STRIP SECTION START-->
		<section class="topbar">
			<div class="container">
				<div class="topbar hide-sub-nav">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
					<ul class="topright pull-right">
						<li class="social">
							<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
								<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
								<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
								<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
								<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
								<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
								<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
								<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
								<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
								<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
								<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
								<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
						<?php }?>
						</li>
						<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
						<?php 
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
							global $post,$post_id,$product,$woocommerce;	
							$currency = get_woocommerce_currency_symbol();?>
							<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
									<div class="widget_shopping_cart_content"></div>
								<?php }else{ ?>
									<div class="hide_cart_widget_if_empty"></div>
								<?php }?>
							</li>
							<?php } ?>
						<?php }else{ ?>
							<li>&nbsp;</li>
						<?php } ?>
						<li><span class="sicon"><a href="#"> <i class="fa fa-search"></i></a></span></li>
					</ul>
				</div>
			</div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="navigation">
			<div class="logo">
				<div class="container">
					<div class="row">
						<div class="span12">
							<?php 
							$header_logo = get_themeoption_value('header_logo','general_settings');
							$logo_width = get_themeoption_value('logo_width','general_settings');
							$logo_height = get_themeoption_value('logo_height','general_settings');
							//Print Logo
							$image_src = '';
							if(!empty($header_logo)){ 
								$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
								$image_src = (empty($image_src))? '': $image_src[0];			
							}?>
							<a href="<?php echo home_url(); ?>">
								<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo-slog.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="nav-bg">
				<div class="container">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => 'div', 
					  'container_class' => 'main-nav', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>
					<?php }else{
						$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav" >
							<?php wp_page_menu( $args ); ?>                
						</div>
					<?php } ?>
				</div>
			</div>            
		</section>
		<!--NAVIGATION SECTION END--> 
	</header>
  
	<?php }
	
	function header_style_17(){ ?>
	
	<header class="cp-header-multi-10">
		<div class="header-logo">
			<div class="container">
				<div class="row">
					<div class="span6">
						<?php 
						$header_logo = get_themeoption_value('header_logo','general_settings');
						$logo_width = get_themeoption_value('logo_width','general_settings');
						$logo_height = get_themeoption_value('logo_height','general_settings');
						//Print Logo
						$image_src = '';
						if(!empty($header_logo)){ 
							$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
							$image_src = (empty($image_src))? '': $image_src[0];			
						}?>
						<a href="<?php echo home_url(); ?>">
							<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
						</a>
					</div>
					<div class="span6">  
						<ul class="social">
							<?php 
							$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
							if($topsocial_icon == 'enable'){ 
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
									<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
									<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
									<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
									<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
									<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
									<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
									<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
									<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
									<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
									<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
									<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
									<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="main-nav ">
			<div class="container">
				<div class="row">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => 'div', 
					  'container_class' => 'span10 navigation', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>
					<?php }else{
						$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="span10 navigation" >
							<?php wp_page_menu( $args ); ?>                
						</div>
					<?php } ?>
					<div class="span2">
						<ul class="pull-right nav-user">
							<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
							<?php 
							//WooCommerce
							if(class_exists("Woocommerce")){
								$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
								if($topcart_icon == 'enable'){
								global $post,$post_id,$product,$woocommerce;	
								$currency = get_woocommerce_currency_symbol();?>
								<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
								<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
										<div class="widget_shopping_cart_content"></div>
									<?php }else{ ?>
										<div class="hide_cart_widget_if_empty"></div>
									<?php }?>
								</li>
								<?php } ?>
							<?php }else{ ?>
								<li>&nbsp;</li>
							<?php } ?>
							<li>
								<span class="sicon cp-search-box">
									<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
									<div class="search-box">
										<form method="get" action="<?php  echo home_url(); ?>/">
											<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
											<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
	</header>
  <!--HEADER SECTION END--> 
	
	<?php 
	}
	
	function header_style_18(){ ?>
	
	<header class="cp-header-multi-11"> 
		<!--TOP STRIP SECTION START-->
		<section class="topbar">
			<div class="container">
				<div class="topbar hide-sub-nav">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
					<ul class="topright pull-right">
						<li class="social">
							<?php 
							$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
							if($topsocial_icon == 'enable'){ 
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
									<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
									<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
									<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
									<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
									<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
									<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
									<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
									<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
									<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
									<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
									<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
									<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
							<?php }?>
						</li>
						<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
						<?php 
						//WooCommerce
						if(class_exists("Woocommerce")){
							$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
							if($topcart_icon == 'enable'){
							global $post,$post_id,$product,$woocommerce;	
							$currency = get_woocommerce_currency_symbol();?>
							<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
									<div class="widget_shopping_cart_content"></div>
								<?php }else{ ?>
									<div class="hide_cart_widget_if_empty"></div>
								<?php }?>
							</li>
							<?php } ?>
						<?php }else{ ?>
							<li>&nbsp;</li>
						<?php } ?>
						<li>
							<span class="sicon cp-search-box">
								<a href="#" id="no-active-btn" class="search"><i class="fa fa-search"></i></a>
								<div class="search-box">
									<form method="get" action="<?php  echo home_url(); ?>/">
										<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
										<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="navigation">
			<div class="logo">
				<div class="container">
					<div class="row">
						<div class="span12">
							<?php 
							$header_logo = get_themeoption_value('header_logo','general_settings');
							$logo_width = get_themeoption_value('logo_width','general_settings');
							$logo_height = get_themeoption_value('logo_height','general_settings');
							//Print Logo
							$image_src = '';
							if(!empty($header_logo)){ 
								$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
								$image_src = (empty($image_src))? '': $image_src[0];			
							}?>
							<a href="<?php echo home_url(); ?>">
								<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="nav-bg">
				<div class="container">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => 'div', 
					  'container_class' => 'main-nav', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>
					<?php }else{
						$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav" >
							<?php wp_page_menu( $args ); ?>                
						</div>
					<?php } ?>
				</div>
			</div>            
		</section>
		<!--NAVIGATION SECTION END--> 
	</header>
	<?php }
	
	function header_style_19(){ ?>
	<header class="cp-header-multi-8 cp-header-multi-12"> 
		<!--TOP STRIP SECTION START-->
		<section class="topbar">
		  <div class="container">
			 <div class="topbar hide-sub-nav">
				<?php 
				// Menu parameters		
				$defaults = array(
				  'theme_location'  => 'header-menu',
				  'menu'            => '', 
				  'container'       => '',		  
				  'container_id'    => '',
				  'menu_class'      => 'pull-left topleft', 
				  'menu_id'         => '',
				  'echo'            => true,
				  'fallback_cb'     => '',
				  'before'          => '',
				  'after'           => '',
				  'link_before'     => '',
				  'link_after'      => '',
				  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  'depth'           => 0,
				  'walker'          => '',);				
				if(has_nav_menu('header-menu')){ ?>
					<?php wp_nav_menu( $defaults);?>					
				<?php }?>	
			  <ul class="topright pull-right">
				<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
				<?php 
				//WooCommerce
				if(class_exists("Woocommerce")){
					$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
					if($topcart_icon == 'enable'){
					global $post,$post_id,$product,$woocommerce;	
					$currency = get_woocommerce_currency_symbol();?>
					<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
					<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
							<div class="widget_shopping_cart_content"></div>
						<?php }else{ ?>
							<div class="hide_cart_widget_if_empty"></div>
						<?php }?>
					</li>
					<?php } ?>
				<?php }else{ ?>
					<li>&nbsp;</li>
				<?php } ?>
			  </ul>
			</div>
		  </div>
		</section>
		<!--TOP STRIP SECTION END--> 
		<!--NAVIGATION SECTION START-->
		<section class="navigation-main">
		  <div class="container"> 
			<!--MAIN NAVIGATION START-->
			<div class="row">
			  <div class="head-nav">
				<div class="span3">
					<div class="logo">
						<?php 
						$header_logo = get_themeoption_value('header_logo','general_settings');
						$logo_width = get_themeoption_value('logo_width','general_settings');
						$logo_height = get_themeoption_value('logo_height','general_settings');
						//Print Logo
						$image_src = '';
						if(!empty($header_logo)){ 
							$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
							$image_src = (empty($image_src))? '': $image_src[0];			
						}?>
						<a href="<?php echo home_url(); ?>">
							<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo-slog.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
						</a>
					</div>
				</div>
				<div class="span5">
				 <?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => 'div', 
					  'container_class' => 'main-nav', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>
					<?php }else{
						$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav" >
							<?php wp_page_menu( $args ); ?>                
						</div>
					<?php } ?>
				</div>
				<div class="span4">
					<ul class="social">
					<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
								<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
								<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
								<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
								<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
								<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
								<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
								<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
								<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
								<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
								<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
								<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
						<?php }?>
					</ul>
					<div class="search-box-cp">						
						<form method="get" action="<?php  echo home_url(); ?>/">
							<input name="s" type="text" class="top-search-input" placeholder="Search for..." value="<?php the_search_query(); ?>">
							<button value="" class="top-search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</section>
		<!--NAVIGATION SECTION END--> 
	  </header>
	
	
	<?php }
	
	function header_style_20(){ ?>
		<header class="cp-header-multi-8 cp-header-multi-13"> 
			<!--TOP STRIP SECTION START-->
			<section class="topbar">
			  <div class="container">
				<div class="topbar hide-sub-nav">
					<?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'header-menu',
					  'menu'            => '', 
					  'container'       => '',		  
					  'container_id'    => '',
					  'menu_class'      => 'pull-left topleft', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( $defaults);?>					
					<?php }?>	
				  <ul class="topright pull-right">
					<li class="social">
						<?php 
						$topsocial_icon = get_themeoption_value('topsocial_icon','general_settings');
						if($topsocial_icon == 'enable'){ 
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
								<?php if($facebook_network <> ''){ ?><a href="<?php echo $facebook_network;?>"><i class="fa fa-facebook"></i></a><?php }?>
								<?php if($twitter_network <> ''){ ?><a href="<?php echo $twitter_network;?>"><i class="fa fa-twitter"></i></a><?php }?>
								<?php if($delicious_network <> ''){ ?><a href="<?php echo $delicious_network;?>"><i class="fa fa-delicious"></i></a><?php }?>
								<?php if($google_plus_network <> ''){ ?><a href="<?php echo $google_plus_network;?>"><i class="fa fa-google-plus"></i></a><?php }?>
								<?php if($linked_in_network <> ''){ ?><a href="<?php echo $linked_in_network;?>"><i class="fa fa-linkedin"></i></a><?php }?>
								<?php if($youtube_network <> ''){ ?><a href="<?php echo $youtube_network;?>"><i class="fa fa-youtube"></i></a><?php }?>
								<?php if($flickr_network <> ''){ ?><a href="<?php echo $flickr_network;?>"><i class="fa fa-flickr"></i></a><?php }?>
								<?php if($vimeo_network <> ''){ ?><a href="<?php echo $vimeo_network;?>"><i class="fa fa-vimeo-square"></i></a><?php }?>
								<?php if($pinterest_network <> ''){ ?><a href="<?php echo $pinterest_network;?>"><i class="fa fa-pinterest"></i></a><?php }?>
								<?php if($Instagram_network <> ''){ ?><a href="<?php echo $Instagram_network;?>"><i class="fa fa-instagram"></i></a><?php }?>
								<?php if($github_network <> ''){ ?><a href="<?php echo $github_network;?>"><i class="fa fa-github"></i></a><?php }?>
								<?php if($skype_network <> ''){ ?><a href="<?php echo $skype_network;?>"><i class="fa fa-skype"></i></a><?php }?>
						<?php }?>
					</li>
					<li><span class="user"><a href="#signin" role="button" data-toggle="modal"> <i class="fa fa-user"></i></a></span></li>
					<?php 
					//WooCommerce
					if(class_exists("Woocommerce")){
						$topcart_icon = get_themeoption_value('topcart_icon','general_settings');
						if($topcart_icon == 'enable'){
						global $post,$post_id,$product,$woocommerce;	
						$currency = get_woocommerce_currency_symbol();?>
						<li class="cart-item"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
						<?php if($woocommerce->cart->cart_contents_count <> 0){ ?>
								<div class="widget_shopping_cart_content"></div>
							<?php }else{ ?>
								<div class="hide_cart_widget_if_empty"></div>
							<?php }?>
						</li>
						<?php } ?>
					<?php }else{ ?>
						<li>&nbsp;</li>
					<?php } ?>
				  </ul>
				</div>
			  </div>
			</section>
			<!--TOP STRIP SECTION END--> 
			<!--NAVIGATION SECTION START-->
			<section class="navigation">
			  <div class="container"> 
				<!--MAIN NAVIGATION START-->
				<div class="row">
				  <div class="head-nav">
					<div class="span3">
						<div class="logo">.
						  <?php 
							$header_logo = get_themeoption_value('header_logo','general_settings');
							$logo_width = get_themeoption_value('logo_width','general_settings');
							$logo_height = get_themeoption_value('logo_height','general_settings');
							//Print Logo
							$image_src = '';
							if(!empty($header_logo)){ 
								$image_src = wp_get_attachment_image_src( $header_logo, 'full' );
								$image_src = (empty($image_src))? '': $image_src[0];			
							}?>
							<a href="<?php echo home_url(); ?>">
								<img class="logo_img" width="<?php if($logo_width == '' or $logo_width == ' '){ echo '200'; }else{echo $logo_width;}?>" height="<?php if($logo_height == '' or $logo_height == ' '){ echo '200'; }else{echo $logo_height;}?>" src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/logo-slog.png';}?>" alt="<?php echo bloginfo( 'name' )?>">
							</a>
						</div>
					</div>
					<div class="span9">
					   <?php 
					// Menu parameters		
					$defaults = array(
					  'theme_location'  => 'top-menu',
					  'menu'            => '', 
					  'container'       => 'div', 
					  'container_class' => 'main-nav', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => 'cp_nav',
					  'echo'            => true,
					  'fallback_cb'     => '',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => '',);				
					if(has_nav_menu('top-menu')){ ?>
							<?php wp_nav_menu( $defaults);?>
					<?php }else{
						$args = array(
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'nav',
						'include'     => '',
						'exclude'     => '',
						'echo'        => true,
						'show_home'   => false,
						'menu'            => '', 
						'container'       => '', 
						'link_before' => '',
						'link_after'  => '' );?>
						<div class="main-nav pull-right" >
							<?php wp_page_menu( $args ); ?>                
						</div>
					<?php } ?>
					</div>
				  </div>
				</div>
			  </div>
			</section>
			<!--NAVIGATION SECTION END--> 
		</header>
	<?php }
	
  
  
	 //Header Function html
	function print_header_html($header=""){
		
		$header_style_apply = get_themeoption_value('header_style_apply','general_settings');
		if($header_style_apply == 'enable'){$header = 'enable';}else{}
		if($header == 'Style 1'){
			header_style_1();
		}else if($header == 'Style 2'){
			header_style_2();
		}else if($header == 'Style 3'){
			header_style_3();
		}else if($header == 'Style 4'){
			header_style_4();
		}else if($header == 'Style 5'){
			header_style_5();
		}else if($header == 'Style 6'){
			header_style_6();
		}else if($header == 'Style 7'){
			header_style_7();
		}else if($header == 'Style 8'){
			header_style_8();
		}else if($header == 'Style 9'){
			header_style_9();
		}else if($header == 'Style 10'){
			header_style_10();
		}else if($header == 'Style 11'){
			header_style_11();
		}else if($header == 'Style 12'){
			header_style_12();
		}else if($header == 'Style 13'){
			header_style_13();
		}else if($header == 'Style 14'){
			header_style_14();
		}else if($header == 'Style 15'){
			header_style_15();
		}else if($header == 'Style 16'){
			header_style_16();
		}else if($header == 'Style 17'){
			header_style_17();
		}else if($header == 'Style 18'){
			header_style_18();
		}else if($header == 'Style 19'){
			header_style_19();
		}else if($header == 'Style 20'){
			header_style_20();
		}else{
			$select_header_cp = get_themeoption_value('select_header_cp','general_settings');
			if($select_header_cp == 'Style 1'){
				header_style_1();
			}else if($select_header_cp == 'Style 2'){
				header_style_2();
			}else if($select_header_cp == 'Style 3'){
				header_style_3();
			}else if($select_header_cp == 'Style 4'){
				header_style_4();
			}else if($select_header_cp == 'Style 5'){
				header_style_5();
			}else if($select_header_cp == 'Style 6'){
				header_style_6();
			}else if($select_header_cp == 'Style 7'){
				header_style_7();
			}else if($select_header_cp == 'Style 8'){
				header_style_8();
			}else if($select_header_cp == 'Style 9'){
				header_style_9();
			}else if($select_header_cp == 'Style 10'){
				header_style_10();
			}else if($select_header_cp == 'Style 11'){
				header_style_11();
			}else if($select_header_cp == 'Style 12'){
				header_style_12();
			}else if($select_header_cp == 'Style 13'){
				header_style_13();
			}else if($select_header_cp == 'Style 14'){
				header_style_14();
			}else if($select_header_cp == 'Style 15'){
				header_style_15();
			}else if($select_header_cp == 'Style 16'){
				header_style_16();
			}else if($select_header_cp == 'Style 17'){
				header_style_17();
			}else if($select_header_cp == 'Style 18'){
				header_style_18();
			}else if($select_header_cp == 'Style 19'){
				header_style_19();
			}else if($select_header_cp == 'Style 20'){
				header_style_20();
			}else{
				header_style_1();
			}
		}
	}
	
	//print header style
	function print_header_class($header=""){
		$banner_class = '';
		$header_style_apply = get_themeoption_value('header_style_apply','general_settings');
		if($header_style_apply == 'enable'){$header = 'enable';}else{}
		if($header == 'Style 1'){
			$banner_class = 'banner-inner';
			echo '<style>.woocommerce-breadcrumb{margin-top:-45px !important;}.breadcrumb-section .breadcrumb{margin-top:-75px;}</style>';
		}else if($header == 'Style 2'){
			$banner_class = 'banner banner-inner';
		}else if($header == 'Style 3'){
			$banner_class = 'banner banner-inner';
		}else if($header == 'Style 4'){
			$banner_class = 'banner banner-inner';
			echo '<style>.banner-inner{height:280px !important;}#cp-header-2{position:absolute !important;}</style>';
			echo '<style>.woocommerce-breadcrumb{margin-top:-45px !important;}.breadcrumb-section .breadcrumb{margin-top:-75px;}</style>';
		}else if($header == 'Style 5'){
			$banner_class = '';
		}else if($header == 'Style 6'){
			$banner_class = '';
			echo '<style>.cp-header-multi .cp-header-multi-4, .cp-header-multi .cp-header-multi-5{position:relative !important;} .woocommerce-breadcrumb, .breadcrumb-section .breadcrumb{margin:0 0 20px;}</style>';
		}else if($header == 'Style 7'){
				$banner_class = '';
		}else if($header == 'Style 8'){
			$banner_class = '';
		}else if($header == 'Style 9'){
			$banner_class = '';
		}else if($header == 'Style 10'){
			$banner_class = 'banner banner-inner';
			//echo '<style>.banner-inner{height:309px !important;}#cp-header-2{position:absolute !important;}</style>';
		}else if($header == 'Style 11'){
			$banner_class = '';
		}else if($header == 'Style 12'){
			$banner_class = '';
		}else if($header == 'Style 13'){
			$banner_class = '';
		}else if($header == 'Style 14'){
			$banner_class = '';
		}else if($header == 'Style 15'){
			$banner_class = '';
		}else if($header == 'Style 16'){
			$banner_class = '';
		}else if($header == 'Style 17'){
			$banner_class = '';
		}else if($header == 'Style 18'){
			$banner_class = '';
		}else if($header == 'Style 19'){
			$banner_class = '';
		}else if($header == 'Style 20'){
			$banner_class = '';
		}else{
			$select_header_cp = get_themeoption_value('select_header_cp','general_settings');
			if($select_header_cp == 'Style 1'){
				$banner_class = 'banner-inner';
				echo '<style>.woocommerce-breadcrumb{margin-top:-45px !important;}.breadcrumb-section .breadcrumb{margin-top:-75px;}</style>';
			}else if($select_header_cp == 'Style 2'){
				$banner_class = 'banner banner-inner';
			}else if($select_header_cp == 'Style 3'){
				$banner_class = 'banner banner-inner';
				
			}else if($select_header_cp == 'Style 4'){
				$banner_class = 'banner banner-inner';
				
			}else if($select_header_cp == 'Style 5'){
				$banner_class = '';
			}else if($select_header_cp == 'Style 6'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 7'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 8'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 9'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 10'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 11'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 12'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 13'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 14'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 15'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 16'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 17'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 18'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 19'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else if($select_header_cp == 'Style 20'){
				$banner_class = '';
				echo '<style>.woocommerce-breadcrumb{margin-top:30px !important;}</style>';
			}else{
				$banner_class = 'banner-inner';
			}
		}
		return $banner_class;
	}
	
	//header background
	function add_header_bg($header=''){
		$header_style_apply = get_themeoption_value('header_style_apply','general_settings');
		if($header_style_apply == 'enable'){$header = 'enable';}else{}
		global $post;
		if($header == 'Style 2' || $header == 'Style 3'){
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			if($thumbnail_id <> ''){
				$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'full' );
				$html_thumb = 'style="background-image:url('.$thumbnail[0].') !important"';
				echo '<style>.banner-inner{height:262px;}</style><section class="banner banner-inner" '.$html_thumb.'></section>';
			}else{
				$html_thumb = '';
			}
		}else{
		
		}
	}
	
	//pageant Woo Commerce Function
	function woo_commerce_cart($shop_text='',$shop_icon='',$shop_val=''){
		$cart_html = '';
		if(class_exists("Woocommerce")){
			$shop_html = '';
			if($shop_val == 'icon'){
				$shop_html = $shop_icon;
			}else if($shop_val == 'text'){
				if($shop_text <> ''){
					$shop_html = $shop_text;
				}else{
					$shop_html = 'Shopping Cart';
				}
			}
			
			global $post,$post_id,$product,$woocommerce;	
			$currency = get_woocommerce_currency_symbol();
			
			if($woocommerce->cart->cart_contents_count <> 0){ 
					$shopping_cart_div = '<div class="widget_shopping_cart_content"></div>';
			}else{ 
				$shopping_cart_div = '<div class="hide_cart_widget_if_empty"></div>';
			}
				
			$cart_html = '<li class="cart-item">
				<a href="#" class="btn-login" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Shopping" id="no-active-btn-shopping">
					'.$shop_html.'</a>' .$shopping_cart_div .'</li>';		
		}
		wp_reset_postdata();
		wp_reset_query();
		return $cart_html;
	}
	
	//Header Function html
	function print_header_html_val($header=""){
		$header_style_apply = get_themeoption_value('header_style_apply','general_settings');
		
		if($header_style_apply == 'enable'){$header = 'enable';}else{}
		if($header == 'enable'){
			$select_header_cp = get_themeoption_value('select_header_cp','general_settings');
			return $select_header_cp;
		}else{
			return $header;
		}
	}