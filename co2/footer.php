<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package co2
 */

?>

<footer>
	<div class="container">
		<div class="row">
			<div class="footer_info">
				<div class="footer_logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="footer_phone"></div>
				<div class="footer_email"><a href="mailto:<?php echo get_theme_mod('email_co2', ''); ?>" target="blank"><?php echo get_theme_mod('email_co2', ''); ?></a></div>
			</div>
			<?php if (is_active_sidebar('footer-2')) : ?>
				<?php dynamic_sidebar('footer-2') ?>

			<?php endif; ?>
			<?php if (is_active_sidebar('footer-3')) : ?>
				<?php dynamic_sidebar('footer-3') ?>

			<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<!-- <div class="footer_copy">© 2020 — 2021 ImpactScope. <span>All Rights Reserved<span></div> -->
			<div class="footer_copy"><?php echo get_theme_mod('footer_copyright', ''); ?></div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>