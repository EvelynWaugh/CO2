<?php

/**
 * Template Name: Main shop
 */
get_header();

?>

<main>
    <section class="lp_one_screen">
        <div class="lp_one_screen_bg">

        </div>
        <?php
        $product = wc_get_product(142);

        ?>
        <div class="container">
            <div class="row lp_one_screen_row">
                <div class="lp_one_screen_form">
                    <div class="buy_from">
                        <div class="buy_from_title">9€ can offset each 3 onchain BTC transfers </div>
                        <div class="buy_from_choose_text">Choose amount to offset:</div>

                        <?php do_action('co2_before_add_to_cart_form'); ?>

                        <form class="cart quantity_method" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                            <?php do_action('co2_before_add_to_cart_button'); ?>

                            <?php
                            do_action('co2_before_add_to_cart_quantity');



                            co2_quantity_input(array(
                                'price' => array('9', '27', '56'),

                                'classes'      => apply_filters('woocommerce_quantity_input_classes', array('input-text', 'qty', 'text', 'price'), $product)
                            ), $product, true, 'quantity');

                            do_action('co2_after_add_to_cart_quantity');
                            ?>

                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt buy_from_btn"><?php _e('Offset now', 'co2') ?></button>

                            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                        </form>

                        <?php do_action('co2_after_add_to_cart_form'); ?>



                        <div class="buy_from_calc">Not sure about your output? Calculate your lifestyle!</div>
                        <div class="home_main_item_link"><a href="<?php echo get_permalink(164); ?>">Take a 90s quiz</a></div>
                    </div>
                </div>
                <div class="lp_one_screen_info">
                    <div class="lp_one_screen_info_gray">
                        It doesn’t metter if you send equivalent of 20 € or 10.000 €
                    </div>
                    <div class="lp_one_screen_info_head">
                        Onchain Bitcoin transaction equals approx. 325 kg of CO₂
                    </div>
                </div>
            </div>
        </div>
        <div class="lp_one_screen_row2">
            <div class="lp_one_screen_people">
                <div class="lp_one_screen_people_white">256.490 Tons of CO₂</div>
                <div class="lp_one_screen_people_gray">Already offsetted by 324.789 people</div>
            </div>
            <div class="lp_one_screen_slider">
                <div class="lp_one_screen_slider_line">
                    <div class="lp_one_screen_slider_line_track"></div>
                </div>
                <div class="lp_one_screen_slider_info_line">
                    <div class="lp_one_screen_slider_info_q">Do you know?</div>
                    <div class="lp_one_screen_slider_info_slide_num"><span>01</span> — 03</div>
                </div>
                <div class="lp_one_screen_slides">
                    <div class="lp_one_screen_slide">
                        <div class="lp_one_screen_slide_icon"><img src="/img/lp_one_slide_icon.svg" alt=""></div>
                        <div class="lp_one_screen_slide_title">Avg. flight ≈ 325 kg CO₂</div>
                        <div class="lp_one_screen_slide_text">A single onchain wallet to wallet bitcoin transfer has the same carbon footprint as a return flight from Washington to New York. 325 kgs of CO₂ (716 pounds)</div>
                    </div>
                    <div class="lp_one_screen_slide">
                        <div class="lp_one_screen_slide_icon"><img src="/img/lp_one_slide_icon.svg" alt=""></div>
                        <div class="lp_one_screen_slide_title">Avg. flight ≈ 325 kg CO₂</div>
                        <div class="lp_one_screen_slide_text">A single onchain wallet to wallet bitcoin transfer has the same carbon footprint as a return flight from Washington to New York. 325 kgs of CO₂ (716 pounds)</div>
                    </div>
                    <div class="lp_one_screen_slide">
                        <div class="lp_one_screen_slide_icon"><img src="/img/lp_one_slide_icon.svg" alt=""></div>
                        <div class="lp_one_screen_slide_title">Avg. flight ≈ 325 kg CO₂</div>
                        <div class="lp_one_screen_slide_text">A single onchain wallet to wallet bitcoin transfer has the same carbon footprint as a return flight from Washington to New York. 325 kgs of CO₂ (716 pounds)</div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(function() {
                    jQuery('.lp_one_screen_slides').slick({
                        dots: false,
                        infinite: true,
                        arrows: false,
                        slidesToShow: 1,
                        adaptiveHeight: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                    });
                });
                jQuery('.lp_one_screen_slides').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                    resetProgressBar();
                });
                jQuery('.lp_one_screen_slides').on('afterChange', function(event, slick, currentSlide, nextSlide) {
                    jQuery('.lp_one_screen_slider_info_slide_num').text(currentSlide + 1 + ' — ' + slick.slideCount);
                    startProgressBar();
                });
                jQuery('.lp_one_screen_slides').on('init reInit', function(event, slick) {
                    startProgressBar();
                    jQuery('.lp_one_screen_slider_info_slide_num').text(1 + ' — ' + slick.slideCount);
                })

                function startProgressBar() {
                    jQuery('.lp_one_screen_slider_line_track').css({
                        width: '100%',
                        transition: 'width 3000ms'
                    });
                }

                function resetProgressBar() {
                    jQuery('.lp_one_screen_slider_line_track').css({
                        width: '0%',
                        transition: 'width 0ms'
                    });
                }
            </script>

        </div>
    </section>
    <div class="lp_bg">
        <section class="lp_about_us">
            <div class="container">
                <div class="lp_about_us_label">About Us</div>
                <div class="row">
                    <div class="lp_about_us_left">
                        <div class="lp_about_us_left_title">How is Bitcoin impacting the planet?</div>
                    </div>
                    <div class="lp_about_us_right">
                        <p>It takes four times more energy to mine $1 of bitcoin than it does to mine $1 of gold. In 2020 bitcoin's electricity consumption will exceed 70 terawatt hours. That's more than the annual electricity consumption of Austria.</p>
                        <p>It takes four times more energy to mine $1 of bitcoin than it does to mine $1 of gold. In 2020 bitcoin's electricity consumption will exceed 70 terawatt hours. That's more than the annual electricity consumption of Austria.</p>
                        <p>It takes four times more energy to mine $1 of bitcoin than it does to mine $1 of gold. In 2020 bitcoin's electricity consumption will exceed 70 terawatt hours. That's more than the annual electricity consumption of Austria.</p>
                    </div>
                </div>
                <div class="row lp_about_us_row2">
                    <div class="lp_about_us_left">
                        <div class="about_us_logo_block">
                            <div class="about_us_logo_block_img">
                                <img src="img/about_us_logo.svg" alt="">
                            </div>
                            <div class="about_us_logo_block_text">
                                Offsetting<br>
                                Bitcoin’s<br>
                                Emissions<br>
                            </div>
                        </div>
                    </div>
                    <div class="lp_about_us_right">
                        <div class="lp_about_us_right_text">Usage of the Bitcoin is becoming more common due to rapid advancement of technology and the power of globalization</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="lp_slider_block">
            <div class="container">
                <div class="lp_slider_title">You can support different carbon offset projects</div>
            </div>
            <div class="lp_slider_wrap">
                <div class="lp_slider">
                    <?php
                    $_products = wc_get_products([
                        'exclude' => array(142, 143),
                    ]);

                    foreach ($_products as $product) {
                        $image_url = $product->get_image();
                        $product_name = $product->get_name();
                        $tones = get_field('tones_of_co2', $product->get_id())
                    ?>
                        <div class="lp_slide_wrap">
                            <div class="lp_slide">
                                <div class="lp_slide_top">
                                    <img src="/img/lp_slider_cloud.svg" alt="">
                                    <div><?php echo $tones; ?></div>
                                </div>
                                <?php echo $image_url; ?>
                                <div class="lp_slide_bottom"><?php echo $product_name;  ?></div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>

            </div>
        </section>
    </div>
    <section class="bottom_form">
        <div class="container">
            <div class="row bottom_form_top">
                <div class="bottom_form_head_title">Prevent hidden threat of Bitcoin!</div>
                <div class="bottom_form_head_text">It takes four times more energy to mine $1 of bitcoin than it does to mine $1 of gold. In 2020 bitcoin's electricity consumption will exceed 70 terawatt hours. That's more than the annual electricity consumption of Austria. </div>
            </div>
            <div class="row">
                <div class="buy_from">
                    <div class="buy_from_title">Offset your crypto carbon foorprint!</div>
                    <div class="buy_from_choose_text">Choose Tones of CO₂:</div>


                    <?php
                    $product = wc_get_product(143);
                    ?>
                    <?php do_action('co2_before_add_to_cart_form'); ?>

                    <form class="cart price_method" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                        <?php do_action('co2_before_add_to_cart_button'); ?>

                        <?php
                        do_action('co2_before_add_to_cart_quantity');



                        co2_quantity_input(array(
                            'quantity' => array('1', '5', '10'),

                            'classes'      => apply_filters('woocommerce_quantity_input_classes', array('input-text', 'qty', 'text', 'quantity'), $product)
                        ), $product, true, 'price');

                        do_action('co2_after_add_to_cart_quantity');
                        ?>

                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt buy_from_btn"><?php _e('Offset now', 'co2') ?></button>

                        <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                    </form>

                    <?php do_action('co2_after_add_to_cart_form'); ?>

                    <div class="buy_from_calc">Not sure about your output? Calculate your lifestyle!</div>
                    <div class="home_main_item_link"><a href="<?php echo get_permalink(164); ?>">Take a 90s quiz</a></div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>