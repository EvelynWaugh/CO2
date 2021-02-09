<?php get_header(); ?>


<main>
    <section class="about_us">
        <div class="container">
            <div class="row">
                <div class="about_us_title"><?php the_title(); ?></div>
            </div>
            <div class="row about_us_row_1">
                <div class="about_us_left">
                    <div class="about_us_logo_block">
                        <div class="about_us_logo_block_img">
                            <img src="<?php echo get_field('logo_about'); ?>" alt="">
                        </div>
                        <div class="about_us_logo_block_text">
                            <?php echo get_field('logo_desc'); ?>
                        </div>
                    </div>

                </div>
                <div class="about_us_right">
                    <?php echo get_field('text_first_about'); ?>
                </div>
            </div>
            <div class="row about_us_row_2">
                <div class="about_us_left">
                    <?php echo get_field('text_second_about'); ?>

                </div>
                <div class="about_us_right">
                    <div class="about_us_right_img">
                        <img src="<?php echo get_field('picture_about'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>