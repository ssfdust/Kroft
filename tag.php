	        <?php get_header();?>	
			<?php if (have_posts()) :?>
					<div class="page-title"><h1><?php printf(__('Tag Archives: %s'), single_tag_title('', false)); ?></h1><span>Share my memory and experience</span></div>
			<?php if (category_description() ) :?>
					<span><?php echo tag_description(); ?></span>
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
