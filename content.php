<?php

/*随便写点什么
  */
?>
					
							<div class="post">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="post-feature-img">
									<?php	update_option('thumbnail_size_w', 690);
												update_option('thumbnail_size_h', 260);
										?>
									<?php the_post_thumbnail(array(690,260)); ?>
								</a>
								<img src="<?php bloginfo('template_url'); ?>/img/feature-post-shadow.png" alt="shadow" />
							<?php endif; ?>
								
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php if ( !is_single()) :  ?>
								<div class="excerpt"><?php the_excerpt(); ?>....</div>
								<div class="meta">
									Posted by <a><?php the_author(); ?></a>, in <?php the_category(',')?> <a href="<?php the_permalink(); ?>" class="read-more" style="font-size:15px">阅读更多...</a>
								</div>
								<div class="meta-date">
									<span class="meta-day"><?php the_time('j');?></span><span class="meta-month"><?php echo date("M",get_the_time('U'));?></span><span class="meta-year"><?php the_time('Y') ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if (is_single()) : ?>
								<div class="meta">Posted by <?php the_author(); ?>, in <?php the_category(',')?></div>
								<div class="content">
								<!-- Column 1 /Content -->
								<?php the_content(); ?>
									</div>
								
								
								<div class="meta-date">
									<span class="meta-day"><?php the_time('j');?></span><span class="meta-month"><?php echo date("M" ,get_the_time('U')) ?></span><span class="meta-year"><?php the_time('Y'); ?></span>
								</div>
								
						<?php endif; ?>
