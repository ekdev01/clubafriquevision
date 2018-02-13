<?php
/**
 * Template Name: Full Width
 * Author: CrunchPress
 * Team: Crunchpress Team
 */

 
get_header ();
	$header_style = '';
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
	?>
	
	<section class="<?php echo $html_class_banner;?> <?php echo $html_class;?>"></section>
    	<?php echo page_slider();?>
    </section>
    <!--BANNER SECTION END-->	
	<!--CONTANT SECTION START-->
    <div class="contant">
            <!--BREADCRUMS END-->
            <!--MAIN CONTANT ARTICLE START-->
            <div class="main-content">
				<?php 
				while ( have_posts() ) { the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="container">
							<a href="<?php echo get_permalink();?>">
								<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );?>
							</a>			
						</div>
						<?php the_content();?>
					</article><!-- #post-## -->
					<div class="container">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>	
	
<div class="clear"></div>
<?php get_footer(); ?>