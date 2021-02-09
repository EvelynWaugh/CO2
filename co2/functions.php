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
	wp_enqueue_style('main_style', CO2_ASSETS . 'css/style.css', [], '1.0.0', 'all');
	wp_enqueue_style('main_style_media', CO2_ASSETS . 'css/media.css', [], '1.0.0', 'all');

	// wp_enqueue_script('co2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('co2-main-js', CO2_ASSETS . '/js/scripts.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'co2_scripts');

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

	if (!is_front_page()) {

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
			echo $sep;
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
	return $classes;
}
