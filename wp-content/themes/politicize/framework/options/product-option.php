<?php

	/*	
	*	Crunchpress Portfolio Option File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Crunchpress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) Crunchpress
	*	---------------------------------------------------------------------
	*	This file create and contains the portfolio post_type meta elements
	*	---------------------------------------------------------------------
	*/
	
	//FRONT END RECIPE LAYOUT
	$wooproduct_class = array("Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,350), "size2"=>array(614,614), "size3"=>array(350,350)));

	
	// Print Recipe item
	function print_wooproduct_item($item_xml){
		global $paged,$sidebar,$wooproduct_class,$post,$wp_query,$counter;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		$sidebar_class = '';
		$layout_set_ajax = '';
		$item_type = 'Full-Image';
		// get the item class and size from array
		$item_class = $wooproduct_class[$item_type]['class'];
		$item_index = $wooproduct_class[$item_type]['index'];
		$full_content = find_xml_value($item_xml, 'show-full-news-post');
		if( $sidebar == "no-sidebar" ){
			$item_size = $wooproduct_class[$item_type]['size'];
			$sidebar_class = 'no_sidebar';
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$sidebar_class = 'one_sidebar';
			$item_size = $wooproduct_class[$item_type]['size2'];
		}else{
			$sidebar_class = 'two_sidebar';
			$item_size = $wooproduct_class[$item_type]['size3'];
		}
		
				
	// get the product meta value
	$header = find_xml_value($item_xml, 'header');
	$category = find_xml_value($item_xml, 'category');
	$num_fetch = find_xml_value($item_xml, 'num-fetch');
	$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
	$column_size = find_xml_value($item_xml, 'column-select');
	
	
	
	$select_layout_cp = '';
	$rating_class= '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		
	}
	
	$show_filterable = find_xml_value($item_xml, 'filterable');
	$layout_select = find_xml_value($item_xml, 'layout_select');
	$pagination = find_xml_value($item_xml, 'pagination');
	$layout_class = strtolower(str_replace(' ','-',$layout_select));	
	$size = 3;
	if($show_filterable == 'Yes'){
		if($column_size == '3'){
			$column_size = 'column-4';
		}else{
			if($layout_select == 'Modern Grid Diagonal'){
				$column_size = 'column-4';
			}else{
				$column_size = 'column-3';
			}
		}
	}else{
		if($column_size == '3'){
			$column_size = 'span4';
			$size = 3;
		}else{
			if($layout_select == 'Modern Grid Diagonal'){
				$column_size = 'span4';
				$size = 3;
			}else{
				$column_size = 'span3';
				$size = 4;
			}
		}
	}	
	//Theme Default Pagination
	if(find_xml_value($item_xml, "pagination") == 'Wp-Default'){
		$num_fetch = get_option('posts_per_page');
	}else if(find_xml_value($item_xml, "pagination") == 'Theme-Custom'){
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
	}else{}
	$function_library = new function_library;
	if(class_exists("Woocommerce")){
		
	$quan = array();
	$quantity = '';
	$total = '';
	$currency = '';
	if($show_filterable == 'Yes' AND $layout_select != 'Modern Grid Diagonal'){		
		query_posts(
			array( 
			'post_type' => 'product',
			'posts_per_page'			=> -1,
			'orderby' => 'title',
			'order' => 'ASC' )
		);		
		$counter_portfolio = 0; ?>
		<script type="text/javascript">
			jQuery(window).load(function() {
				var filter_container = jQuery('#portfolio-item-holder-<?php echo esc_attr($counter)?>');

				filter_container.children().css('position','absolute');	
				filter_container.masonry({
					singleMode: true,
					itemSelector: '.portfolio-item:not(.hide)',
					animate: true,
					animationOptions:{ duration: 800, queue: false }
				});	
				jQuery(window).resize(function(){									
						var temp_width =  filter_container.children().filter(':first').width() + 30;
						filter_container.masonry({
							columnWidth: temp_width,
							singleMode: true,
							itemSelector: '.portfolio-item:not(.hide)',
							animate: true,
							animationOptions:{ duration: 800, queue: false }
						});					
				});	
				jQuery('ul#portfolio-item-filter-<?php echo esc_attr($counter)?> a').click(function(e){	

					jQuery(this).addClass("active");
					jQuery(this).parents("li").siblings().children("a").removeClass("active");
					e.preventDefault();
					
					var select_filter = jQuery(this).attr('data-value');
					
					if( select_filter == "All" || jQuery(this).parent().index() == 0 ){		
						filter_container.children().each(function(){
							if( jQuery(this).hasClass('hide') ){
								jQuery(this).removeClass('hide');
								jQuery(this).fadeIn();
							}
						});
					}else{
						filter_container.children().not('.' + select_filter).each(function(){
							if( !jQuery(this).hasClass('hide') ){
								jQuery(this).addClass('hide');
								jQuery(this).fadeOut();
							}
						});
						filter_container.children('.' + select_filter).each(function(){
							if( jQuery(this).hasClass('hide') ){
								jQuery(this).removeClass('hide');
								jQuery(this).fadeIn();
							}
						});
					}
					
					filter_container.masonry();	
					
				});
			});
		</script>
		<figure class="page_title">
			<?php if($header <> ''){ ?>
				<div class="first">
					<h2><?php echo esc_attr($header);?></h2>
				</div>
			<?php } ?>			
		</figure>	
		<div class="title_right">
			<div id="cart_dropdown" class="dropdown">
				<ul id="portfolio-item-filter-<?php echo esc_attr($counter)?>" class="category_list_filterable">
					<li><a data-value="all" class="gdl-button active" href="#"><?php esc_html_e('All','crunchpress');?></a></li>
					<?php
					$categories = get_categories( array('child_of' => $category, 'taxonomy' => 'product_cat', 'hide_empty' => 0) );
					if($categories <> ""){
						foreach($categories as $values){?>
						<li><a data-value="<?php echo esc_attr($values->term_id);?>" class="gdl-button" href="#"><?php echo esc_attr($values->name);?></a></li>                                
					<?php
						}
					}?>                            						
				</ul>
			</div>
		</div>		
		<section class="product_view filterable-grid-style <?php echo esc_attr($layout_class);?>" id="product_grid">  
			<div id="portfolio-item-holder-<?php echo esc_attr($counter)?>" class="product_image_holder grid-style">
				<?php
				$permalink_structure = get_option('permalink_structure');
				if($permalink_structure <> ''){
					$permalink_structure = '?';
				}else{
					$permalink_structure = '&';
				}
				$counter_product = 0;
				while( have_posts() ){
					the_post();	
					global $post,$post_id,$product,$product_url;
					$regular_price = get_post_meta($post->ID, '_regular_price', true);
					if($regular_price == ''){
						$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
					}
					$sale_price = get_post_meta($post->ID, '_sale_price', true);
					if($sale_price == ''){
						$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
					}
					$sku_num = get_post_meta($post->ID, '_sku', true);
					$currency = get_woocommerce_currency_symbol(); ?>						
						<!--PRODUCT LIST ITEM START-->
						<div id="product-<?php echo esc_attr($post->ID);?>" class="product-box all portfolio-item item alpha <?php //echo esc_attr($column_size);?> <?php $categories = get_the_terms( $post->ID, 'product_cat' );
							if($categories <> ''){
								foreach ( $categories as $category ) {
									echo esc_attr($category->term_id)." ";
								}
							}?>">
							<?php 
							if($layout_select == 'Modern Grid Diagonal'){ $span_col = 'span4'; }else{ $span_col = 'span3';}
							cp_selected_grid($layout_select,$product,$post);?>
						</div>
						<!--PRODUCT LIST ITEM END-->
						<?php
						$counter_product++;
				}//End While
			?>
			</div>	
		</section>
		<?php }else{
			if($category == '0'){
				query_posts(
					array( 
					'post_type' => 'product',
					'posts_per_page'			=> $num_fetch,
					'orderby' => 'title',
					'order' => 'ASC' )
				);
			}else{
				query_posts(
					array( 
					'post_type' => 'product',
					'posts_per_page'			=> $num_fetch,
					'paged'						=> $paged,
					//'ignore_sticky_posts' => true,
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'terms' => $category,
							'field' => 'term_id',
						)
					),
					'orderby' => 'title',
					'order' => 'ASC' )
				);
			} ?>
			
			<?php if ($layout_select == 'Modern Grid Diagonal'){
					
					$rating_class = 'rating_container_diagonal';
			}else {
				
				$rating_class = 'rating_container';
			} ?>
			<div class="cp_woo_grid <?php echo $rating_class;?> <?php echo esc_attr($layout_class);?>">
				<div class = "container">
					<div class="row-fluid">
					<?php
					$counter_item = 0;
					while( have_posts() ){
					the_post();	
					global $post,$post_id,$product,$product_url;
					$regular_price = get_post_meta($post->ID, '_regular_price', true);
					if($regular_price == ''){
						$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
					}
					$sale_price = get_post_meta($post->ID, '_sale_price', true);
					if($sale_price == ''){
						$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
					}
					$sku_num = get_post_meta($post->ID, '_sku', true);
					$currency = get_woocommerce_currency_symbol(); 	
						$item_class_first = '';
						if($counter_item % $size == 0){
							$item_class_first = 'first';
						}else{
							$item_class_first = '';
						}
						if($layout_select == 'Modern Grid Diagonal'){ $span_col = 'span4'; }else{ $span_col = 'span3';}
						//if ($layout_select == 'Normal Grid') { $column_size = $column_size . ' span6' ; }
						?>
						<div class="<?php echo esc_attr($item_class_first).' '.esc_attr($column_size);?> product-box">
							<?php cp_selected_grid($layout_select,$product,$post);?>
						</div>
					<?php 
					$counter_item++;
					}?>	
					</div>
				</div>
			</div>	
			<div class="clear"></div>
			<?php
			if( find_xml_value($item_xml, "pagination") == "Theme-Custom"){	
				pagination();
			}
		}
		
	}		
}	


	function get_cart() {
		return array_filter( (array) $this->cart_contents );
	}
	
	function get_remove_url( $cart_item_key ) {
		global $woocommerce;
		$cart_page_id = woocommerce_get_page_id('cart');
		if ($cart_page_id)
			return apply_filters( 'woocommerce_get_remove_url', wp_nonce_url( 'cart', add_query_arg( 'remove_item', $cart_item_key, get_permalink($cart_page_id) ) ) );
	}
	
	//$WC_Product =  new WC_Product;
	//global $post_id;
	
	function cp_normal_grid($product='',$post=''){
		$permalink_structure = get_option('permalink_structure');
		if($permalink_structure <> ''){
			$permalink_structure = '?';
		}else{
			$permalink_structure = '&';
		}
		$regular_price = get_post_meta($post->ID, '_regular_price', true);
		if($regular_price == ''){
			$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
		}
		$sale_price = get_post_meta($post->ID, '_sale_price', true);
		$sku_num = get_post_meta($post->ID, '_sku', true);
		
		if($sale_price == ''){
			$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
		}
		$currency = get_woocommerce_currency_symbol();
		//print_r($woocommerce);
		
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(350,350));
		$image_thumb = wp_get_attachment_image_src($thumbnail_id, 'full');
	?>
		<!--PRODUCT LIST ITEM START-->
		<ul class="pro-box">
			<li class="pro">
				<div class="block-image"><?php echo get_the_post_thumbnail($post->ID, array(350,350));?>
					<div class="img-overlay-3-up pat-override"></div>
					<div class="img-overlay-3-down pat-override"></div>
					<ol class="static-style">
						<li class="white-rounded"><a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-link"></i></a> </li>
						<li class="white-rounded"><a data-gal="prettyPhoto[gallery1]" href="<?php echo esc_attr($image_thumb[0]); ?>"><i class="fa fa-plus"></i></a> </li>
					</ol>
				</div>
				<?php
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="cart button %s product_type_%s">Add To Cart</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					),
				$product );
				?>
			</li>
			<li>
				<h4><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h4>
			</li>
			<li><?php echo strip_tags(mb_substr(get_the_content(),0,75));?></li>
			<li class="pro-footer"><span class="price"><?php echo $currency;?><?php if($sale_price <> ''){echo esc_attr($sale_price);}else{echo esc_attr($regular_price);}?></span>
				<div class="rating">
					<?php if ( $rating_html = $product->get_rating_html() ) : ?>
						<?php echo $rating_html; ?>
					<?php endif; ?>
				</div>
			</li>
		</ul>	
		<!--PRODUCT LIST ITEM START-->
<?php }

	function cp_normal_grid_loop(){ ?>
		<!--Grid View Start-->
		<section class="product_view" id="product_grid">  
			<div class="row grid-list-view product_image_holder grid-style">
				<?php
				$counter_product = 0;
				while( have_posts() ){
					the_post();	
					global $post,$post_id,$product,$product_url,$woocommerce;
					$permalink_structure = get_option('permalink_structure');
					if($permalink_structure <> ''){
						$permalink_structure = '?';
					}else{
						$permalink_structure = '&';
					}
					$regular_price = get_post_meta($post->ID, '_regular_price', true);
					if($regular_price == ''){
						$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
					}
					$sale_price = get_post_meta($post->ID, '_sale_price', true);
					$sku_num = get_post_meta($post->ID, '_sku', true);
					
					if($sale_price == ''){
						$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
					}
					$currency = get_woocommerce_currency_symbol();
					//print_r($woocommerce);
					
					$thumbnail_id = get_post_thumbnail_id( $post->ID );
					$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(350,350));
					$image_thumb = wp_get_attachment_image_src($thumbnail_id, 'full');
					if($counter_product % 4 == 0){ echo '<div class="clear clearfix"></div>';}else{}$counter_product++;
					echo '<div class="span3">';
						cp_normal_grid($product,$post);
					echo '</div>';
				}//End While ?>
			</div>	
		</section>
	<?php 
	}
	
	//Fetch the Grid Selected by User
	function cp_selected_grid($grid_layout='',$product='',$post=''){
		//'options'=>array('0'=>'Simple Grid','1'=>'Normal Grid','2'=>'Modern Grid','3'=>'Modern Grid Diagonal'),
		if($grid_layout == 'Simple Grid'){
			cp_simple_grid($product,$post);		
		}else if($grid_layout == 'Normal Grid'){
			cp_normal_grid($product,$post);		
		}else if($grid_layout == 'Modern Grid'){
			cp_modern_grid_square($product,$post);
		}else{
			cp_modern_grid_diagonal($product,$post);
		}
	}
	
	//print Modern Grid Diagonal
	function cp_modern_grid_diagonal($product='',$post=''){
		$regular_price = get_post_meta($post->ID, '_regular_price', true);
		if($regular_price == ''){
			$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
		}
		$sale_price = get_post_meta($post->ID, '_sale_price', true);
		if($sale_price == ''){
			$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
		}
		$sku_num = get_post_meta($post->ID, '_sku', true);
		$currency = get_woocommerce_currency_symbol();
	?>
		<div class="fitem">
			<div class="cart">
				<?php
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="cart button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					),
				$product );
				?>
			</div>
			<div class="thumb">
				<div class="frame">
					<span class="frame-hover"><a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-link"></i></a></span>
						<div class="frame-caption">
							<h3><?php echo esc_html(get_the_title());?></h3>
							<div class="woocommerce">
								<?php if ( $rating_html = $product->get_rating_html() ) : ?>
									<?php echo $rating_html; ?>
								<?php endif; ?>
							</div>
							<strong class="price"><?php echo esc_attr($currency);?><?php if($sale_price <> ''){echo esc_attr($sale_price);}else{echo esc_attr($regular_price);}?></strong> 
						</div>
					<?php echo get_the_post_thumbnail($post->ID, array(450,450));?>
				</div>
			</div>
			<div class="like"><a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-file-text-o"></i></a></div>
		</div>
	<?php
	}
	
	function cp_modern_grid_square($product='',$post=''){
		$regular_price = get_post_meta($post->ID, '_regular_price', true);
		if($regular_price == ''){
			$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
		}
		$sale_price = get_post_meta($post->ID, '_sale_price', true);
		if($sale_price == ''){
			$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
		}
		$sku_num = get_post_meta($post->ID, '_sku', true);
		$currency = get_woocommerce_currency_symbol();
	?>
	
		<div class="pro-box">
			<div class="thumb">
				<div class="thumb-hover"> 
					<span class="cart">						
						<?php
						echo apply_filters( 'woocommerce_loop_add_to_cart_link',
							sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="cart button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type ),
								esc_html( $product->add_to_cart_text() )
							),
						$product );
						?>
					</span>
					<span class="like"><a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-file-text-o"></i></a></span> 
				</div>				
				<?php if ( $product->is_on_sale() ) : ?>
				<div class="sale">
					<?php echo apply_filters( 'woocommerce_sale_flash', '<span>' . __( 'On Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
				</div>
				<?php endif; ?>
				<?php echo get_the_post_thumbnail($post->ID, array(260,300));?>
			</div>
			<div class="pro-content">
				<div class="rate"><?php echo $currency;?><?php if($sale_price <> ''){echo esc_attr($sale_price);}else{echo esc_attr($regular_price);}?></div>
				<h3><?php echo get_the_title();?></h3>
				<div class="woocommerce">
					<?php if ( $rating_html = $product->get_rating_html() ) : ?>
						<?php echo $rating_html; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
	
	//Print Simple WooCommerce Product Grid
	function cp_simple_grid($product='',$post=''){
		$regular_price = get_post_meta($post->ID, '_regular_price', true);
		if($regular_price == ''){
			$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
		}
		$sale_price = get_post_meta($post->ID, '_sale_price', true);
		if($sale_price == ''){
			$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
		}
		$sku_num = get_post_meta($post->ID, '_sku', true);
		$currency = get_woocommerce_currency_symbol(); ?>
		<div class="frame"> <a href="<?php echo esc_url(get_permalink());?>"><?php echo get_the_post_thumbnail($post->ID, array(350,350));?></a>
			<div class="caption">
				<?php
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="cart button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					),
				$product );
				?>
				<div class="woocommerce">
					<?php if ( $rating_html = $product->get_rating_html() ) : ?>
						<?php echo $rating_html; ?>
					<?php endif; ?>
					<a href="<?php echo esc_url(get_permalink());?>" class="like"><i class="fa fa-file-text-o"></i></a>
				</div>
			</div>
		</div>
		<div class="bottom">
			<strong class="title"><?php echo esc_html(get_the_title());?></strong>
			<p><?php echo substr(get_the_content(),0,100);?></p>
			<strong class="price"><?php echo esc_attr($currency);?><?php if($sale_price <> ''){echo esc_attr($sale_price);}else{echo esc_attr($regular_price);}?></strong>
		</div>
	<?php 
	}