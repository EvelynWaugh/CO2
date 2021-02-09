<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package co2
 */

?>



<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

	<style>
		body.home {
			background-image: url('<?php echo get_theme_mod('image_home_url_bg')['background-image']; ?>');
			background-color: <?php echo get_theme_mod('image_home_url_bg')['background-color']; ?>;
			background-repeat: <?php echo get_theme_mod('image_home_url_bg')['background-repeat']; ?>;
			background-position: <?php echo get_theme_mod('image_home_url_bg')['background-position']; ?>;
			background-size: <?php echo get_theme_mod('image_home_url_bg')['background-size']; ?>;
			background-attachment: <?php echo get_theme_mod('image_home_url_bg')['background-attachment']; ?>;
		}
	</style>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<header>
		<div class="logo">

			<a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_theme_mod('image_menu_url_closed', ''); ?>" alt=""></a>
		</div>
		<div class="breadcrumbs_wrap">
			<?php if (!is_home()) : ?>
				<?php the_co2__breadcrumb(); ?>
			<?php endif; ?>
		</div>
		<a href="<?php echo wc_get_cart_url(); ?>" class="menu_cart">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M3.63595 3.90554L6.27965 23.542C6.40953 24.5077 6.90903 25.4025 7.67512 26.0667C8.11498 26.4481 8.61838 26.7321 9.15277 26.9052C8.99149 27.3219 8.90304 27.7741 8.90304 28.2459C8.90304 30.32 10.6052 32 12.69 32C14.7748 32 16.477 30.32 16.477 28.2459C16.477 27.847 16.4135 27.4625 16.2964 27.1017H19.9654C19.8483 27.4625 19.7848 27.847 19.7848 28.2459C19.7848 30.32 21.487 32 23.5718 32C25.6566 32 27.3588 30.32 27.3588 28.2459C27.3588 27.847 27.2952 27.4625 27.1782 27.1017H29.0126C29.7345 27.1017 30.3265 26.5209 30.3265 25.7968C30.3265 25.0725 29.7344 24.492 29.0126 24.492H10.3818C9.67201 24.492 8.9768 23.8853 8.88394 23.1959L8.75034 22.2032H15.4793L15.493 22.2034L15.5066 22.2032H21.4147L21.4283 22.2034L21.442 22.2032H26.5395C27.52 22.2032 28.4801 21.8323 29.2462 21.1684C30.0123 20.5042 30.5118 19.6091 30.6417 18.6435L31.9664 8.80408C32.1034 7.78609 31.819 6.80557 31.156 6.05548C30.4933 5.30568 29.5513 4.8983 28.5179 4.8983H6.42077L6.24047 3.5596C6.10891 2.58322 5.69933 1.704 5.12399 1.06292C4.55011 0.423471 3.78939 0 2.96252 0H1.31381C0.591743 0 0 0.580593 0 1.30488C0 2.02916 0.591743 2.60976 1.31381 2.60976H2.94074C2.94976 2.61366 2.97133 2.62401 3.00575 2.64883C3.07063 2.69561 3.15381 2.77493 3.24018 2.8903C3.41204 3.11988 3.57681 3.46604 3.63595 3.90554ZM29.1814 7.77742C29.326 7.94103 29.4001 8.1754 29.3619 8.45771L28.852 12.2459H23.3266L23.6454 7.50806H28.5179C28.8094 7.50806 29.0366 7.61353 29.1814 7.77742ZM13.8494 28.2459C13.8494 28.8731 13.3326 29.3903 12.69 29.3903C12.0476 29.3903 11.5307 28.873 11.5307 28.2459C11.5307 27.619 12.0476 27.1017 12.69 27.1017C13.3327 27.1017 13.8494 27.619 13.8494 28.2459ZM24.7312 28.2459C24.7312 28.8731 24.2144 29.3903 23.5718 29.3903C22.9292 29.3903 22.4124 28.8731 22.4124 28.2459C22.4124 27.619 22.9291 27.1017 23.5718 27.1017C24.2144 27.1017 24.7312 27.619 24.7312 28.2459ZM20.1984 19.5934H16.7227L16.4037 14.8556H20.5174L20.1984 19.5934ZM15.9092 7.50806L16.228 12.2459H20.6931L21.0119 7.50806H15.9092ZM13.5945 12.2459L13.2757 7.50806H6.77191L7.40977 12.2459H13.5945ZM13.7702 14.8556H7.76114L8.399 19.5934H14.0892L13.7702 14.8556ZM26.5395 19.5934H22.8318L23.1509 14.8556H28.5007L28.0374 18.2977C27.9445 18.9869 27.2492 19.5934 26.5395 19.5934Z" fill="white"></path>
			</svg>
			<span></span>
		</a>
		<div class="menu_btn">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M3.2 0C4.95999 0 6.39999 1.44 6.39999 3.2C6.39999 4.95999 4.95999 6.39999 3.2 6.39999C1.44 6.39999 0 4.95999 0 3.2C0 1.44 1.44 0 3.2 0Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M3.2 12.7998C4.95999 12.7998 6.39999 14.2398 6.39999 15.9998C6.39999 17.7598 4.95999 19.1998 3.2 19.1998C1.44 19.1998 0 17.7598 0 15.9998C0 14.2398 1.44 12.7998 3.2 12.7998Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M3.2 24.8887C4.95999 24.8887 6.39999 26.3287 6.39999 28.0887C6.39999 29.8487 4.95999 31.2887 3.2 31.2887C1.44 31.2887 0 29.8487 0 28.0887C0 26.3287 1.44 24.8887 3.2 24.8887Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M16.0008 0C17.7608 0 19.2008 1.44 19.2008 3.2C19.2008 4.95999 17.7608 6.39999 16.0008 6.39999C14.2408 6.39999 12.8008 4.95999 12.8008 3.2C12.8008 1.44 14.2408 0 16.0008 0Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M16.0008 12.7998C17.7608 12.7998 19.2008 14.2398 19.2008 15.9998C19.2008 17.7598 17.7608 19.1998 16.0008 19.1998C14.2408 19.1998 12.8008 17.7598 12.8008 15.9998C12.8008 14.2398 14.2408 12.7998 16.0008 12.7998Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M16.0008 25.6001C17.7608 25.6001 19.2008 27.0401 19.2008 28.8001C19.2008 30.5601 17.7608 32.0001 16.0008 32.0001C14.2408 32.0001 12.8008 30.5601 12.8008 28.8001C12.8008 27.0401 14.2408 25.6001 16.0008 25.6001Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M28.7996 0C30.5596 0 31.9996 1.44 31.9996 3.2C31.9996 4.95999 30.5596 6.39999 28.7996 6.39999C27.0396 6.39999 25.5996 4.95999 25.5996 3.2C25.5996 1.44 27.0396 0 28.7996 0Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M28.7996 12.7998C30.5596 12.7998 31.9996 14.2398 31.9996 15.9998C31.9996 17.7598 30.5596 19.1998 28.7996 19.1998C27.0396 19.1998 25.5996 17.7598 25.5996 15.9998C25.5996 14.2398 27.0396 12.7998 28.7996 12.7998Z" fill="white" />
				<path fill-rule="evenodd" clip-rule="evenodd" d="M28.7996 25.6001C30.5596 25.6001 31.9996 27.0401 31.9996 28.8001C31.9996 30.5601 30.5596 32.0001 28.7996 32.0001C27.0396 32.0001 25.5996 30.5601 25.5996 28.8001C25.5996 27.0401 27.0396 25.6001 28.7996 25.6001Z" fill="white" />
			</svg>
		</div>
	</header>
	<div class="menu_layout" style="display:none;"></div>
	<div class="menu" style="display:none;">
		<header>
			<div class="logo">
				<a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_theme_mod('image_menu_url', ''); ?>" alt=""></a>
			</div>
			<div class="menu_btn">
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="24.3477" y="-0.000488281" width="5.165" height="34.4333" transform="rotate(45 24.3477 -0.000488281)" fill="#171A1E" />
					<rect x="28" y="24.3477" width="5.165" height="34.4333" transform="rotate(135 28 24.3477)" fill="#171A1E" />
				</svg>

			</div>
		</header>
		<div class="menu_items">
			<div class="container">
				<div class="row">
					<div class="menu_item_col_1">
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => 'div',
							'container_class' => "menu_item_col_2",
							'menu_class' => 'co2-menu-left'
						)
					);
					?>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'container' => 'div',
							'container_class' => "menu_item_col_3",
							'menu_class' => 'co2-menu-right'
						)
					);
					?>

				</div>
			</div>
		</div>
	</div>