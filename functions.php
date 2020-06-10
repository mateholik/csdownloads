<?php
/**
 * cs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cs
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cs, use a find and replace
		 * to change 'cs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cs', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cs' ),
				'menu-2' => esc_html__( 'Secondary', 'cs' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cs_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cs_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cs_content_width', 640 );
}
add_action( 'after_setup_theme', 'cs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cs_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cs' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cs' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cs_scripts() {
	wp_enqueue_style( 'cs-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cs-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    //custom
//    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/custom-assets/ready/style.css', array(), _S_VERSION );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/custom-assets/ready/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'cs_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//CUSTOM

//menu 1 walker
    class Walker_Nav_Primary extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a class="text-menu flex text-17 items-center py-4 px-6 hover:text-white hover:bg-menu1-hover"' . $attributes . '>
        <img class="mr-4 w-10 h-10" src="' . get_template_directory_uri() . '/custom-assets/img/bot1.png" alt="menu-icon">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

//menu 2 walker
class Walker_Nav_Secondary extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a class="text-17 text-menu block py-4 px-6 hover:text-white hover:bg-menu2-hover"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

//menu tags walker
class Walker_Nav_Tags extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a class="block font-semibold text-base py-3 px-4 mr-4 mb-4 border rounded-full hover:text-white hover:bg-menu1-hover"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


//acf options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page( array(
        'menu_title' => __('NUSTATYMAI')
    ) );
}

//in homepage show specific post
function wpsites_home_page_limit( $query ) {
    if ( $query->is_home() && $query->is_main_query() && !is_admin() ) {
//        $query->set( 'posts_per_page', '1' );
        $acf_main_post = get_field('main_post', 'option');
        $query->set ('post__in', array($acf_main_post));
    }
}
add_action( 'pre_get_posts', 'wpsites_home_page_limit' );

// [title title="kazkas" link="kazkas2"]
function title_func( $atts ) {
    $a = shortcode_atts( array(
        'size' => 'h2',
        'title' => 'taitlas',
        'link' => 'linkas',
    ), $atts );
    return '
        <a href="'.$a['link'].'" class="block" title="'.$a['title'].'">
        <'.$a['size'].' class="flex items-baseline font-bold text-4xl md:text-32 underline mb-6 md:mb-10 text-black leading-tight">
            <img class="relative mr-3 w-12 h-12 self-start md:self-auto" style="top:0.4rem;" alt="'.$a['title'].'" src="'.get_template_directory_uri().'/custom-assets/img/bot3.png" alt="menu-icon">'.$a['title'].'</'.$a['size'].'>
        </a>
    ';
}
add_shortcode( 'title', 'title_func' );

// [button exe="kazkas" torrent="kazkas2"]
function button_func( $atts ) {
    $a = shortcode_atts( array(
        'exe' => 'https://www.csdownload.lt/Counter-Strike 1.6-original.exe',
        'title1' => 'CS 1.6 download - Click and download Counter-strike 1.6 game setup file from our website directly and for free!',
        'torrent' => 'http://www.redirektas.lt/Counter-Strike 1.6-original.exe.torrent',
        'title2' => 'Counter Strike 1.6 torrent download - click and download cs torrent from csdownload.lt website, install and enjoy!',
    ), $atts );
    return '
    <div class="btns flex justify-center py-10 md:py-20">
        <a href="'.$a['exe'].'" class="bg-btn-red flex max-w-xs rounded-md text-white mr-10" title="'.$a['title1'].'">
            <div class="flex items-center border-r border-dashed border-white border-opacity-75 p-2 md:p-4">
                <div>
                    <img class="w-12 h-12 md:w-16 md:h-16" src="'.get_template_directory_uri().'/custom-assets/img/bot.svg" alt="bot">
                </div>
                <div class="leading-none">
                    <span class="font-semibold text-xl md:text-17">
                        Download
                    </span>
                    <br>
                    <span class="text-base md:text-xl">Setup</span>
                </div>
            </div>
            <div class="px-4 md:px-6 flex justify-center items-center">
                <img class="w-4 h-4" src="'.get_template_directory_uri().'/custom-assets/img/arrow.svg" alt="arrow">
            </div>
        </a>
        <a href="'.$a['torrent'].'" class="bg-btn-trans bg-btn-trans--black flex max-w-xs rounded-md text-white border border-white" title="'.$a['title2'].'">
            <div class="flex items-center border-r border-dashed border-white border-opacity-75 p-2 md:p-4">
                <div>
                    <img class="w-12 h-12 md:w-16 md:h-16" src="'.get_template_directory_uri().'/custom-assets/img/bot.svg" alt="bot">
                </div>
                <div class="leading-none">
                    <span class="font-semibold text-xl md:text-17">
                        Download
                    </span>
                    <br>
                    <span class="text-base md:text-xl">Torrent file</span>
                </div>
            </div>
            <div class="px-4 md:px-6 flex justify-center items-center">
                <img class="w-4 h-4" src="'.get_template_directory_uri().'/custom-assets/img/arrow.svg" alt="arrow">
            </div>
        </a>
    </div>';
}
add_shortcode( 'button', 'button_func' );

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


//allow . in permalink


remove_filter('sanitize_title', 'sanitize_title_with_dashes');

function sanitize_title_with_dots_and_dashes($title) {
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    $title = remove_accents($title);
    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title);
    }

    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = preg_replace('/[^%a-z0-9 ._-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    $title = str_replace('-.-', '.', $title);
    $title = str_replace('-.', '.', $title);
    $title = str_replace('.-', '.', $title);
    $title = preg_replace('|([^.])\.$|', '$1', $title);
    $title = trim($title, '-'); // yes, again

    return $title;
}
add_filter('sanitize_title', 'sanitize_title_with_dots_and_dashes');

//
//add_filter( 'post_link', 'custom_permalink', 10, 3 );
//function custom_permalink( $permalink, $post, $leavename ) {
//    // Get the categories for the post
//    $category = get_the_category($post->ID);
//    if (  !empty($category) && $category[0]->cat_name == "Tag posts" ) {
//        $permalink = trailingslashit( home_url('/'. $post->post_name .'-'. $post->ID .'/' ) );
//    }
//    return $permalink;
//}
//add_action('generate_rewrite_rules', 'custom_rewrite_rules');
//function custom_rewrite_rules( $wp_rewrite ) {
//    // This rule will will match the post id in %postname%-%post_id% struture
//    $new_rules['^([^/]*)-([0-9]+)/?'] = 'index.php?p=$matches[2]';
//    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
//    return $wp_rewrite;
//}
