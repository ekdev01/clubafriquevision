<?php
class popular_post extends WP_Widget
{
  function popular_post()
  {
    $widget_ops = array('classname' => 'popular_post', 'description' => 'Select Category to show its Popular Posts' );
    parent::__construct('popular_post', 'CrunchPress : Show Popular Posts', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
	$get_cate_posts = isset( $instance['get_cate_posts'] ) ? esc_attr( $instance['get_cate_posts'] ) : '';
	$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';
?>
  <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
	 <?php _e('Title:','crunchpress');?>  
	  <input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>   
  <p>
  <label for="<?php echo $this->get_field_id('nop'); ?>">
	 <?php _e('Number of Posts To Display:','crunchpress');?> 
	  <input class="widefat" size="2" id="<?php echo $this->get_field_id('nop'); ?>" name="<?php echo $this->get_field_name('nop'); ?>" type="text" value="<?php echo esc_attr($nop); ?>" />
  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
  
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['get_cate_posts'] = $new_instance['get_cate_posts'];	
	$instance['nop'] = $new_instance['nop'];
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$get_cate_posts = isset( $instance['get_cate_posts'] ) ? esc_attr( $instance['get_cate_posts'] ) : '';		
		$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';	
	
		if($nop == ""){$nop = '-1';}
		echo $before_widget;	
		// WIDGET display CODE Start
		echo '<div class="sidebar-recent-post">';
		
		if (!empty($title))
			echo $before_title;
			echo $title;
			echo $after_title;
			global $wpdb, $post;
			?>
			<ul>
			<?php
				$category_array = get_term_by('id', $get_cate_posts, 'recipe-category');
				$popularpost = new WP_Query( array( 'ignore_sticky_posts' => true,'posts_per_page' => $nop, 'post_type'=> 'post', 'meta_key' => 'popular_post_views_count', 'orderby' => 'popular_post_views_count meta_value_num', 'order' => 'DESC'  ) );
					while ( $popularpost->have_posts() ) : $popularpost->the_post();
					global $post;
					$post_social = '';
					$sidebars = '';
					$right_sidebar_post = '';
					$left_sidebar_post = '';
					$post_thumbnail = '';
					$video_url_type = '';
					$select_slider_type = '';
					$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
					if($post_detail_xml <> ''){
						$cp_post_xml = new DOMDocument ();
						$cp_post_xml->loadXML ( $post_detail_xml );
						$post_social = find_xml_value($cp_post_xml->documentElement,'post_social');
						$sidebars = find_xml_value($cp_post_xml->documentElement,'sidebar_post');
						$right_sidebar_post = find_xml_value($cp_post_xml->documentElement,'right_sidebar_post');
						$left_sidebar_post = find_xml_value($cp_post_xml->documentElement,'left_sidebar_post');
						$post_thumbnail = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
						$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
						$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
					}
					?>
					
					<!-- Widget Popular Post Code -->
					<li>
						<div class="frame"><a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post->ID, array(80,80));?></a></div>
						<div class="text">
							<strong class="title">
								<a href="<?php echo get_permalink();?>">
								<?php  $title = get_the_title();
										if (strlen($title) < 25){ 
											echo get_the_title();
										}
										else {
											echo substr(get_the_title(),0,25);
											echo '...';
										}
								?>
								</a>
							</strong> 
							<!--<strong class=""><?php echo strip_tags(substr(get_the_content(), 0, 30));?>...</strong>-->
							<a class="mnt" href="<?php echo get_permalink();?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></a>
						</div>
                    </li>
					<!--Widget Code Popular Post END -->

				<?php endwhile;?>
			</ul>
		
					
<?php 
	wp_reset_query();
	wp_reset_postdata();
	echo '</div>';
	echo $after_widget;
		}
	}
add_action( 'widgets_init', create_function('', 'return register_widget("popular_post");') );?>