					<!-- sidebar -->
					<div id="sidebar">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
						<div class="sideblock">
            </form>
						</div>
						<div class="sideblock">
							<h6 class="side-title">近期评论</h6>
							<ul class="cat-list">
							<?php rencent_comments();?>
					    	</ul>
				    	</div>
						</div>
						<div class="sideblock">
							<h6 class="side-title">分类</h6>
							<ul class="cat-list">
							<?php wp_list_categories('depth=1&title_li=&orderby=id&show_count=1&hide_empty=1&child_of=0'); ?>
					    	</ul>
				    	</div>
				    	<div class="sideblock">
							<h6 class="side-title">标签</h6>
							<?php wp_tag_cloud('format=list&smallest=9&largest=9'); 
							?>
				    	</div>
				    	
						<?php endif; ?>
					</div>
					<!-- ENDS sidebar -->

