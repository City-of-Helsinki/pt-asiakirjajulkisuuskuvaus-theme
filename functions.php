<?php
/**
 * Asiakirjajulkisuuskuvaus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package asiakirjajulkisuuskuvaus
 */


if ( ! function_exists( 'asiakirjajulkisuuskuvaus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function asiakirjajulkisuuskuvaus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on asiakirjajulkisuuskuvaus, use a find and replace
		 * to change 'asiakirjajulkisuuskuvaus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'asiakirjajulkisuuskuvaus', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'asiakirjajulkisuuskuvaus' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'asiakirjajulkisuuskuvaus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'asiakirjajulkisuuskuvaus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function asiakirjajulkisuuskuvaus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'asiakirjajulkisuuskuvaus_content_width', 640 );
}
add_action( 'after_setup_theme', 'asiakirjajulkisuuskuvaus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function asiakirjajulkisuuskuvaus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'asiakirjajulkisuuskuvaus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'asiakirjajulkisuuskuvaus' ),
		'before_widget' => '<section id="%1$s" class="menu %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<p class="menu-label">',
		'after_title'   => '</p>',
	) );
}
add_action( 'widgets_init', 'asiakirjajulkisuuskuvaus_widgets_init' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function designhel_setup() {
	  // Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-spacing');

	add_image_size( 'hero-image size', 1440, 400 );

	// Enqueue editor styles.
	add_editor_style( get_stylesheet_directory_uri() . '/dist/editor.min.css' );
}
add_action( 'after_setup_theme', 'designhel_setup' );


/**
 * Enqueue scripts and styles.
 */
function asiakirjajulkisuuskuvaus_scripts() {

	$scriptVersion = filemtime( get_stylesheet_directory() . '/dist/theme.min.js' );
	$styleVersion = filemtime( get_stylesheet_directory() . '/dist/main.min.css' );

	wp_enqueue_style( 'helsinkidesign-style', get_template_directory_uri() . '/dist/main.min.css', $styleVersion );
	wp_enqueue_script( 'helsinkidesign-scipts', get_template_directory_uri() . '/dist/theme.min.js', array('jquery'), $scriptVersion, true );

	wp_enqueue_style( 'owl-styles', get_stylesheet_directory_uri() . '/src/owlcarousel/owl.carousel.min.css', '2.3.4');
	wp_enqueue_style( 'owl-styles-default', get_stylesheet_directory_uri() . '/src/owlcarousel/owl.theme.default.min.css', array(''), '2.3.4', true );
	wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/src/owlcarousel/owl.carousel.min.js', array('jquery'), '2.3.4');
	wp_enqueue_script( 'asiakirjajulkisuuskuvaus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'asiakirjajulkisuuskuvaus_scripts' );


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

/* Load asiakirjajulkisuuskuvaus functions */
require get_template_directory() .'/functions/asiakirjajulkisuuskuvaus-nav-walker.php';


function comment_form_asiakirjajulkisuuskuvaus_fields ($fields) {
	$fields["author"] = '<div class="comment-form-author field"><label for="author" class="label">' . __( 'Name', 'domainreference' ) .
	( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
	'<input id="author" name="author" type="text" class="input" value="' . esc_attr( $commenter['comment_author'] ) .
	'" size="30"' . $aria_req . ' /></div>';

	$fields["email"] = '<div class="comment-form-email field"><label for="email" class="label">' . __( 'Email', 'domainreference' ) .
	( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
	'<input id="email" name="email" type="text" class="input" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	'" size="30"' . $aria_req . ' /></div>';

	$fields["url"] = '<div class="comment-form-url field"><label for="url" class="label">' . __( 'Website', 'domainreference' ) . '</label>' .
	'<input id="url" name="url" type="text" class="input" value="' . esc_attr( $commenter['comment_author_url'] ) .
	'" size="30" /></div>';
	return $fields;
}
add_filter('comment_form_default_fields','comment_form_asiakirjajulkisuuskuvaus_fields');


add_filter( 'get_custom_logo', 'asiakirjajulkisuuskuvaus_custom_logo' );
function asiakirjajulkisuuskuvaus_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$html = sprintf( '<a href="%1$s" class="navbar-item" rel="home" itemprop="url">%2$s</a>',
		esc_url( '/' ),
		wp_get_attachment_image( $custom_logo_id, 'full', false, array(
			'class'    => 'custom-logo',
		) )
	);
	return $html;   
} 


function block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom-blocks',
				'title' => 'Custom Blocks',
			),
		)
	);
}
add_filter( 'block_categories', 'block_category', 10, 2);



add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
	if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'hero',
			'title'             => __('Hero'),
			'description'       => __('Frontpage Hero block.'),
			'render_template'   => 'template-parts/blocks/hero.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'hero-content',
			'title'             => __('Hero Content'),
			'description'       => __('Frontpage Hero content block.'),
			'render_template'   => 'template-parts/blocks/hero-content.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'image-cta',
			'title'             => __('Image CTA'),
			'description'       => __('Image CTA with overlay text content.'),
			'render_template'   => 'template-parts/blocks/image-cta.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'category-news',
			'title'             => __('Category News'),
			'description'       => __('Select category to show 3 latest news on front page'),
			'render_template'   => 'template-parts/blocks/category-news.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'select-news',
			'title'             => __('Select News'),
			'description'       => __('Select posts manaually'),
			'render_template'   => 'template-parts/blocks/select-news.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'helsinki-news',
			'title'             => __('Helsinki API News'),
			'description'       => __('Imported Helsinki news from API'),
			'render_template'   => 'template-parts/blocks/helsinki-news.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'editor-card',
			'title'             => __('Editor Card'),
			'description'       => __('Card element in content editor'),
			'render_template'   => 'template-parts/blocks/editor-card.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'wide',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'editor-slider',
			'title'             => __('Editor Slider'),
			'description'       => __('Slider with thumbnails'),
			'render_template'   => 'template-parts/blocks/editor-slider.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));


		acf_register_block_type(array(
			'name'              => 'contacts',
			'title'             => __('Contacts Block'),
			'description'       => __('Repeater for adding contacts'),
			'render_template'   => 'template-parts/blocks/contacts.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));

		acf_register_block_type(array(
			'name'              => 'accordion-section',
			'title'             => __('Accordion Section'),
			'description'       => __('Accordion items with title'),
			'render_template'   => 'template-parts/blocks/accordion.php',
			'category'          => 'custom-blocks',
			'mode' 							=> 'edit',
			'align' 						=> 'full',
			'icon'              => 'admin-comments',
		));


		register_block_style(
			"core/quote",
			array(
				'name'         => 'wide-quote',
				'label'        => 'Wide Quote',
				'style_handle' => 'widequote-style',
			)
		);
	}
}

// Add custom options page for example to edit footer links
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Teeman asetukset',
		'menu_title'	=> 'Teeman asetukset',
		'menu_slug' 	=> 'teeman-asetukset',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**
 * Display Post Blocks 
 *
 */
// function display_post_blocks() {
// 	global $post;
// 	print_r( esc_html( $post->post_content ) );
// }
// add_action( 'wp_footer', 'display_post_blocks' );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
		return $data;
	}

	$filetype = wp_check_filetype( $filename, $mimes );

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
	.attachment-266x266, .thumbnail img {
		width: 100% !important;
		height: auto !important;
	}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}


function asiakirjajulkisuuskuvaus_translates() {

   // register our translatable strings 

	if ( function_exists( 'pll_register_string' ) ) {

		pll_register_string( 'Ajankohtaista', 'Ajankohtaista', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Lue lisää', 'Lue lisää', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Kaikki uutiset', 'Kaikki uutiset', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Yhteystiedot', 'Yhteystiedot', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Hae yhteystietoja', 'Hae yhteystietoja', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Siirry sisältöön', 'Siirry sisältöön', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Hae', 'Hae', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Hakutulokset', 'Hakutulokset', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Haku', 'Haku', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Asiasanat', 'Asiasanat', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Sinua voisi kiinnostaa', 'Sinua voisi kiinnostaa', 'asiakirjajulkisuuskuvaus', false );
		pll_register_string( 'Helsingin kaupunki', 'Helsingin kaupunki', 'asiakirjajulkisuuskuvaus', false );

	}
}
add_action( 'after_setup_theme', 'asiakirjajulkisuuskuvaus_translates' );


/*
*
* Walker for the main menu 
*
*/
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);
function add_arrow( $output, $item, $depth, $args ){

//Only add class to 'top level' items on the 'primary' menu.
	if('primary' == $args->theme_location && $depth === 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<button class="menu-toggle" aria-expanded="false" aria-label="Avaa alavalikko" tabindex="0"><div class="inner-button hds-icon hds-icon--size-m hds-icon--angle-down closed"></div></button>';
		}
	}
	return $output;
}


function asiakirjajulkisuuskuvaus_multilang_logo( $value ) {
	if ( function_exists( 'pll_current_language' ) ) {
		$logos = array(
			'fi' => get_stylesheet_directory_uri() . '/images/helsinki-fi.svg',
			'en' => get_stylesheet_directory_uri() . '/images/helsinki-fi.svg',
			'se' => get_stylesheet_directory_uri() . '/images/helsinki-fi.svg',
		);
		$default_logo = $logos['fi'];
		$current_lang = pll_current_language();
		if ( isset( $logos[ $current_lang ] ) )
			$value = $logos[ $current_lang ];
		else
			$value = $default_logo;
	}
	$html = sprintf( '<a href="%1$s" title="Etusivulle" class="navbar-item" rel="home" itemprop="url"><img alt="Helsinki Design Logo" class="custom-logo" src="'.$value.'" /></a>',
		esc_url( home_url( '/' ) ),
		$value
	);
	return $html;
}
add_filter( 'get_custom_logo', 'asiakirjajulkisuuskuvaus_multilang_logo' );


add_filter( 'pre_get_posts', 'asiakirjajulkisuuskuvaus_exclude_pages_search' );
function asiakirjajulkisuuskuvaus_exclude_pages_search($query) {
	if ( $query->is_search )
		$query->set( 'post__not_in', array( 133, 1237, 1239, ) ); 

	return $query;
}


function stripAccents($str) {
	return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}


// Register Custom Post Type
function tietovarannot_cpt() {

	$labels = array(
		'name'                  => _x( 'Tietovarannot', 'Post Type General Name', 'asiakirjajulkisuuskuvaus' ),
		'singular_name'         => _x( 'Tietovaranto', 'Post Type Singular Name', 'asiakirjajulkisuuskuvaus' ),
		'menu_name'             => __( 'Tietovarannot', 'asiakirjajulkisuuskuvaus' ),
		'name_admin_bar'        => __( 'Tietovarannot', 'asiakirjajulkisuuskuvaus' ),

	);
	$args = array(
		'label'                 => __( 'Tietovarannot', 'text_domain' ),
		'description'           => __( 'Tietovarannot sisältötyyppi', 'asiakirjajulkisuuskuvaus' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'post-formats' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'tietovarannot', $args );

}
add_action( 'init', 'tietovarannot_cpt', 0 );

function theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'theme_archive_title' );

