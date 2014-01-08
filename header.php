<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		<?php bloginfo('name');?>
		<?php 
			if (is_home())
			{
				echo "- ";
				bloginfo('description');
			}
			else
				wp_title('-');
		?>
		</title>
	
		<!-- CSS -->
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/social-icons.css" type="text/css" media="screen" />
		<!-- ENDS CSS -->	
		
		<!--[if IE]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- ENDS JS -->
		
		<!-- JS -->
		<script type="text/javascript">var themeurl="<?php bloginfo('template_url'); ?>"</script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/custom.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/slider.js">
		</script>
		<script src="<?php bloginfo('template_url');?>/js/slides/source/slides.min.jquery.js"></script>
		<script src="<?php bloginfo('template_url');?>/js/quicksand.js"></script>
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url');?>/css/superfish.css" /> 
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->

		<!-- poshytip -->
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- prettyPhoto -->
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>

	</head>
	<body>
	
		<!-- Dynamic Background -->
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		<!-- ENDS Dynamic Background -->
		
		<!-- background nav -->
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
		<!-- ENDS background nav -->
		
		<div id="top-gap"></div>

		<!-- wrapper -->
		<div class="wrapper">
		
			<a href="<?php echo get_option('home'); ?>"><img  id="logo" src="<?php bloginfo('template_url') ?>/img/logo.png" alt="Kroft"></a>
			
			
			<!-- nav bar holder -->
			<div id="nav-bar-holder">
				<!-- Navigation -->
				<ul id="nav" class="sf-menu">
				
					<li <?php if (is_home()) { echo 'class="current_page_item"';} ?>><a href="<?php echo get_option('home'); ?>">Home</a></li>
					<?php wp_list_pages('title_li=&depth=2&sort_column=menu_order'); ?>
					<li><a>Links</a>
						<ul>
							<li><a href="ftp://ftp.ssfdust.net:7854/pub" target="_blank">FTP</a></li>
							<li><a href="http://www.archlinux.org" target="_blank">Archlinux</a></li>
							<li><a href="http://wiki.archlinux.org" target="_blank">Archwiki</a></li>
							<li><a href="https://github.com/ssfdust" target="_blank">My git</a></li>
							<li><a href="http://bt.orzx.co" target="_blank">Torrent</a></li>
						</ul>
				</ul>
				<!-- ENDS Navigation -->
				
				<!-- Social -->
				<ul class="social">
					<li><a href="http://www.renren.com" target="_blank" class="poshytip  renren" title="关注一下？"></a></li>
					<li><a href="http://hi.baidu.com/ssfdust" target="_blank" class="poshytip  baidu" title="曾经的百度空间"></a></li>
				</ul>
				<!-- ENDS Social -->
			</div>
			<!-- ENDS nav bar holder -->
				
			<!-- content wrap -->	    	
	        <div id="content-wrap">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap">
