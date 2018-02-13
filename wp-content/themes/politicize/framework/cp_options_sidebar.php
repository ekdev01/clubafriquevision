<?php

	/*	
	*	CrunchPress Options File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the CrunchPress panel elements and create the 
	*	CrunchPress panel at the back-end of the framework
	*	---------------------------------------------------------------------
	*/
	
add_action('wp_ajax_sidebar_settings','sidebar_settings');
function sidebar_settings(){
	
	foreach ($_REQUEST as $keys=>$values) {
		$$keys = trim($values);
	}


				
	?>
	<div class="cp-wrapper bootstrap_admin cp-margin-left"> 

    <!--content area start -->	  
	<div class="hbg top_navigation row-fluid">
		<div class="cp-logo span2">
			<img src="<?php echo CP_PATH_URL;?>/framework/images/logo.png" class="logo" />
		</div>
		<div class="sidebar span10">
			<?php echo top_navigation_html_tooltip();?>
		</div>
	 <?php //echo top_navigation_html(); ?>
	</div>
	<div class="content-area-main row-fluid"> 
	
      <!--sidebar start -->
      <div class="sidebar-wraper span2">
        <div class="sidebar-sublinks">
     <ul id="wp_t_o_right_menu">
				<li id="active_tab" class="sidebar_settings"><?php _e('Add New Sidebar', 'crunchpress'); ?></li>
			</ul>
        </div>
      </div>
      <!--content start -->
      <div class="content-area span10">
	  <?php //echo top_navigation_html(); ?>
        <form id="options-panel-form" name="cp-panel-form">
          <div class="panel-elements" id="panel-elements">
            <div class="panel-element" id="panel-element-save-complete">
              <div class="panel-element-save-text">
                <?php _e('Save Options Complete', 'crunchpress'); ?>
                .</div>
              <div class="panel-element-save-arrow"></div>
            </div>
            <div class="panel-element">
			<?php
			$return_data = array('success'=>'-1', 'alert'=>'Save option failed, please try contacting your host provider to increase the post_max_size and suhosin.post.max_vars varialble on the server.');//Sidebar settings Saved				
			if(isset($action) AND $action == 'sidebar_settings'){
				$sidebar_xml = '<sidebar_settings>';
				if(isset($_POST['sidebar'])){
					$sidebars = $_POST['sidebar'];
					foreach($sidebars as $keys=>$values){
						$sidebar_xml = $sidebar_xml . create_xml_tag('sidebar_name',$values);
					}
				}
				$sidebar_xml = $sidebar_xml . '</sidebar_settings>';

				if(!save_option('sidebar_settings', get_option('sidebar_settings'), $sidebar_xml)){
				
					die( json_encode($return_data) );
					
				}
				
				die( json_encode( array('success'=>'0') ) );
				
			}
			//Sidebar values getting from database
			$cp_sidebar_settings = get_option('sidebar_settings');
			?>
			</div>
					<ul class="sidebar_settings">
						<li class="active_tab" id="sidebar_settings">
							<div class="row-fluid">
								<div class="panel-input span8">
									<div class="panel-title">
										<h3> <?php _e('Add Sidebar Name', 'crunchpress'); ?> </h3>
									</div>
									<input type="text" id="add-more-sidebar" value="type title here" rel="type title here">
									<div id="add-more-sidebar" class="add-more-sidebar"></div>
								</div>
								<div class="span4 right-box-sec"><p><?php _e('Add New Sidebars(Widget Areas) here you can manage them from Dashboard > Appearance > Widgets.','crunchpress');?></p></div>
								<div id="selected-sidebar" class="selected-sidebar first span12">
									<div class="default-sidebar-item" id="sidebar-item">
										<div class="panel-delete-sidebar"></div>
										<div class="slider-item-text"></div>
										<input type="hidden" id="sidebar">
									</div>
								<?php
								//Sidebar addition
								if($cp_sidebar_settings <> ''){
									$sidebars_xml = new DOMDocument();
									$sidebars_xml->loadXML($cp_sidebar_settings);
									foreach( $sidebars_xml->documentElement->childNodes as $sidebar_name ){?>
									<div class="sidebar-item" id="sidebar-item">
										<div class="panel-delete-sidebar"></div>
										<div class="slider-item-text"><?php echo $sidebar_name->nodeValue; ?></div>
										<input type="hidden" name="sidebar[]" id="sidebar" value="<?php echo $sidebar_name->nodeValue; ?>">
									</div>
								<?php }
								}
								?>
								</div>
							</div>
						</li>
					</ul>
            <div class="clear"></div>
            <div class="panel-element-tail">
              <div class="tail-save-changes">
                <div class="loading-save-changes"></div>
                <input type="submit" value="<?php echo __('Save Changes','crunchpress') ?>">
                <input type="hidden" name="action" value="sidebar_settings">
                <!--<input type="hidden" name="security" value="<?php //echo wp_create_nonce(plugin_basename(__FILE__))?>">--> 
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--content End --> 
    </div>
    <!--content area end --> 
  </div>
	<?php
}	
?>
