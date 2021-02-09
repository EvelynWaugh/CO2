<?php

/**
 * co2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package co2
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
define('CO2_PATH', get_template_directory());
define('CO2_URL', get_template_directory_uri());
define('CO2_ASSETS', get_template_directory_uri() . '/assets/');
if (!function_exists('co2_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function co2_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on co2, use a find and replace
		 * to change 'co2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('co2', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Левая часть', 'co2'),
				'menu-2' => esc_html__('Правая часть', 'co2'),
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
		add_theme_support('woocommerce', array(
			'single_image_width'    => 1100,
		));

		add_theme_support('wc-product-gallery-slider');
		// 		add_theme_support( 'wc-product-gallery-zoom' );
		// add_theme_support( 'wc-product-gallery-lightbox' );


		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'co2_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'co2_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function co2_content_width()
{
	$GLOBALS['content_width'] = apply_filters('co2_content_width', 640);
}
add_action('after_setup_theme', 'co2_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function co2_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'co2'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'co2'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('footer#1', 'co2'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add footer col-1 here.', 'co2'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('footer#2', 'co2'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add footer col-2 here.', 'co2'),
			'before_widget' => '<div id="%1$s" class="footer_about">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('footer#3', 'co2'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add footer col-3 here.', 'co2'),
			'before_widget' => '<div id="%1$s" class="footer_follow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action('widgets_init', 'co2_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function co2_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_style('co2-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('co2-style', 'rtl', 'replace');
	wp_enqueue_style('main_style_fonts', CO2_ASSETS . 'fonts/stylesheet.css', [], '1.0.0', 'all');
	wp_enqueue_style('main_style_slick', CO2_ASSETS . 'css/slick.css', [], '1.0.0', 'all');
	wp_enqueue_style('main_style', CO2_ASSETS . 'css/style.css', [], '1.0.0', 'all');
	wp_enqueue_style('main_style_add', CO2_ASSETS . 'css/add.css', [], '1.0.0', 'all');
	wp_enqueue_style('main_style_media', CO2_ASSETS . 'css/media.css', [], '1.0.0', 'all');

	// wp_enqueue_script('co2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);+
	wp_enqueue_script('co2-slick', CO2_ASSETS . '/js/slick.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('co2-main-js', CO2_ASSETS . '/js/scripts.js', array(), _S_VERSION, true);
	wp_localize_script('co2-main-js', 'CO2', array(
		'cart_url' => wc_get_cart_url()
	));
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'co2_scripts');

if (class_exists('Woocommerce')) {

	add_filter('woocommerce_enqueue_styles', '__return_empty_array');
}

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter('wp_nav_menu_args', 'change_nav_menu_args');
function change_nav_menu_args($args)
{

	if (is_object($args['menu']) && ($args['menu']->name === 'footer_menu_1' || $args['menu']->name === 'footer_menu_2')) {
		$args['menu_class'] = 'footer_menu_class';
		$args['container'] = false;
	}
	return $args;
}

if (class_exists('Kirki')) {


	Kirki::add_config('theme_config_id', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	));
	Kirki::add_panel('panel_id', array(
		'priority'    => 10,
		'title'       => esc_html__('CO₂', 'kirki'),
		'description' => esc_html__('CO₂ description', 'kirki'),
	));
	//Home
	Kirki::add_section('home_page', array(
		'title'          => esc_html__('Home page', 'kirki'),
		'description'    => esc_html__('Home page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));


	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_home_url_bg',
		'label'       => esc_html__('Background on home page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'home_page',
		'default'     => [
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',

	]);
	//whatis offsetting page
	Kirki::add_section('what_page', array(
		'title'          => esc_html__('What is offsetting page', 'kirki'),
		'description'    => esc_html__('What page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_what_url_bg',
		'label'       => esc_html__('Background on What page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'what_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center right',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',

	]);
	///Contact page
	Kirki::add_section('contact_page', array(
		'title'          => esc_html__('Contact page', 'kirki'),
		'description'    => esc_html__('Contact page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_contact_url_bg',
		'label'       => esc_html__('Background on contacts page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'contact_page',
		'default'     => [
			'background-color'      => '#f3fafd',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center right',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.contacts'
			]
		]

	]);

	//Apis page

	Kirki::add_section('apis_page', array(
		'title'          => esc_html__('Apis page', 'kirki'),
		'description'    => esc_html__('Apis page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_api_url_bg',
		'label'       => esc_html__('Background on api page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'apis_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center right',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.type_page.apis_page'
			]
		]

	]);
	//about us page
	Kirki::add_section('about_page', array(
		'title'          => esc_html__('About us page', 'kirki'),
		'description'    => esc_html__('About us page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_about_url_bg',
		'label'       => esc_html__('Background on about page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'about_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center right',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.about_us'
			]
		]

	]);
	//bitcoin page

	Kirki::add_section('bitcoin_page', array(
		'title'          => esc_html__('Bitcoin page', 'kirki'),
		'description'    => esc_html__('Bitcoin page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_bitcoin_url_bg',
		'label'       => esc_html__('Background on bitcoin page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'bitcoin_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.bitcoin_co2'
			]
		]

	]);

	//Main shop

	Kirki::add_section('main_page', array(
		'title'          => esc_html__('Main shop page', 'kirki'),
		'description'    => esc_html__('Main shop page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_main_url_bg',
		'label'       => esc_html__('Background on main page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'main_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.lp'
			]
		]

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_sec2_url_bg',
		'label'       => esc_html__('Background on main page, section #2', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'main_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.lp_bg'
			]
		]

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_sec3_url_bg',
		'label'       => esc_html__('Background on main page, section #3', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'main_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.bottom_form'
			]
		]

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_single_url_bg',
		'label'       => esc_html__('Background on single project page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'main_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.project_page'
			]
		]

	]);

	///Quiz page

	Kirki::add_section('quiz_page', array(
		'title'          => esc_html__('Quiz page', 'kirki'),
		'description'    => esc_html__('Quiz page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_quiz_url_bg',
		'label'       => esc_html__('Background on Quiz page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'quiz_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.quiz_left'
			]
		]

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_quiz_result_url_bg',
		'label'       => esc_html__('Background on Quiz Result page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'quiz_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.quiz_result'
			]
		]

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'image',
		'settings'    => 'image_quiz_url',
		'label'       => esc_html__('Image for Quiz page', 'kirki'),

		'section'     => 'quiz_page',
		'default'     => '',

	]);

	Kirki::add_field('theme_config_id', [
		'type'        => 'image',
		'settings'    => 'image_quiz_logo_url',
		'label'       => esc_html__('Logo for Quiz page', 'kirki'),

		'section'     => 'quiz_page',
		'default'     => '',

	]);

	///cart 
	Kirki::add_section('cart_page', array(
		'title'          => esc_html__('Cart page', 'kirki'),
		'description'    => esc_html__('Cart page fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 160,
	));
	Kirki::add_field('theme_config_id', [
		'type'        => 'background',
		'settings'    => 'image_cart_url_bg',
		'label'       => esc_html__('Background on Cart page', 'kirki'),
		'description' => esc_html__('Background conrols', 'kirki'),
		'section'     => 'cart_page',
		'default'     => [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center left',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output' => [
			[
				'element' => '.lp_cart_wrap'
			]
		]

	]);

	//General
	Kirki::add_section('general', array(
		'title'          => esc_html__('General', 'kirki'),
		'description'    => esc_html__('General fields', 'kirki'),
		'panel'          => 'panel_id',
		'priority'       => 140,
	));
	Kirki::add_field('theme_config_id', [
		'type'        => 'image',
		'settings'    => 'image_menu_url_closed',
		'label'       => esc_html__('Logo Menu Closed', 'kirki'),
		'description' => esc_html__('Logo on menu closed', 'kirki'),
		'section'     => 'general',
		'default'     => '',
		'priority' => 10,
	]);
	Kirki::add_field('theme_config_id', [
		'type'        => 'image',
		'settings'    => 'image_menu_url',
		'label'       => esc_html__('Logo Menu Opened', 'kirki'),
		'description' => esc_html__('Logo on menu opened', 'kirki'),
		'section'     => 'general',
		'default'     => '',
		'priority' => 10,
	]);
	Kirki::add_field('theme_config_id', [
		'type'     => 'text',
		'settings' => 'phone_co2',
		'label'    => esc_html__('Phone', 'kirki'),
		'section'  => 'general',
		'default'  => esc_html__('', 'kirki'),
		'priority' => 10,
	]);
	Kirki::add_field('theme_config_id', [
		'type'     => 'text',
		'settings' => 'email_co2',
		'label'    => esc_html__('Email', 'kirki'),
		'section'  => 'general',
		'default'  => esc_html__('', 'kirki'),
		'priority' => 10,
	]);

	Kirki::add_field('theme_config_id', [
		'type'     => 'textarea',
		'settings' => 'addr_co2',
		'label'    => esc_html__('Address', 'kirki'),
		'section'  => 'general',
		'default'  => esc_html__('', 'kirki'),
		'priority' => 10,
	]);

	Kirki::add_field('theme_config_id', [
		'type'     => 'textarea',
		'settings' => 'footer_copyright',
		'label'    => esc_html__('Footer @Copyright text', 'kirki'),
		'section'  => 'general',
		'default'  => esc_html__('This is a default value', 'kirki'),
		'priority' => 10,
	]);
}


////Comming soon pages

function hellenik_posts_column_rec($columns)
{
	$columns['post_rec'] = __('Comming soon', 'hellenik');
	return $columns;
}

add_filter('manage_page_posts_columns', 'hellenik_posts_column_rec');

function hellenik_posts_custom_column_rec($column)
{


	if ($column === 'post_rec') {
		echo "<input type='checkbox' class='hellenik-post-rec' data-postID='" . get_the_ID() . "' " . checked('yes', get_post_meta(get_the_ID(), 'post-rec', true), false) . "/><small style='display:block;color: #7ad03a;'></small>";
	}
}
add_action('manage_page_posts_custom_column', 'hellenik_posts_custom_column_rec');

add_action('admin_footer', 'co2_jquery_event');
function co2_jquery_event()
{

	echo "<script>jQuery(function($){
		$('.hellenik-post-rec').click(function(){
			var checkbox = $(this),
			    checkbox_value = (checkbox.is(':checked') ? 'yes' : 'no' );
			$.ajax({
				type: 'POST',
				data: {
					action: 'post_recommend', 
					value: checkbox_value,
					post_id: checkbox.attr('data-postID'),
					myajaxnonce : '" . wp_create_nonce("activatingcheckbox") . "'
				},
				beforeSend: function( xhr ) {
					checkbox.prop('disabled', true );
				},
				url: ajaxurl, 
				success: function(data){
					checkbox.prop('disabled', false ).next().html(data).show().fadeOut(2000);
				}
			});
		});
	});</script>";
}

add_action('wp_ajax_post_recommend', 'hellenik_recommend_process_ajax');
function hellenik_recommend_process_ajax()
{

	check_ajax_referer('activatingcheckbox', 'myajaxnonce');

	if (update_post_meta($_POST['post_id'], 'post-rec', $_POST['value'])) {
		echo 'Saved';
	}

	wp_die();
}


/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_co2__breadcrumb()
{

	$sep = '<span class="breadcrumbs_delimiter"></span>';

	if (!is_front_page() && !is_page_template('templates/for-cryptocurrency.php')) {

		// Start the breadcrumb with a link to your homepage
		echo '<div class="breadcrumbs">';
		echo '<a href="';
		echo get_option('home');
		echo '">';
		echo get_the_title(get_option('page_on_front'));
		echo '</a>' . $sep;

		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if (is_category() || is_single()) {
			the_category('title_li=');
		} elseif (is_archive() || is_single()) {
			if (is_day()) {
				printf(__('%s', 'text_domain'), get_the_date());
			} elseif (is_month()) {
				printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
			} elseif (is_year()) {
				printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
			} else {
				_e('Blog Archives', 'text_domain');
			}
		}

		// If the current page is a single post, show its title with the separator
		if (is_single()) {
			// echo $sep;
			the_title('<span>', '</span>');
		}

		// If the current page is a static page, show its title.
		if (is_page()) {
			echo the_title('<span>', '</span>');
		}

		// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
		if (is_home()) {
			global $post;
			$page_for_posts_id = get_option('page_for_posts');
			if ($page_for_posts_id) {
				$post = get_page($page_for_posts_id);
				setup_postdata($post);
				the_title();
				rewind_posts();
			}
		}


		echo '</div>';
	}
}

add_filter('body_class', 'add_custom_classes_body', 10, 2);

function add_custom_classes_body($classes, $class)
{
	if (is_page(9)) {
		$classes[] = 'bitcoin_co2';
	}
	if (is_page(47)) {
		$classes[] = 'lp';
	}
	return $classes;
}

// Modify woocommerce quantity input

function co2_quantity_input($args = array(), $product = null, $echo = true, $method = 'quantity')
{
	if (is_null($product)) {
		$product = $GLOBALS['product'];
	}

	$defaults = array(
		'input_id'     => uniqid('quantity_'),
		'input_name'   => 'quantity',
		'input_value'  => '1',
		'classes'      => apply_filters('woocommerce_quantity_input_classes', array('input-text', 'qty', 'text'), $product),
		'max_value'    => apply_filters('woocommerce_quantity_input_max', -1, $product),
		'min_value'    => apply_filters('woocommerce_quantity_input_min', 0, $product),
		'step'         => apply_filters('woocommerce_quantity_input_step', 1, $product),
		'pattern'      => apply_filters('woocommerce_quantity_input_pattern', has_filter('woocommerce_stock_amount', 'intval') ? '[0-9]*' : ''),
		'inputmode'    => apply_filters('woocommerce_quantity_input_inputmode', has_filter('woocommerce_stock_amount', 'intval') ? 'numeric' : ''),
		'product_name' => $product ? $product->get_title() : '',
		'placeholder'  => apply_filters('woocommerce_quantity_input_placeholder', '', $product),
	);
	$product_price = absint($product->get_price());

	$args = apply_filters('woocommerce_quantity_input_args', wp_parse_args($args, $defaults), $product);

	// Apply sanity to min/max args - min cannot be lower than 0.
	$args['min_value'] = max($args['min_value'], 0);
	$args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : '';

	// Max cannot be lower than min if defined.
	if ('' !== $args['max_value'] && $args['max_value'] < $args['min_value']) {
		$args['max_value'] = $args['min_value'];
	}

	ob_start();
?>

	<?php if ($method == 'quantity') : ?>
		<div class="co2-quantity-wrapper buy_from_choose">
			<?php if (!empty($args['price'])) : ?>
				<?php $index = 0; ?>
				<?php foreach ($args['price'] as $input) : ?>
					<?php
					$index++;
					$quantity = floor(absint($input) / $product_price); ?>
					<div class="buy_from_choose_item <?php echo $index === 1 ? 'active' : ''; ?>">
						<input type="radio" id="co2-<?php echo $input ?>" name="<?php echo $args['input_name'] ?>" value="<?php echo $quantity ?>" <?php echo $index === 1 ? 'checked' : ''; ?>>
						<label for="co2-<?php echo $input ?>" class="co2-quantity-label co2-<?php echo $input ?>-label" data-tab="tab-<?php echo $input; ?>"><?php echo wc_price($input) ?></label>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>
			<div class="buy_from_choose_item">
				<input type="radio" id="co2-manual" name="<?php echo $args['input_name'] ?>" value="">
				<label for="co2-manual" class="co2-manual-label" data-tab="tab-manual"><?php _e('Manual', 'co2') ?></label>
			</div>
		</div>
		<div class='co2-display-wrapper'>
			<?php if (!empty($args['price'])) : ?>
				<?php foreach ($args['price'] as $input) : ?>
					<?php $quantity = floor(absint($input) / $product_price); ?>
					<div class="buy_from_count" id="tab-<?php echo $input; ?>">

						<div class="buy_from_count_tons">

							<div class="buy_from_count_text">Amount, $</div>
							<div class="buy_from_count_num co2-display-method">
								<?php echo $input; ?>
							</div>
						</div>
						<div class="buy_from_count_tons">
							<div class="buy_from_count_text">Offsets transactions</div>
							<div class="buy_from_count_num"><span><?php echo $quantity; ?></span></div>
						</div>

					</div>

				<?php endforeach; ?>
			<?php endif; ?>
			<div class="buy_from_count" id="tab-manual">

				<div class="buy_from_count_tons">

					<div class="buy_from_count_text">Amount, €</div>
					<div class="buy_from_count_num co2-display-method">
						<?php
						wc_get_template('global/quantity-input.php', $args);
						?>
					</div>
				</div>
				<div class="buy_from_count_tons">
					<div class="buy_from_count_text">Offsets transactions</div>
					<div class="buy_from_count_num"><span>0</span></div>
				</div>

			</div>
		</div>
		<script>
			let product_price = <?php echo json_encode($product_price); ?>;
		</script>

	<?php else : ?>


		<script>
			let product_price_2 = <?php echo json_encode($product_price); ?>;
		</script>
		<div class="co2-price-wrapper buy_from_choose">
			<?php if (!empty($args['quantity'])) : ?>
				<?php $index = 0; ?>
				<?php foreach ($args['quantity'] as $input) : ?>
					<?php
					$index++;
					$price = absint($input) * $product_price; ?>
					<div class="buy_from_choose_item <?php echo $index === 1 ? 'active' : ''; ?>">
						<input type="radio" id="co2-<?php echo $input ?>" name="<?php echo $args['input_name'] ?>" value="<?php echo absint($input) ?>" <?php echo $index === 1 ? 'checked' : ''; ?>>
						<label for="co2-<?php echo $input ?>" class="co2-quantity-label co2-<?php echo $input ?>-label" data-tab="tab-<?php echo $input; ?>"><?php echo $input . ' t';  ?></label>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>
			<div class="buy_from_choose_item">
				<input type="radio" id="co2-manual-price" name="<?php echo $args['input_name'] ?>" value="">
				<label for="co2-manual-price" class="co2-manual-label" data-tab="tab-manual-price"><?php _e('Manual', 'co2') ?></label>
			</div>
		</div>
		<div class='co2-display-wrapper'>
			<?php if (!empty($args['quantity'])) : ?>
				<?php foreach ($args['quantity'] as $input) : ?>
					<?php $price = absint($input) * $product_price; ?>
					<div class="buy_from_count" id="tab-<?php echo $input; ?>">

						<div class="buy_from_count_tons">

							<div class="buy_from_count_text">Tones of CO₂</div>
							<div class="buy_from_count_num co2-display-method">
								<?php echo $input; ?>
							</div>
						</div>
						<div class="buy_from_count_tons">
							<div class="buy_from_count_text">Total Amount</div>
							<div class="buy_from_count_num"><span><?php echo wc_price($price); ?></span></div>
						</div>

					</div>

				<?php endforeach; ?>
			<?php endif; ?>
			<div class="buy_from_count" id="tab-manual-price">

				<div class="buy_from_count_tons">

					<div class="buy_from_count_text">Tones of CO₂</div>
					<div class="buy_from_count_num co2-display-method">
						<?php
						wc_get_template('global/quantity-input.php', $args);
						?>
					</div>
				</div>
				<div class="buy_from_count_tons">
					<div class="buy_from_count_text">Total Amount</div>
					<div class="buy_from_count_num"><span><?php echo wc_price($product_price); ?></span></div>
				</div>

			</div>
		</div>

	<?php endif; ?>
	<?php



	if ($echo) {
		echo ob_get_clean();
	} else {
		return ob_get_clean();
	}
}

// add_action('wp_ajax_detect_method', 'co2_detect_selected_field');
// add_action('wp_ajax_nopriv_detect_method', 'co2_detect_selected_field');
// function co2_detect_selected_field()
// {
// 	$args = [];
// 	if ($_POST['method'] == 'manual') {
// 		$args[] = 'manual';
// 		ob_start();
// 		wc_get_template('global/quantity-input.php');
// 		$manual =  ob_get_clean();
// 		wp_send_json(array(
// 			'method' => $args,
// 			'html' => $manual
// 		));
// 	} elseif ($_POST['method'] == 'quantity_field') {
// 		$args[] = 'quantity_field';
// 	}
// 	wp_die();
// }

add_filter('woocommerce_add_to_cart_redirect', 'redirect_function_co2', 10, 2);
function redirect_function_co2($url, $adding_to_cart)
{
	$url = wc_get_cart_url();

	return $url;
}

add_action('co2_quiz_result_calculation', 'co2_quiz_result_calc', 10, 1);

function co2_quiz_result_calc($post)
{

	if (!wp_verify_nonce($post['co2_quiz_name'], 'co2_quiz_action')) {
		return;
	}
	if (isset($post['quiz_result'])) {

		unset($post['_wp_http_referer']);
		unset($post['quiz_result']);
		unset($post['co2_quiz_name']);
		$sum = 0;
		foreach ($post as $field) {
			$sum += (float)$field;
		}

		$GLOBALS['quiz_sum'] = ceil($sum);
	} elseif (isset($post['co2-add-to-cart'])) {
		$quantity = $post['quantity'];
		$GLOBALS['co2_quantity'] = $quantity;
	} else {
		return false;
	}
}
/// Remove featured image form slider
add_filter('woocommerce_single_product_image_thumbnail_html', 'remove_featured_image', 10, 2);
function remove_featured_image($html, $attachment_id)
{
	global $post, $product;

	$featured_image = get_post_thumbnail_id($post->ID);

	if ($attachment_id == $featured_image)
		$html = '';

	return $html;
}

//Single product page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_single_product_summary', 'co2_display_category_single', 3);
function co2_display_category_single()
{
	global $product;
	echo wc_get_product_category_list($product->get_id(), ', ', '<span class="project_page_label">', '</span>');
}
add_action('woocommerce_single_product_summary', 'co2_display_title_single', 5);
function co2_display_title_single()
{
	the_title('<h1 class="project_page_title">', '</h1>');
}


add_filter('wc_add_to_cart_message', 'remove_add_to_cart_message');

function remove_add_to_cart_message()
{
	return;
}

add_filter('woocommerce_single_product_carousel_options', 'viibe_update_woo_flexslider_options');

function viibe_update_woo_flexslider_options($options)
{

	$options['directionNav'] = true;
	$options['controlNav'] = false;
	$options['prevText'] = '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 11.5L7.5 9.78125L3.83333 6L7.5 2.21875L5.83333 0.499999L0.5 6L5.83333 11.5Z" fill="white"></path>
</svg>';
	$options['nextText'] = '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M2.16667 11.5L0.5 9.78125L4.16667 6L0.5 2.21875L2.16667 0.499999L7.5 6L2.16667 11.5Z" fill="white"></path>
</svg>';



	return $options;
}
add_action('woocommerce_after_single_product_summary', 'co2_main_info_project');
function co2_main_info_project()
{
	?>
	<div class="row">
		<div class="project_page_left">
			<div class="row">
				<div class="project_page_left_col1">
					<div class="project_page_left_title">Project status:</div>
					<div class="project_page_left_text"><?php echo get_field('project_status'); ?></div>
				</div>
				<div class="project_page_left_col2">
					<div class="project_page_left_title">Standards:</div>
					<div class="project_page_left_text"><?php echo get_field('project_standards'); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="project_page_left_col1">
					<div class="project_page_left_title">Annual CO₂ reduction:</div>
					<div class="project_page_left_text"><?php echo get_field('project_reduction'); ?></div>
				</div>
				<div class="project_page_left_col2">
					<div class="project_page_left_title">Remaining availability:</div>
					<div class="project_page_left_text"><?php echo get_field('project_remaining'); ?></div>
				</div>
			</div>
		</div>
		<div class="project_page_right">
			<div class="project_page_right_text">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
<?php
}
add_action('woocommerce_after_single_product', 'co2_buy_project');
function co2_buy_project()
{
	global $product;
?>
	<section class="bottom_form">
		<div class="container">
			<div class="row">
				<div class="buy_from">
					<div class="buy_from_title">Buy offsets</div>
					<div class="buy_from_subtitle"><?php the_title(); ?></div>
					<div class="buy_from_choose_text">Choose Tones of CO2:</div>
					<?php do_action('co2_before_add_to_cart_form'); ?>

					<form class="cart price_method" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
						<?php do_action('co2_before_add_to_cart_button'); ?>

						<?php
						do_action('co2_before_add_to_cart_quantity');



						co2_quantity_input(array(
							'quantity' => array('3', '6', '18'),

							'classes'      => apply_filters('woocommerce_quantity_input_classes', array('input-text', 'qty', 'text', 'quantity'), $product)
						), $product, true, 'price');

						do_action('co2_after_add_to_cart_quantity');
						?>

						<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt buy_from_btn"><?php _e('Offset now', 'co2') ?></button>

						<?php do_action('woocommerce_after_add_to_cart_button'); ?>
					</form>

					<?php do_action('co2_after_add_to_cart_form'); ?>
					<div class="buy_from_calc">Not sure about amount? Calculate your lifestyle!</div>
					<div class="home_main_item_link"><a href="<?php echo get_permalink(125); ?>">Take a 90s quiz</a></div>
				</div>
			</div>
		</div>
	</section>
<?php
}
