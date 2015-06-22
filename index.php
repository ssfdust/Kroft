<?php get_header();
//Add excerpt length
function yet_another( $length ) {
	return 112;
}
add_filter( 'excerpt_length', 'yet_another', 999 );
function customTitle($limit) {
$title = get_the_title($post->ID);
if(mb_strlen($title) > $limit) {
$title = mb_substr($title, 0, $limit,"UTF-8") . '...';
}
echo $title;
}

?>        	
	        		
	        		<!-- Front slider -->
	        		<div id="front-slides">
						<div class="slides_container">
							<div class="slide">
								<a href="<?php echo get_option('home'); ?>" target="blank"><img src="<?php bloginfo('template_url');?>/img/dummies/03.jpg"  alt="pic" width="940" height="360"  /></a>
								<div class="caption">Welcome To S.D.'s World!</div>
							</div>
							<div class="slide">
								<a href="<?php echo get_option('home'); ?>" ><img src="<?php bloginfo('template_url');?>/img/dummies/02.jpg" alt="pic" width="940" height="360"  /></a>
								<div class="caption">讨论有关计算机，魔术，魔方，以及生活的方方面面。 </div>
							</div>
							<div class="slide">
								<a href="<?php echo get_option('home'); ?>" ><img src="<?php bloginfo('template_url');?>/img/dummies/01.jpg" alt="pic" width="940" height="360"  /></a>
								<div class="caption">飘尘，星尘，岚月星尘 </div>
							</div>
						</div>

						
						<div id="front-slides-cover"></div>
							
						<!-- Headline -->
						<div id="headline"><h6></h6></div>
						<!-- ENDS Headline -->	
					
					</div>
					<!-- ENDS Front slider -->
					
					
					<!-- Reel slider -->
	        		<div id="reel">
						<div class="slides_container">
							
							<div class="slide-box">
								<?php query_posts('showposts=3'); ?>
								<?php while (have_posts()) : the_post(); ?>
								<div class="box-container">
									<img src="<?php bloginfo('template_url'); ?>/img/mono-icons/article32.png" class="box-icon" alt="pic"/>
									<h6><a href="<?php the_permalink(); ?>"><?php customTitle(9);?></a></h6>
									<div class="box-divider"></div><?php the_excerpt(); ?>
									</div>
								<?php endwhile;?>
							
							</div>
							<div class="slide-box">
								<div class="box-container">
									<img src="<?php bloginfo('template_url'); ?>/img/mono-icons/exchange32.png" class="box-icon" alt="pic"/>
									<h6>My ArchISO Download</h6>
									<div class="box-divider"></div>个人定制的个人Live，有爱下载下。<a href="http://pan.baidu.com/share/link?shareid=475835&uk=3775779613">Download</a>
								<br />Archlinux + KDE
								<br />定制vim + 一些小工具
								<br />内增archlinux的shell安装脚本的说
								</div>
								<div class="box-container">
									<img src="<?php bloginfo('template_url'); ?>/img/mono-icons/exchange32.png" class="box-icon" alt="pic"/>
									<h6>mote下载</h6>
									<div class="box-divider"></div>一个显示巨大的飘尘的东西。<a href="http://pan.baidu.com/share/link?shareid=211460&uk=3775779613">Download</a>
								<br />用GIMP绘图，然后用jp2a转换为了ascii编码<br />可以作为tty或者虚拟终端的启动画面。（不过虚拟终端的话。。。还真的有点吃不消就是.
								</div>
								<div class="box-container">
									<img src="<?php bloginfo('template_url'); ?>/img/mono-icons/exchange32.png" class="box-icon" alt="pic"/>
									<h6>一些歌曲分享</h6>
									<div class="box-divider"></div>主要是轻音乐。<a href="http://pan.baidu.com/share/link?shareid=132757&uk=3775779613">Download</a>
								</div>
							</div>
							
							
						</div>
						<a href="#" class="prev"></a>
						<a href="#" class="next"></a>
					</div>
					<!-- ENDS Reel slider -->
	        	
	        	</div>
	        	<!-- ENDS Page wrap -->
	        	
	        </div>
	        <!-- ENDS content wrap -->
	        
        </div>
		<!-- ENDS Wrapper -->
	<?php get_footer(); ?>	
