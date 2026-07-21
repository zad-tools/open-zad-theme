<?php
/**
 * Open ZAD Theme functions and definitions.
 *
 * @package Open_ZAD_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'OPEN_ZAD_VERSION' ) ) {
	// Read the version straight from the style.css header so it never drifts.
	$open_zad_theme = wp_get_theme();
	define( 'OPEN_ZAD_VERSION', $open_zad_theme->get( 'Version' ) ? $open_zad_theme->get( 'Version' ) : '1.0.0' );
}

if ( ! function_exists( 'open_zad_setup' ) ) {
	/**
	 * Register theme support features and navigation menus.
	 */
	function open_zad_setup() {
		load_theme_textdomain( 'open-zad', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );

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
				'navigation-widgets',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 240,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/main.css' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'open-zad' ),
				'footer'  => __( 'Footer Menu', 'open-zad' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'open_zad_setup' );

/**
 * Set the content width in pixels, based on the theme's design.
 */
function open_zad_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'open_zad_content_width', 800 );
}
add_action( 'after_setup_theme', 'open_zad_content_width', 0 );

/**
 * Register widget areas.
 */
function open_zad_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'open-zad' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets shown in the sidebar on blog and archive views.', 'open-zad' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s mb-8 border border-border bg-surface p-6">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title text-sm font-bold uppercase tracking-wider text-text-muted mb-4">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'open-zad' ),
			'id'            => 'footer-1',
			'description'   => __( 'Widgets shown in the site footer.', 'open-zad' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title text-sm font-bold uppercase tracking-wider text-text-muted mb-4">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'open_zad_widgets_init' );

/**
 * Enqueue theme styles and scripts — all served locally, no external requests.
 */
function open_zad_scripts() {
	wp_enqueue_style(
		'open-zad-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		OPEN_ZAD_VERSION
	);

	// Inject Customizer-driven color tokens after the main stylesheet.
	wp_add_inline_style( 'open-zad-main', open_zad_get_inline_css() );

	wp_enqueue_script(
		'open-zad-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		OPEN_ZAD_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'open_zad_scripts' );

/**
 * Add a helpful body class for the sidebar layout state.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function open_zad_body_classes( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page() ) {
		$classes[] = 'no-sidebar';
	}

	if ( is_customize_preview() ) {
		$classes[] = 'is-customize-preview';
	}

	return $classes;
}
add_filter( 'body_class', 'open_zad_body_classes' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
