	        <?php get_header(); ?>	
					<div class="page-title"><h1>Our Blog</h1> <span>Share my memory and experience</span></div>
					
					<!-- side content -->
					<div id="side-content">
						<!-- single -->
						<div class="single-post">
					
					<?php if (have_posts()) :the_post();  ?>
						<?php get_template_part("content",get_post_format()); ?>
					<?php comments_template(); ?>						
					<?php endif;?>
						
							</div>
								
						</div>	
						<!-- ENDS single -->
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
		<?php get_footer();?>

