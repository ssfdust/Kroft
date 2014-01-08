<?php
/*
Template Name: Gallery
*/

//Add excerpt length
function custom_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>

	        <?php get_header(); ?>	
					<div class="page-title"><h1>Our Gallery</h1> <span>Share my memory and experience</span></div>
					
					<!-- side content -->
					<div id="gallery-holder">
					
						<!-- filter -->
						<ul id="portfolio-filter" class="gallery-filter">
				    		<li>Filter: </li>
				    		<li><a href="#" rel="all" > ALL  </a></li>
								<?php get_kroft_filter(); ?>
				    		
				    		<li class="layout-notext"></li>
				    		<li class="layout-text active"></li>
				    		<li class="layout-label">Layout: </li>
				    	</ul>
				    	<div class="clear"></div>
						<!-- filter -->
						
						<!-- Thumbnails -->
						<ul id="portfolio-list" class="gallery-thumbs" >
							<?php 
							$qu_args = array('post_type' => 'gallery');  
							$loop = new WP_Query($qu_args);
							?>
							<?php if ($loop->have_posts()) : while ($loop->have_posts()):$loop->the_post(); ?>
							<?php if ( has_post_thumbnail() ) : ?>
							<?php 
									$cat = get_gallery_terms($post->ID);
									?>
										<li class="<?php echo "$cat";?>">
									<?php	update_option('thumbnail_size_w', 285);
												update_option('thumbnail_size_h', 200);
										?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="prettyPhoto[group]" target="_blank" class="plusbg" ><?php the_post_thumbnail(array(285,200)); ?></a>
									
								<div class="thumb-description">
									<span class="thumb-title"><?php the_title(); ?></span>
									<?php the_excerpt(); ?>
								</div>
							</li>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
						</ul>
						<div class="clear"></div>	
			            <!-- ENDS Thumbnails -->
						
					</div>
					<!-- ENDS side content -->
					
					
					<div class="clear"></div>
	        	
	        	</div>
	        	<!-- ENDS Page wrap -->
	        	
	        </div>
	        <!-- ENDS content wrap -->
	        
        </div>
		<!-- ENDS Wrapper -->
	<?php get_footer(); ?>	
