	        <?php get_header();?>	
			<?php if (have_posts()) :?>
					<div class="page-title"><h1><?php printf(__('Category Archives: %s'), single_cat_title('', false)); ?></h1></div>
			<?php if (category_description() ) :?>
					<span><?php echo category_description(); ?></span>
			<?php endif; ?>
					
					<!-- side content -->
					<div id="side-content">
					
						<!-- Blog loop -->
						<div class="blog-loop">
						<?php
						while ( have_posts() ) : the_post();
								get_template_part('content', get_post_format());
						endwhile;
						?>
						</div>

		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
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
