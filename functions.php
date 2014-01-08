<?php

function kroft_setup() {
		add_editor_style();

		add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status'));

		add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','kroft_setup');

/** widgets */
function kroft_gallery_init() {
	register_taxonomy(
		'works',
		'gallery',
		array(
			'labels' => array(
				'name' => 'Gallery Categories',
				'add_new_item' => 'Add New Gallery Genre',
				'new_item_name' => 'New Gallery Genre'
			),
			'hierarchical' => true,
			'query_var' => true,
			'rewrite' => true,
			'show_in_nav_menus' => true,
		)
	);

	/*
	register_taxonomy(
		'graphic',
		'gallery_graphic',
		array(
			'labels' => array(
				'name' => 'Graphic Categories',
				'add_new_item' => 'Add New Gallery Genre',
				'new_item_name' => 'New Gallery Genre'
			),
			'hierarchical' => true,
			'query_var' => true,
			'rewrite' => true,
			'show_in_nav_menus' => true,
		)
	);
	 */

	register_post_type(
		'gallery',
		array(
			'label' => 'Gallery',
			'singular_label' => __('Work'),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'menu_position' => 3,
			'taxonomies' => array('works'),
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields'),
			'_builtin' => false, // It's a custom post type, not built in!
		)
	);
}
add_action('init', 'kroft_gallery_init');

function include_template_function( $template_path ) {
    if ( get_post_type() == 'gallery' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-gallery.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-movie_reviews.php';
            }
        }
    }
    return $template_path;
}
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'First_sidebar',
		'before_widget' => '<div class="sideblock">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}

function my_tag_cloud($defaults) {
	$args = array(
		'smallest' => 9, 'largest' => 9, 'unit' => 'pt', 'number' => 25,
		'format' => 'list', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );
	$tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags

	if ( empty( $tags ) )
		return;

	foreach ( $tags as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
		else
			$link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
		if ( is_wp_error( $link ) )
			return false;

		$tags[ $key ]->link = $link;
		$tags[ $key ]->id = $tag->term_id;
	}

	$return = wp_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args

	$return = apply_filters( 'my_tag_cloud', $return, $args );

	if ( 'array' == $args['format'] || empty($args['echo']) )
		return $return;

	echo $return;
}

add_filter('wp_tag_cloud', 'my_tag_cloud');

function kroft_pager($range=6){
		global $paged, $wp_query;
		if ( !$max_page ) {$max_page = $wp_query -> max_num_pages;}
		if ($max_page > 1) {
				if(!$paged)
			   			$paged = 1;
		if ($paged != 1) {
				echo "<li class='first-page'><a href='".get_pagenum_link(1)."'>&laquo;</a></li>\n";
				echo "<li><a href='" . get_pagenum_link($page - 1) . "'>&lsaquo;</a></li>";
		}
		}
		if ($max_page > $range){
				if($paged <  $range) 
				{
						for ($i = 1;$i <= ($range + 1);$i++) {
								echo "<li";
								if ($i == $paged)
										echo " class='active'";
								echo "><a href='".get_pagenum_link($i)."'>>$i</a></li>";
						}
				}
				elseif ($paged >= ($max_page - ceil($range / 2))) 
				{
						for ($i = $max_page - $range; $i <= $max_page;$i++) 
						{
								echo "<li";
								if ($i == $paged)
										echo " class='active'";
								echo "><a href='" . get_pagenum_link($i) . "'";
								echo ">$i</a></li>";
						}
				}
				elseif ($paged >= $range && $paged < ($max_page - ceil($range / 2))) {
						for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2));$i++) {
								echo "<li";
								if ( $i == $paged )
										echo "class='active'";
								echo "><a href'" . get_pagenum_link($i)."'";
								echo ">$i</a></li>";
						}
				}
		}
		else {
				for ($i = 1;$i <= $max_page; $i++) {
						echo "<li";
						if ($i == $paged) 
								echo " class='active'";
						echo "><a href='" . get_pagenum_link($i) . "'";
						echo ">$i</a></li>";
				}
		}
		
		if ($paged != $max_page) {
				echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
				echo "<li class='last-page'><a href='" . get_pagenum_link($max_page) . "'>&raquo;</a></li>";
		}
}

if (!function_exists('kroft_comment')) :
function kroft_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback':
				break;
		default:
?>
									<li <?php comment_class(); ?> id="li-comment-<?php comment_ID();?>">
										<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
											<?php 
												echo get_avatar($comment, 35);
												printf('<div class="comment-author vcard">%1$s</div>', get_comment_author_link());
												printf("<div class=\"comment-meta commentmetadata\">\n<span class=\"comment-date\">%s</span>", sprintf( __('%1$s at %2$s'), get_comment_date(), get_comment_time() ));
												?>
										<?php if ( $comment->comment_approved == '0') : ?>
												<p><?php _e('Your comment is awaiting moderation.'); ?></p>
										<?php endif;?>
										<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
										</div>
										<div class="comment-inner">
											<?php comment_text(); ?>
										</div>
									</div>
							<?php 
								break;
							endswitch;
}
endif; ?>
<?php 
function kroft_comments_pager($range=6){
		global $paged, $wp_query;
		if ( !$max_page ) {$max_page = $wp_query -> max_num_comment_pages;}
		if ($max_page > 1) {
				if(!$paged)
			   			$paged = 1;
		if ($paged != 1) {
				echo "<li class='first-page'><a href='".get_comments_pagenum_link(0)."'>&laquo;</a></li>\n";
				echo "<li><a href='" . get_comments_pagenum_link($page) . "'>&lsaquo;</a></li>";
		}
		}
		if ($max_page > $range){
				if($paged <  $range) 
				{
						for ($i = 1;$i <= ($range + 1);$i++) {
								echo "<li";
								if ($i == $paged)
										echo " class='active'";
								echo "><a href='".get_comments_pagenum_link($i)."'>>$i</a></li>";
						}
				}
				elseif ($paged >= ($max_page - ceil($range / 2))) 
				{
						for ($i = $max_page - $range; $i <= $max_page;$i++) 
						{
								echo "<li";
								if ($i == $paged)
										echo " class='active'";
								echo "><a href='" . get_comments_pagenum_link($i) . "'";
								echo ">$i</a></li>";
						}
				}
				elseif ($paged >= $range && $paged < ($max_page - ceil($range / 2))) {
						for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2));$i++) {
								echo "<li";
								if ( $i == $paged )
										echo "class='active'";
								echo "><a href'" . get_comments_pagenum_link($i)."'";
								echo ">$i</a></li>";
						}
				}
		}
		else {
				for ($i = 1;$i <= $max_page; $i++) {
						echo "<li";
						if ($i == $paged) 
								echo " class='active'";
						echo "><a href='" . get_comments_pagenum_link($i) . "'";
						echo ">$i</a></li>";
				}
		}
		
		if ($paged != $max_page) {
				echo "<li><a href='" . get_comments_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
				echo "<li class='last-page'><a href='" . get_comments_pagenum_link($max_page) . "'>&raquo;</a></li>";
		}
}
?>

<?php 
//Function to find costom categroy
function get_gallery_terms( $id ) {
	$cat = get_the_term_list($id, 'works', '', ' ', '');
	if( $cat )
		return strip_tags($cat);
	return 0;
}

//Function to show all gallery terms for filter
function get_kroft_filter() {
	$args = array(
		'orderby' => 'name',
		'taxonomy' => 'works'
	);
	$gallery_cat = get_categories($args);
	foreach($gallery_cat as $key => $galleryitem) {
		echo '<li><a href="#" rel="'.$galleryitem->name.'" >  '.$galleryitem->name.' </a></li>';
	}
}
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $excerpt_length = 8;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

function current_type_nav_class($classes, $item) {

    $post_type = get_post_type();

    //krumo($post_type,$item);

    if ($item->description != '' && $item->description == $post_type) {

        array_push($classes, 'current-menu-item');

    };

    return $classes;

}

add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
?>
