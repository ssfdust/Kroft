<?php get_header(); ?>
					<div class="page-title"><h1>Regular page</h1> <span>Layout with a sidebar</span></div>
					
					<!-- side content -->
					<div id="side-content">
					<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('wp','page'); ?>
					<?php endwhile; ?>
						
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
