<?php


get_header();
?>



<main>
    <section class="home_main_screen">

        <div class="container">
            <div class="row">
                <div class="main_screen_info">
                    <div class="main_screen_title">CO₂ offsetting solutions for digital asset marketplaces</div>
                    <div class="main_screen_subtitle">Climate action tools for crypto enthusiasts and institutions</div>
                </div>
            </div>
        </div>
        <div class="home_main_items">
            <div class="line"></div>

            <div class="container">
                <div class="row">
                    <?php
                    // echo '<pre>';
                    $posts = get_field('posts_to_display', 5);
                    // var_dump($posts);
                    foreach ($posts as $post) {
                        $is_comming_soon = get_post_meta($post->ID, 'post-rec', true);
                        $image_url = get_the_post_thumbnail_url($post, 'full');

                        $title =  $post->post_title;
                        $content =  $post->post_content;
                    ?>
                        <div class="home_main_item">
                            <div class="home_main_item_icon"><img src="<?php echo $image_url; ?>" alt=""></div>
                            <div class="home_main_item_title"><?php echo   $title; ?></div>
                            <div class="home_main_item_text"><?php echo $content; ?> </div>
                            <?php if ($is_comming_soon) : ?>
                                <div class="home_main_item_coming_soon">COMING SOON</div>
                            <?php else : ?>
                                <div class="home_main_item_link"><a href="<?php echo get_permalink($post); ?>">LEARN MORE</a></div>
                            <?php endif; ?>
                        </div>

                    <?php
                    }
                    ?>

                    <!-- <div class="home_main_item">
                        <div class="home_main_item_icon"><img src="img/icon_2.svg" alt=""></div>
                        <div class="home_main_item_title">For exchanges and digital wallet operators</div>
                        <div class="home_main_item_text">Integrate our APIs and offer your clients real-time voluntary carbon offsetting. We will help you achieve your sustainability goals.</div>
                        <div class="home_main_item_link"><a href="/for_exchanges.html">LEARN MORE</a></div>
                    </div>
                    <div class="home_main_item">
                        <div class="home_main_item_icon"><img src="img/icon_3.svg" alt=""></div>
                        <div class="home_main_item_title">For crypto miners and institutional holders</div>
                        <div class="home_main_item_text">Let us help you compensate for the unintended environmental consequences of your business operations.</div>
                        <div class="home_main_item_link"><a href="/for_crypto.html">LEARN MORE</a></div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
