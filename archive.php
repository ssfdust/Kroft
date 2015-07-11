<?php
?>
	        <?php get_header();
					remove_filter('get_the_excerpt', 'wp_trim_excerpt');
					add_filter ('get_the_excerpt','improved_trim_excerpt');
					?>	
						<div class="page-title"><h1>文章归档</h1> <span><?php printf( get_the_date('F Y'));?></span></div>
					<!-- side content -->
					<div id="side-content">
					
						<!-- Blog loop -->
						<div class="blog-loop">
							<?php $temp = $wp_query;
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$year = get_the_date('Y');
							$month = get_the_date('n');
							$wp_query = null;
							$archive_args = array(
									post_type => 'post',    // get only posts
									'posts_per_page' => '5',
									'paged' => $paged,
									'date_query' => array(
										array(
											'year' => $year,
											'month' => $month,
										),
										),
    );
							$wp_query = new WP_Query($archive_args);
							//$wp_query->query('showposts=5'.'&paged='.$paged);
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
