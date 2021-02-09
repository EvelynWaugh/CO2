<?php get_header(); ?>


<main>
    <section class="type_page apis_page">
        <div class="container">
            <div class="row">
                <div class="type_page_left">
                    <div class="type_page_left_title"><?php the_title(); ?></div>
                </div>
                <div class="type_page_right">
                    <div class="type_page_main_img_wrap">
                        <img src="<?php echo get_field('picture_api'); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row type_page_row_next">
                <div class="type_page_left">
                    <div class="type_page_left_subtitle">Contact us today for a demo <a href="maito:<?php echo get_theme_mod('email_co2', ''); ?>" target="blank"><?php echo get_theme_mod('email_co2', ''); ?></a></div>
                </div>
                <div class="type_page_right">
                    <div class="type_page_right_text">
                        <?php echo get_field('content_api'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>