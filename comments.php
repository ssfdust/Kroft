						<!-- Comments switcher -->
						<h6 class="show-comments"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments', '', '评论已关闭'); ?> <span>click to show</span></h6>
						<div class="comments-switcher">
						
							<!-- comments list -->
							<?php if (have_comments()) : ?>
							<div id="comments-wrap">
								<ol class="commentlist">
									<?php wp_list_comments(array('callback' => 'kroft_comment','style' => 'ul', 'per_page' => 20)); ?>           
								</ol>
							</div>
							<ul class='pager' style="float:right">
								<?php kroft_comments_pager(); ?>
							</ul>
							<div class='clear'></div>
							<?php else : ?>
							<div id="comments-wrap">
								<ol class="commentlist">
								<li><p>还没有评论，要不你来写两句。</p></li>
								</ol>
							</div>
							<!-- ENDS comments list -->
							<?php endif; ?>
		
		
							<!-- Respond -->				
							<div id="respond">
				<?php 
				    add_filter('comment_form_default_fields','my_fields');
					function my_fields($my_fields) {
							$myfields = array(
											'author' => 
											  '<input type=text" name="author" id="author" value="'.$comment_author.'" tabindex="1" /><label for="author">'. __('Name') .' <small>*</small></label><br/>',
											'email' =>
											  '<input type="text" name="email" id="email" value="' .$comment_author_email.'" tabindex="2" />'.'<label for="email">' .  __('Email') . '<small>*</small></label><br />',
											 'url' =>
											   '<input type="text" name="url" id="url" value="" tabindex="3" />' . '<label for="url">   ' . __('Website') . '</label>',);
							return $myfields;
					}
					comment_form($myfields);
				?>

							</div>
							<div class="clear"></div>
							<!-- ENDS Respond -->
						</div>
						<!-- ENDS Comments switcher -->
