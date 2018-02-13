<?php
/** 
     * @author Roy Stone
     * @copyright roshi[www.themeforest.net/user/crunchpress]
     * @version 2013
     */

if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

require_once ABSPATH . 'wp-admin/includes/import.php';

$import_filepath = get_template_directory()."/framework/extensions/importer/dummy_data";
$errors = false;
if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
	{
		require_once($class_wp_importer);
	}
	else
	{
		$errors = true;
	}
}
if ( !class_exists( 'WP_Import' ) ) {
	$wp_importer = CP_FW. '/extensions/importer/wordpress-importer.php';
	if ( file_exists( $wp_importer ) )
	{
		require_once($wp_importer);
	}
	else
	{
		$errors = true;
	}
}

if($errors){
   echo "Errors while loading classes. Please use the standart wordpress importer."; 
}else{
    
    
	include_once('default_dummy_data.inc.php');
	if(!is_file($import_filepath.'_1.xml'))
	{
		echo "Problem with dummy data file. Please check the permisions of the xml file";
	}
	else
	{  
	   if(class_exists( 'WP_Import' )){
	       global $wp_version;
			$our_class = new themeple_dummy_data();
			$our_class->fetch_attachments = true;
			$our_class->import($import_filepath.'_1.xml');
		
$widget_text = array (
  2 => 
  array (
    'title' => 'About',
    'text' => '<div class="box-1">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting scrambled it to make a type specimen book...</p>
<a class="btn-readmore" href="#">Read More</a>
</div>',
    'filter' => false,
  ),
  3 => 
  array (
    'title' => '',
    'text' => '<address>
   <ul>
      <li><strong class="title">  <i class="fa fa-home"></i>  House # , Street No. Road. County, City, Country.</strong></li>
              <li><strong class="ph"><i class="fa fa-phone"></i>  (00) 1234 4567 89</strong></li>
              <li><strong class="mob"><i class="fa fa-mobile-phone"></i>  (00) 1234 4567 89</strong></li>
              <li><a href="mailto:" class="email">  <i class="fa fa-envelope"></i>  info@politicize.com</a></li>
            </ul>
            <div class="contact-social">
              <ul>
                <li><a href="#"> <i class="fa fa-facebook-square"></i> </a></li>
                <li><a href="#"> <i class="fa fa-linkedin-square"></i> </a></li>
                <li><a href="#"> <i class="fa fa-google-plus-square"></i> </a></li>
                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#"> <i class="fa fa-tumblr-square"></i> </a></li>
                <li><a href="#"> <i class="fa fa-instagram"></i> </a> </li>
                <li><a href="#"> <i class="fa fa-flickr"></i> </a></li>
                <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
              </ul>
            </div>
            </address>',
    'filter' => false,
  ),
  '_multiwidget' => 1,
);$widget_recent_news_show = array (
  2 => 
  array (
    'wid_class' => '',
    'title' => 'Recent Blogs',
    'recent_post_category' => 'uncategorized',
    'number_of_news' => '3',
  ),
  3 => 
  array (
    'wid_class' => '',
    'title' => 'Latest News',
    'recent_post_category' => 'uncategorized',
    'number_of_news' => '4',
  ),
  4 => 
  array (
    'wid_class' => '',
    'title' => 'Latest News',
    'recent_post_category' => 'uncategorized',
    'number_of_news' => '4',
  ),
  5 => 
  array (
    'wid_class' => '',
    'title' => 'Latest News',
    'recent_post_category' => 'uncategorized',
    'number_of_news' => '4',
  ),
  '_multiwidget' => 1,
);$widget_flickr_widget = array (
  2 => 
  array (
    'title' => 'Flickr Widget',
    'type' => 'user',
    'flickr_id' => '94975828@N00',
    'count' => '9',
    'display' => 'random',
    'size' => 'latest',
    'copyright' => NULL,
  ),
  '_multiwidget' => 1,
);$widget_newsletter_widget = array (
  2 => 
  array (
    'title' => 'Get In Touch',
    'show_name' => 'Yes',
    'news_letter_des' => 'when an unknown printer took a galley of type and scrambled it to make a type specimen book, It has survived.',
  ),
  '_multiwidget' => 1,
);$widget_search = array (
  2 => 
  array (
    'title' => 'Search',
  ),
  3 => 
  array (
    'title' => 'Search',
  ),
  4 => 
  array (
    'title' => 'Search',
  ),
  '_multiwidget' => 1,
);$widget_popular_post = array (
  2 => 
  array (
    'title' => 'Recent Posts',
    'get_cate_posts' => NULL,
    'nop' => '4',
  ),
  3 => 
  array (
    'title' => 'Recent Posts',
    'get_cate_posts' => NULL,
    'nop' => '4',
  ),
  4 => 
  array (
    'title' => 'Recent Posts',
    'get_cate_posts' => NULL,
    'nop' => '5',
  ),
  '_multiwidget' => 1,
);$widget_em_widget = array (
  2 => 
  array (
    'title' => 'Upcoming Events',
    'limit' => '3',
    'scope' => 'future',
    'orderby' => 'event_start_date,event_start_time,event_name',
    'order' => 'ASC',
    'category' => '0',
    'format' => '#_EVENTLINK<ul><li>#_EVENTDATES</li><li>#_LOCATIONTOWN</li></ul>',
    'all_events_text' => 'all events',
    'no_events_text' => 'No events',
    'nolistwrap' => false,
    'all_events' => 0,
  ),
  3 => 
  array (
    'title' => 'Upcoming Events',
    'limit' => '5',
    'scope' => 'future',
    'orderby' => 'event_start_date,event_start_time,event_name',
    'order' => 'ASC',
    'category' => '0',
    'format' => '#_EVENTLINK<ul><li>#_EVENTDATES</li><li>#_LOCATIONTOWN</li></ul>',
    'all_events_text' => 'all events',
    'no_events_text' => 'No events',
    'nolistwrap' => false,
    'all_events' => 0,
  ),
  4 => 
  array (
    'title' => 'Upcoming Events',
    'limit' => '3',
    'scope' => 'future',
    'orderby' => 'event_start_date,event_start_time,event_name',
    'order' => 'ASC',
    'category' => '0',
    'format' => '#_EVENTLINK<ul><li>#_EVENTDATES</li><li>#_LOCATIONTOWN</li></ul>',
    'all_events_text' => 'all events',
    'no_events_text' => 'No events',
    'nolistwrap' => false,
    'all_events' => 0,
  ),
  '_multiwidget' => 1,
);$widget_categories = array (
  2 => 
  array (
    'title' => 'Categories',
    'count' => 0,
    'hierarchical' => 0,
    'dropdown' => 0,
  ),
  '_multiwidget' => 1,
);$widget_archives = array (
  2 => 
  array (
    'title' => 'Archives',
    'count' => 0,
    'dropdown' => 0,
  ),
  '_multiwidget' => 1,
);$widget_tag_cloud = array (
  2 => 
  array (
    'title' => 'Tag Cloud',
    'taxonomy' => 'post_tag',
  ),
  '_multiwidget' => 1,
);$sidebars_widgets=array (
  'wp_inactive_widgets' => 
  array (
  ),
  'sidebar-footer' => 
  array (
    0 => 'text-2',
    1 => 'recent_news_show-2',
    2 => 'flickr_widget-2',
    3 => 'newsletter_widget-2',
  ),
  'custom-sidebar0' => 
  array (
    0 => 'search-2',
    1 => 'recent_news_show-3',
    2 => 'popular_post-2',
    3 => 'em_widget-2',
  ),
  'custom-sidebar1' => 
  array (
    0 => 'search-3',
    1 => 'popular_post-3',
    2 => 'recent_news_show-4',
    3 => 'em_widget-3',
    4 => 'categories-2',
    5 => 'archives-2',
    6 => 'tag_cloud-2',
  ),
  'custom-sidebar2' => 
  array (
  ),
  'custom-sidebar3' => 
  array (
  ),
  'custom-sidebar4' => 
  array (
    0 => 'text-3',
  ),
  'custom-sidebar5' => 
  array (
    0 => 'search-4',
    1 => 'popular_post-4',
    2 => 'recent_news_show-5',
    3 => 'em_widget-4',
  ),
  'array_version' => 3,
);
$show_on_front = 'page';$page_on_front = 53;$theme_mods_politicize = array (
  0 => false,
  'nav_menu_locations' => 
  array (
    'top-menu' => 47,
    'header-menu' => 47,
  ),
);

			//Default Widgets
			save_option('sidebars_widgets','', $sidebars_widgets);
			save_option('widget_text','', $widget_text);	
			save_option('widget_recent_news_show','', $widget_recent_news_show);			
			save_option('widget_flickr_widget','', $widget_flickr_widget);			
			save_option('widget_newsletter_widget','', $widget_newsletter_widget);			
			save_option('widget_search','', $widget_search);		
			save_option('widget_popular_post','', $widget_popular_post);	
			save_option('widget_em_widget','', $widget_em_widget);	
			save_option('widget_categories','', $widget_categories);
			save_option('widget_archives','', $widget_archives);
			save_option('widget_tag_cloud','', $widget_tag_cloud);			
			
			
			//Default Widgets
			save_option('show_on_front','', $show_on_front);
			save_option('page_on_front','', $page_on_front);
			save_option('theme_mods_politicize','', $theme_mods_politicize);			
		

        }
	}    
}


?>