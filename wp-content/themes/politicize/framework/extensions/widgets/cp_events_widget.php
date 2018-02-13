<?php
class recent_event_widget extends WP_Widget
{
  function recent_event_widget()
  {
    $widget_ops = array('classname' => 'recent_event', 'description' => 'Show Recent Events in this widget' );
    parent::__construct('recent_event_widget', 'CrunchPress : Event Gallery Widget', $widget_ops);
  }
 
  function form($instance)
  {

    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $recent_event_category = empty($instance['recent_event_category']) ? ' ' : apply_filters('widget_title', $instance['recent_event_category']);
	$number_of_events = empty($instance['number_of_events']) ? ' ' : apply_filters('widget_title', $instance['number_of_events']);
?>
  <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
	 <?php _e('Title:','crunchpress');?>  
	  <input class="title" size="40" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>
  <p>
  <label for="<?php echo $this->get_field_id('recent_event_category'); ?>">
	  <?php _e('Select Category:','crunchpress');?>
	  <select id="<?php echo $this->get_field_id('recent_event_category'); ?>" name="<?php echo $this->get_field_name('recent_event_category'); ?>" style="width:225px">
		<?php
		
				foreach ( get_category_list_array('event-categories') as $category){ ?>
                    <option <?php if(esc_attr($recent_event_category) == $category->term_id){echo 'selected';}?> value="<?php echo $category->term_id;?>" >
	                    <?php echo substr($category->name, 0, 20);	if ( strlen($category->name) > 20 ) echo "...";?>
                    </option>						
			<?php }?>
      </select>
  </label>
  </p>  
  <p>
  <label for="<?php echo $this->get_field_id('number_of_events'); ?>">
	  <?php _e('Number of events','crunchpress');?>
	<input class="title" size="5" id="<?php echo $this->get_field_id('number_of_events'); ?>" name="<?php echo $this->get_field_name('number_of_events'); ?>" type="text" value="<?php echo esc_attr($number_of_events); ?>" />
  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['recent_event_category'] = $new_instance['recent_event_category'];
		$instance['number_of_events'] = $new_instance['number_of_events'];
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$recent_event_category = isset( $instance['recent_event_category'] ) ? esc_attr( $instance['recent_event_category'] ) : '';		
		$number_of_events = isset( $instance['number_of_events'] ) ? esc_attr( $instance['number_of_events'] ) : '';		
		if(!isset($number_of_events)){$number_of_events = '-1';}
		echo $before_widget;	
		// WIDGET display CODE Start
		if (!empty($title))
			echo $before_title;
			echo $title;
			echo $after_title;
			?>
	<!-- Links Start -->          
		<div class="upcoming-events">
			<ul>
                <?php
				global $EM_Events,$bp;
				//Get the Set Array of Events those
				$EM_Events = EM_Events::get( array('category'=>$category_id, 'group'=>'this','scope'=>'future', 'limit' => $number_of_events, 'order' => 'DESC') );
				if($EM_Events <> ''){ 
				$counter_new = 0;
				foreach ( $EM_Events as $event ) {
				$post_id = $event->post_id;
				$counter_new++;
				if($counter_new % 2 == 0){ ?>
					<li>
						<div class="date-box">
							<a href="<?php echo get_permalink();?>">
							<?php
								$thumbnail_id = get_post_thumbnail_id( $event->post_id );
								$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(60,60) );
									if($thumbnail[1].'x'.$thumbnail[2] == '60x60'){
										echo get_the_post_thumbnail($event->post_id, array(60,60));		
									}
								?>
							</a>
							<span class="date"><?php echo date(get_option('date_format'),strtotime($event->event_start_date));?></span>
						</div>
						<div class="text-box"> 
							<strong class="title">
							<a href="<?php echo $event->guid;?>"><?php echo substr($event->post_title,0,15);?></a></strong>
							<a class="time" href="<?php echo $event->guid;?>"><i class="fa fa-clock-o"></i><?php echo strtotime($event->event_start_time)?></a>
							<a class="location" href="<?php echo $event->guid;?>"><i class="fa fa-map-marker"></i><?php echo $event->get_location()->name; ?></a>
						</div>
					</li>                      
			<?php }else{ ?>
					<li> 
						<div class="date-box">
							<a href="<?php echo get_permalink();?>">
								<?php
									$thumbnail_id = get_post_thumbnail_id( $event->post_id );
									$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(60,60) );
										if($thumbnail[1].'x'.$thumbnail[2] == '60x60'){
											echo get_the_post_thumbnail($event->post_id, array(60,60));		
									}
								?>
							</a>
							<span class="date"><?php echo date(get_option('date_format'),strtotime($event->event_start_date));?></span>
						</div>
						<div class="text-box">
							<strong class="title">
							<a href="<?php echo $event->guid;?>"><?php echo substr($event->post_title,0,15);?></a></strong>
							<a class="time" href="<?php echo $event->guid;?>"><i class="fa fa-clock-o"></i><?php echo strtotime($event->event_start_time)?></a>
							<a class="location" href="<?php echo $event->guid;?>"><i class="fa fa-map-marker"></i><?php echo $event->get_location()->name; ?></a>
						</div>
					</li>                      
			<?php }
				}?>
			<?php if($category_array <> ''){?><li class="btn_all_box"><a href="<?php echo get_term_link(intval($category_id),'event-categories');?>" class="c-link"><?php _e('View Events','crunchpress');?></a></li><?php }?>
			</ul>
		</div>
		<?php }else{ ?>
			<h4><?php _e('There is no Recent Post to Show','crunchpress');?></h4>
		 <?php
		}
		 
	wp_reset_query();
	echo $after_widget;
	}
		
}
add_action( 'widgets_init', create_function('', 'return register_widget("recent_event_widget");') );?>