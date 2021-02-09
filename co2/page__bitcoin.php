<?php

/**
 * Template Name: 'Bitcoin'
 */

get_header();

?>
<main>
    <section class="bitcoin_co2_main">
        <div class="container">
            <div class="row">
                <div class="bitcoin_co2_main_title">Bitcoin & CO₂</div>
                <div class="bitcoin_co2_main_more js-more">Read <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 1.92857L1.90625 0.5L5 3.64286L8.09375 0.5L9.5 1.92857L5 6.5L0.5 1.92857Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row bitcoin_co2_row1" id="js-more">
                <div class="type_page_left">
                    <div class="bitcoin_co2_title">
                        <?php echo get_field('title_bitcoin'); ?>
                    </div>
                </div>
                <div class="type_page_right">
                    <div class="type_page_right_text">
                        <?php echo get_field('right_bitcoin_1'); ?>
                    </div>
                </div>
            </div>
            <div class="row bitcoin_co2_row2">
                <div class="type_page_left">
                    <div class="bitcoin_co2_img_wrap">
                        <img src="<?php echo get_field('picture_bitcoin'); ?>" alt="">
                    </div>
                </div>
                <div class="type_page_right">
                    <div class="type_page_right_text">
                        <?php echo get_field('content_bitcoin'); ?>
                        <div class="type_page_left_subtitle">For real-time data on single transaction footprints and annualized total footprints visit the <a href="https://digiconomist.net/bitcoin-energy-consumption" target="blank">Digiconomist Energy Consumption Index.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
?>