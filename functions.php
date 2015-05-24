<?php 


function theme_styles() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );

}

add_action( 'wp_enqueue_scripts', 'theme_js' );
// add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' ); // This is to set the custom and dynamic menus
add_theme_support( 'post-thumbnails' ); // this allows you to set a featured image
add_image_size('masonry_thumb', 313, 10000, false);
add_image_size('masonry_1x1', 188, 188, true);
add_image_size('masonry_1x2', 188, 376, true);
add_image_size('masonry_2x1', 376, 188, true);
add_image_size('masonry_2x2', 376, 376, true);

/* FUNCTION TELLS WP WHERE TO PLACE THE MENU AND THAT IS CURRENTLY EXISTS WITHIN THE CMS */
function register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'ticksense' )
			)
	);
}
add_action( 'init', 'register_theme_menus' );


function create_widget($name, $id, $description) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays on the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );

create_widget( 'Page Sidebar', 'page', 'Displays on the side of the pages with a sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );

//* Replace WordPress login logo
add_action('login_head', 'b3m_custom_login_logo');
function b3m_custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/transparent_logo.png) !important; background-size: cover !important; margin-bottom: 10x !important; padding-bottom: 0px !important; }
    .login form { margin-top: 10px !important; }
    #wp-submit {background-color: #1d5b79 !important;}
    </style>';
}

//Change Welcome Message
add_filter('gettext', 'change_howdy', 10, 3);
 
function change_howdy($translated, $text, $domain) {
 
    if (!is_admin() || 'default' != $domain)
        return $translated;
 
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);
 
    return $translated;
}

//Change footer message
function change_footer_admin () { 
  echo ''; 
} 
 
add_filter('admin_footer_text', 'change_footer_admin');



 
function admin_css() {/*Replace WP Logo*/echo '';}
add_action('admin_head','admin_css');

// Custom WordPress Admin Color Scheme
wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
add_action('admin_print_styles', 'admin_css' );

// Get Image in post
// function catch_that_image() {
//   global $post, $posts;
//   $first_img = '';
//   ob_start();
//   ob_end_clean();
//   $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//   $first_img = $matches[1][0];

//   if(empty($first_img)) {
//     $first_img = "/path/to/default.png";
//   }
//   return $first_img;
// }

// function display_image(){

// 	$catPost = get_posts(get_cat_ID('Uncategorized'));

// 	foreach ($catPost as $post) {
// 		if ( get_the_post_thumbnail($post_id) != '' ) {

// 	      echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
// 	       the_post_thumbnail();
// 	      echo '</a>';

// 	    } else {

// 	     echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
// 	     echo '<img src="';
// 	     echo catch_that_image();
// 	     echo '" alt="" />';
// 	     echo '</a>';
// 	    }

// 	}

// }


?>