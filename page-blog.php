<?php
/*
Template Name: Blog
*/
?>
	        <?php get_header();
					remove_filter('get_the_excerpt', 'wp_trim_excerpt');
					add_filter ('get_the_excerpt','improved_trim_excerpt');
					?>	
					<div class="page-title"><h1>Our Blog</h1> <span>Share my memory and experience</span></div>
					<!-- side content -->
					<div id="side-content">
					
						<!-- Blog loop -->
						<div class="blog-loop">
							<?php $temp = $wp_query;
							$wp_query = null;
							$wp_query = new WP_Query();
							$wp_query->query('showposts=5'.'&paged='.$paged);
							?>
							<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post(); ?>
						<?php get_template_part('content', get_post_format()); ?>	
							<?php endwhile; ?>
							<?php else: ?>
								<p>没有新文章。</p>
					<?php endif; ?>
							<!-- pager -->	
							<ul class='pager'>
							<?php kroft_pager();?>
							</ul>
							<div class="clear"></div>
							<!-- ENDS pager -->
				
				
						</div>
						<!-- ENDS Blog loop -->
						
					</div>
					<!-- ENDS side content -->
					
					<?php get_sidebar(); ?>
					
					<div class="clear"></div>
	        	
	        	</div>
	        	<!-- ENDS Page wrap -->
	        	
	        </div>
	        <!-- ENDS content wrap -->
	        
        </div>
		<!-- ENDS Wrapper -->
	<?php get_footer(); ?>	
