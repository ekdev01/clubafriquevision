<?php
//Condition for Parent Class
if(class_exists('function_library')){
	
	class cp_portfolio_class extends function_library{
		public $portfolio_array = array(
		
			'image_icon' =>array(

				'type'=> 'image',
				
				'name'=> 'aa',

				'hr'=> 'none',

				'description'=> "icon-group"),
			
			"top-bar-div4431-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div4431'),	

			'header'=>array(

				'title'=> 'PORTFOLIO HEADER TITLE',

				'name'=> 'page-option-item-port-header-title',

				'type'=> 'inputtext'),
				
			'category'=>array(

				'title'=>'CHOOSE CATEGORY',

				'name'=>'page-option-category-port',

				'options'=>array(),

				'type'=>'combobox_category',

				'hr'=> 'none',

				'description'=>'Choose the Portfolio category you want to fetch the Projects.'),		
			
			'num_excerpt'=>array(

				'title'=>'NUMBER OF EXCERPT',

				'name'=>'page-option-item-port-excerpt',

				'type'=> 'inputtext',

				'default'=> 200,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),
				
			"top-bar-div331-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div331'),		
			
			"top-bar-div341-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div341'),	
			
			'pagination'=>array(

				'title'=>'ENABLE PAGINATION',

				'name'=>'page-option-item-port-pagination',

				'type'=> 'combobox',

				'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

				'hr'=> 'none',

				'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),

			'num-fetch'=>array(					

				'title'=> 'NUM OF TESTIMONIALS',

				'name'=> 'page-option-item-port-num-fetch',

				'type'=> 'inputtext',
				
				'class'=>'portfolio-fetch-item',

				'default'=> 9,

				'description'=>'Set the number of projects to display on one page.'),
				
			"top-bar-div341-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div341'),			


		);		
		
		public $port_size_array =  array('element1-1'=>'1/1');		

	
		
		public function page_builder_size_class(){
			global $div_size;
			$div_size['Portfolio'] = $this->port_size_array;	  
		}
		
		public function page_builder_element_class(){
		global $page_meta_boxes;
			$page_meta_boxes['Page Item']['name']['Portfolio'] = $this->portfolio_array;			
			$page_meta_boxes['Page Item']['name']['Portfolio']['category']['options'] = function_library::get_category_list_array( 'portfolio-category' );			
		}
		
		public function __construct(){
			add_action( 'init', array( $this, 'create_port' ) );
			add_action( 'add_meta_boxes', array( $this, 'add_port_option' ) );	
			add_action( 'save_post', array( $this, 'save_portfolio_option_meta' ) );		
		}
		
		
		public function create_port() {
			//$portfolio_translation = get_option(THEME_NAME_S.'_cp_portfolio_slug','portfolio');
			
			$labels = array(
				'name' => _x('Portfolio', 'Portfolio General Name', 'crunchpress'),
				'singular_name' => _x('Portfolio', 'Event Singular Name', 'crunchpress'),
				'add_new' => _x('Add New', 'Add New Portfolio Name', 'crunchpress'),
				'add_new_item' => __('Add New Portfolio', 'crunchpress'),
				'edit_item' => __('Edit Portfolio', 'crunchpress'),
				'new_item' => __('New Portfolio', 'crunchpress'),
				'view_item' => __('View Portfolio', 'crunchpress'),
				'search_items' => __('Search Portfolio', 'crunchpress'),
				'not_found' =>  __('Nothing found', 'crunchpress'),
				'not_found_in_trash' => __('Nothing found in Trash', 'crunchpress'),
				'parent_item_colon' => ''
			);
			
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon' => 'dashicons-video-alt',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 100,
				'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			register_post_type( 'portfolio' , $args);	

			register_taxonomy(
				"portfolio-category", array("portfolio"), array(
					"hierarchical" => true,
					"label" => "Portfolio Categories", 
					"singular_label" => "Portfolio Categories", 
					"rewrite" => true));
			register_taxonomy_for_object_type('portfolio-category', 'portfolio');		

			register_taxonomy(
				"portfolio-tag", array("portfolio"), array(
					"hierarchical" => false, 
					"label" => "Portfolio Tag", 
					"singular_label" => "Portfolio Tag", 
					"rewrite" => true));
			register_taxonomy_for_object_type('portfolio-tag', 'portfolio');			
		}
		
		
	
	public function add_port_option(){	
	
		add_meta_box('project-option', __('Project Options','crunchpress'),array($this,'add_port_option_element'),
			'portfolio', 'normal', 'high');
			
	}
	
	public function add_port_option_element(){
		$career_detail_xml = '';
		$career_social = '';
		$sidebar_event = '';
		$right_sidebar_event = '';
		$left_sidebar_event = '';
		$career_city = '';
		$career_salary = '';
		$career_country = '';
		$career_apply = '';
		$date_posted = '';
		$jobs_post_name = '';
		$jobs_post_title = '';
	
	
	
	foreach($_REQUEST as $keys=>$values){
		$$keys = $values;
	}
	global $post,$countries;
	
	
	$sidebars_port = '';
	$right_sidebar_port = '';
	$left_sidebar_port = '';
	$jobs_post_name = get_post_meta($post->ID, 'jobs_post_name', true);
	$jobs_post_title = get_post_meta($post->ID, 'jobs_post_title', true);	
	
	$port_detail_xml = get_post_meta($post->ID, 'port_detail_xml', true);
	if($port_detail_xml <> ''){
		$cp_team_xml = new DOMDocument ();
		$cp_team_xml->loadXML ( $port_detail_xml );
		$sidebars_port = function_library::find_xml_value($cp_team_xml->documentElement,'sidebars_port');
		$right_sidebar_port = function_library::find_xml_value($cp_team_xml->documentElement,'right_sidebar_port');
		$left_sidebar_port = function_library::find_xml_value($cp_team_xml->documentElement,'left_sidebar_port');			
	}
	
	?>
		<div class="event_options">
            <div class="op-gap">
				<?php 
			//Condition for Library
			if(class_exists('function_library')){
			$function_library = new function_library();
				echo $function_library->show_sidebar($sidebars_port,'right_sidebar_port','left_sidebar_port',$right_sidebar_port,$left_sidebar_port);
			}
			?>
			</div>
			<div style="float:left;" class="op-gap add-music">
				<!--my start -->
				<ul class="recipe_class row-fluid cp_bg_image">
					<li class="panel-title time-start span3">
						<h4><i class="fa fa-music"></i> <?php _e('Field Name', 'crunchpress'); ?></h4>
						<input type="text" class="" id="add-track-name" value="Add Field Name" rel="Add Field Name">
					</li>

					<li class="panel-title border_left time_end span3">
						<h4><i class="fa fa-link"></i> <?php _e('Field Data', 'crunchpress'); ?></h4>
						<!--<input type="text" class="" id="add-track-title" value="Add Track URL" rel="Add Track URL">-->
						<input id="upload_image_text" name="add-track-title" class="clearme" rel="Add Field Data" type="text" value="Add Field Data" />							
					</li>
					
					<li class="panel-title border_left delete_btn span1">
						<h4><i class="fa fa-minus"></i> / <i class="fa fa-plus"></i> <?php _e('', 'crunchpress'); ?></h4>
						<div id="add-more-tracks" class="add-track-element"></div>
					</li>
				</ul>	
				<div class="clear"></div>
				<ul id="selected-element" class="selected-element nut_table_inner">
					<li class="default-element-item" id="element-item">
						<ul class="career_salary_class recipe_class row-fluid">
							<li class="panel-title span3">
								<input class="element-track-name" type="text" id="add-track-name" value="Add Field Name" rel="Add Field Name">
								<!--<span class="ingre-item-text"></span>-->
							</li>	
							<li class="panel-title border_left span3">
								<input id="upload_image_text" class="element-track-title" type="text" value="Add Field Data" rel="Add Field Data" />									
								<!--<input class="element-track-title" type="text" id="add-track-title" value="Add Track URL" rel="Add Track URL">-->
								<!--<span class="ingre-item-text"></span>-->
							</li>								
							<li class="panel-title border_left span1"><span class="panel-delete-element"></span></li>
						</ul>
					</li>
					
				<?php
					//Fetching All Tracks from Database
					$track_name_xml = get_post_meta($post->ID, 'add_project_xml', true);
					$track_url_xml = get_post_meta($post->ID, 'add_project_field_xml', true);
					
					//Empty Variables
					//$album_download = '';
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
				
					
					//Combine Loop
					if($track_name_xml <> '' || $track_url_xml <> ''){
						$counter = 0;
						$nofields = $ingre_xml->documentElement->childNodes->length;
						for($i=0;$i<$nofields;$i++) { 
							$counter++;?>
							<li class="" style="display: block;">
								<ul class="career_salary_class recipe_class row-fluid">
									<li class="panel-title span3">
										<input class="" type="text" name="add-track-name[]" value="<?php echo $children_name->item($i)->nodeValue;?>">
									</li>	
									<li class="panel-title border_left span3">
										<input id="upload_image_text" class="element-track-title" type="text" name="add-track-title[]" value="<?php echo $children_title->item($i)->nodeValue;?>" />											
									</li>
									<li class="panel-title span1 border_left"><span class="panel-delete-element"></span></li>
								</ul>
							</li>
							<?php
						}
					} ?>
				</ul>
			</div>
			<input type="hidden" name="port_submit" value="portfolio"/>
			<div class="clear"></div>
		</div>	
	<div class="clear"></div>
		
	<?php }
	
	public function save_portfolio_option_meta($post_id){
		
		$career_detail_xml = '';
		$career_social = '';
		$sidebars = '';
		$right_sidebar_port = '';
		$left_sidebar_port = '';
		$date_posted = '';
		$career_city = '';
		$career_country = '';
		$career_apply = '';
		
		foreach($_REQUEST as $keys=>$values){
			$$keys = $values;
		}
	
		if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
	
			if(isset($port_submit) AND $port_submit == 'portfolio'){
			
			$new_data = '<portfolio_detail>';
			$new_data = $new_data . function_library::create_xml_tag('sidebars_port',$sidebars);
			$new_data = $new_data . function_library::create_xml_tag('right_sidebar_port',$right_sidebar_port);
			$new_data = $new_data . function_library::create_xml_tag('left_sidebar_port',$left_sidebar_port);
			$new_data = $new_data . '</portfolio_detail>';
			//Saving Sidebar and Social Sharing Settings as XML
			$old_data = get_post_meta($post_id, 'port_detail_xml',true);
			function_library::save_meta_data($post_id, $new_data, $old_data, 'port_detail_xml');
				
			//Track Name
			$add_project_xml = '<add_project_xml>';
			if(isset($_POST['add-track-name'])){
				$track_name_item = $_POST['add-track-name'];
				if(isset($track_name_item)){
					foreach($track_name_item as $keys=>$values){
						$add_project_xml = $add_project_xml . function_library::create_xml_tag('add_project_xml',$values);
					}
				}
			}else{$add_project_xml = '<add_project_xml>';}
			$add_project_xml = $add_project_xml . '</add_project_xml>';
		
			//Save Post
			$old_data = get_post_meta($post_id, 'add_project_xml',true);
			function_library::save_meta_data($post_id, $add_project_xml, $old_data, 'add_project_xml');
			
			
			//Track URL
			$track_url_item = array();
			$add_project_field_xml = '<add_project_field_xml>';
			if(isset($_POST['add-track-title'])){
				$track_url_item = $_POST['add-track-title'];
				if(is_array($track_url_item)){
					foreach($track_url_item as $keys=>$values){
						$add_project_field_xml = $add_project_field_xml . function_library::create_xml_tag('add_project_field_xml',$values);
					}
				}
			}else{$add_project_field_xml = '<add_project_field_xml>';}
			$add_project_field_xml = $add_project_field_xml . '</add_project_field_xml>';
		
			//Save Post
			$old_data = get_post_meta($post_id, 'add_project_field_xml',true);
			function_library::save_meta_data($post_id, $add_project_field_xml, $old_data, 'add_project_field_xml');
			
			}
	}
		
		
		
		// Print Testimonial item
		function print_port_item($item_xml){

			wp_reset_query();
			global $paged,$sidebar,$team_div_size_num_class,$post,$counter;
			
			if(empty($paged)){
				$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			}
				
			$category = find_xml_value($item_xml, 'category');
			// get the blog meta value		
			$header = find_xml_value($item_xml, 'header');
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
			$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
			if(empty($num_excerpt)){$num_excerpt = '200';}
			
			if(!empty($header)){
				echo '<h2 class="heading">' . $header . '</h2>';
			}
			echo '
                <div class="portfolio-list">
                	<ul class="row-fluid">';
				
			
			if($category == '0'){
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'			=> $paged,
						'post_type'   	=> 'portfolio',
						'post_status'	=> 'publish',
						'order'			=> 'DESC',
					));
				}else{
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'	=> $paged,
						'post_type'   => 'portfolio',
						'tax_query' => array(
								array(
									'taxonomy' => 'portfolio-category',
									'field' => 'term_id',
									'terms' => $category
								)
						),
						'post_status'      => 'publish',
						'order'						=> 'DESC',
					));
				}
			$counter_team = 0; 
			while( have_posts() ){
				the_post();
			//Fetching All Tracks from Database
			$track_name_xml = get_post_meta($post->ID, 'add_project_xml', true);
			$track_url_xml = get_post_meta($post->ID, 'add_project_field_xml', true);
			
			//Empty Variables
			//$album_download = '';
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
			$port_class = '';
			if($counter_team % 4 == 0){$port_class= 'first';}else{$post_class = 'no-class';}$counter_team++; ?>
				<!--LIST ITEM START-->
				<li class="span3 <?php echo $port_class;?>">
					<div class="portfolio-wrapper">
						<div class="thumb">
							<?php echo get_the_post_thumbnail($post->ID, array(614,614));?>
							<div class="caption">
								<h5><?php echo get_the_title();?></h5>
								<p><?php 
									$variable_category = wp_get_post_terms( $post->ID, 'portfolio-category');
									$counterr = 0;
									foreach($variable_category as $values){														
										$counterr++;
										echo '<a class="portfolio-tag" href="'.get_term_link(intval($values->term_id),'portfolio-category').'">'.$values->name.'</a>  ';}
									?>
								</p>
								<div class="cp-rating">
									<?php
										if(function_exists('taqyeem_get_score')) {
											taqyeem_get_score(  $post->ID ); 
										}
									?>
								</div>
								<p><?php echo substr(get_the_content(),0,200);?></p>
							</div>
						</div>
						<div class="text">
							<?php
							//Combine Loop
							if($track_name_xml <> '' || $track_url_xml <> ''){
								$counter = 0;
								$nofields = $ingre_xml->documentElement->childNodes->length;
								if($nofields <> 0){
									for($i=0;$i<1;$i++) { 
										$counter++;
										if(isset($track_name_xml)){
											echo '<h5>'.$children_name->item($i)->nodeValue.'</h5>';
										}
										if(isset($track_url_xml)){
											echo '<p>'.$children_title->item($i)->nodeValue.'</p>';
										}
									}
								}else{
									echo '<h5>Type</h5>';
									echo '<p>No Type Found</p>';
								}
							}		
							?>
							<a href="<?php echo get_permalink();?>" class="view-project"><?php _e('View Project','crunchpress');?></a>
						</div>
					</div>
				</li>
				<!--LIST ITEM START-->
			<?php
			}
				echo '      </ul>
                </div>';	
			
		}// End Team Function for Frontend	
		
	}
}	