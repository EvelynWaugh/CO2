<?php

/**
 * Template Name: 'What is offsetting'
 */

get_header();

?>
<style>
    .type_page {

        background-image: url('<?php echo get_theme_mod('image_what_url_bg')['background-image'] ?>');
        background-size: <?php echo get_theme_mod('image_what_url_bg')['background-size'] ?>;
        background-position: <?php echo get_theme_mod('image_what_url_bg')['background-position'] ?>;
        background-repeat: <?php echo get_theme_mod('image_what_url_bg')['background-repeat'] ?>
    }
</style>
<main>
    <section class="type_page">
        <div class="container">
            <div class="row">
                <div class="type_page_left">
                    <div class="type_page_left_title">What is offsetting?</div>
                </div>
                <div class="type_page_right">
                    <div class="type_page_main_img_wrap">
                        <img src="<?php echo get_field('picture_what'); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row type_page_row_next">
                <div class="type_page_left">
                </div>
                <div class="type_page_right">
                    <div class="type_page_right_text">
                        <?php echo get_field('content_what'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
?>