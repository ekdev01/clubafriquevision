<?php
class recent_news_show extends WP_Widget
{
  function recent_news_show()
  {
    $widget_ops = array('classname' => 'widget-holder', 'description' => 'Blog/News Post Widget' );
    parent::__construct('recent_news_show', 'CrunchPress : Latest News', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$wid_class = isset( $instance['wid_class'] ) ? esc_attr( $instance['wid_class'] ) : '';
    $title = $instance['title'];
	$recent_post_category = isset( $instance['recent_post_category'] ) ? esc_attr( $instance['recent_post_category'] ) : '';
	$number_of_news = isset( $instance['number_of_news'] ) ? esc_attr( $instance['number_of_news'] ) : '';
?>
 <p>
  <label for="<?php echo $this->get_field_id('wid_class'); ?>">
	  <?php _e('Class:','crunchpress');?> 
	  <input class="widefat"  id="<?php echo $this->get_field_id('wid_class'); ?>" name="<?php echo $this->get_field_name('wid_class'); ?>" type="text" value="<?php echo esc_attr($wid_class); ?>" />
  </label>
  </p>
 <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
	 <?php _e('Title:','crunchpress');?>  
	  <input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>
  <p>
  <label for="<?php echo $this->get_field_id('recent_post_category'); ?>">
	  <?php _e('Select Category:','crunchpress');?>
	  <select id="<?php echo $this->get_field_id('recent_post_category'); ?>" name="<?php echo $this->get_field_name('recent_post_category'); ?>" class="widefat">
		<?php
		
				foreach ( get_category_list_array('category') as $category){ ?>
                    <option <?php if(esc_attr($recent_post_category) == $category->slug){echo 'selected';}?> value="<?php echo $category->slug;?>" >
	                    <?php echo substr($category->name, 0, 20);	if ( strlen($category->name) > 20 ) echo "...";?>
                    </option>						
			<?php }?>
      </select>
  </label>
  </p>  
  <p>
  <label for="<?php echo $this->get_field_id('number_of_news'); ?>">
	  <?php _e('Number of News','crunchpress');?>
	<input class="widefat" size="5" id="<?php echo $this->get_field_id('number_of_news'); ?>" name="<?php echo $this->get_field_name('number_of_news'); ?>" type="text" value="<?php echo esc_attr($number_of_news); ?>" />
  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
	$instance['wid_class'] = $new_instance['wid_class'];
    $instance['title'] = $new_instance['title'];
    $instance['recent_post_category'] = $new_instance['recent_post_category'];	
	$instance['number_of_news'] = $new_instance['number_of_news'];	
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$wid_class = empty($instance['wid_class']) ? ' ' : apply_filters('widget_title', $instance['wid_class']);
		$recent_post_category = isset( $instance['recent_post_category'] ) ? esc_attr( $instance['recent_post_category'] ) : '';		
		$number_of_news = isset( $instance['number_of_news'] ) ? esc_attr( $instance['number_of_news'] ) : '';				
		echo $before_widget;	
		// WIDGET display CODE Start
		if (!empty($title))
			echo $before_title;
			echo $title;
			echo $after_title;
			global $wpdb, $post;
			//print_r($post_slider_slug);
			
			  $category_array = get_term_by('slug', $recent_post_category, 'category');
				global $post, $wp_query;
				$class_odd = '';
					$args = array(
						'posts_per_page'			=> $number_of_news,
						'post_type'					=> 'post',
						'category'					=> $recent_post_category,
						'post_status'				=> 'publish',
						'order'						=> 'DESC',
						);
					query_posts($args);
					if ( have_posts() <> "" ) {?>
					<div class="sidebar-recent-post">
					<ul>
					<?php
						$counter_news = 0;		
							while ( have_posts() ): the_post();
							$counter_news++; ?>
							<li>
								<!--<div class="frame"><?php echo get_the_post_thumbnail($post->ID, array(80,80));?></div>-->
									<div class="text">
										<strong class="title">
											<!--<a href="<?php echo get_permalink();?>"></a>-->
											<?php  $title = get_the_title();
												if (strlen($title) < 25){ 
													echo get_the_title();
												}
												else {
												echo substr(get_the_title(),0,25);
												echo '...';
												}?>
											
										</strong>
										<p><?php echo strip_tags(mb_substr(get_the_content(),0,60)); ?></p>
										<a href="<?php echo get_permalink();?>" class="readmore"> <?php _e('Read More','crunchpress');?></a> 
									</div>
							</li>
							<?php 
							endwhile;?>
						</ul>
				</div>
							<?php
					}
	wp_reset_query();
	wp_reset_postdata();
	echo $after_widget;
		}
		
	}
add_action( 'widgets_init', create_function('', 'return register_widget("recent_news_show");') );?>