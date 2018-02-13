<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php bloginfo('name'); ?><?php wp_title( ' - ', true, 'left' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
		//Favicon
		$header_favicon = get_themeoption_value('header_favicon','general_settings');
		$header_fav_link = get_themeoption_value('header_fav_link','general_settings');
		if($header_favicon <> ''){ 
			echo '<link rel="shortcut icon" href="'.$header_fav_link.'" />';
		}
	
	wp_head(); ?>
</head>

<?php  // Box-Layout Code	
		$layout_class = ''; 
		$select_layout_cp = ''; 
		$select_layout_cp = get_themeoption_value('select_layout_cp','general_settings');
			if($select_layout_cp == 'boxed_layout'){
				$layout_class = 'boxed_v_cp';
			} 
?>

<body id="home" <?php body_class($layout_class); ?>>
<!--Wrapper Start-->
<div id="wrapper"> 
	<!--LOGIN BOX START-->
	<?php // CP_SIGN_UP();?>
	<!--LOGIN BOX END-->
	<!--SIGN UP BOX START-->
	<?php //CP_SIGN_IN();?>  
	<?php 
		//Print Header
		global $post, $post_id;
		if(is_search() || is_404()){
			$header_style = '';
		}else{
			$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
		}
		if(print_header_html_val($header_style) <> 'Style 6'){
			
			print_header_html($header_style);
		}
		
		
	?>
  