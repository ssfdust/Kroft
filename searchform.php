
				    	<form name="formsearch" method="get" action="<?php bloginfo('home'); ?>">
							<h6 class="side-title">搜索</h6>
                <ul class="form clearfix">
								<li>
                <label for="s" ></label>
                <input type="text" name="s" class="search-keyword" onfocus="if (this.value == '寻找您想要知识？') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" value="" /> 
                <button type="submit" class="select_class" onmouseout="this.className='select_class'" onmouseover="this.className='select_over'" />搜索</button>
								</li>
                </ul>
