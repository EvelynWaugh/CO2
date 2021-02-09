<?php

if (!defined('ABSPATH')) exit;
/**
 * Template Name: Quiz Result 
 */

get_header('quiz');
?>
<?php
do_action('co2_quiz_result_calculation', $_POST);
?>
<?php

$_products = wc_get_products([
    'exclude' => array(129, 130),
    'orderby' => 'rand',
    'limit' => 3
]);
$selected_product = $_products[0];
global $quiz_sum;
global $co2_quantity;


?>
<main>
    <div class="quiz_result">
        <div class="quiz_result_logo">
            <a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_theme_mod('image_quiz_logo_url'); ?>" alt=""></a>
        </div>
        <div class="quiz_result_text">Your personal annual bitcoin carbon footprint is approx.</div>
        <?php if (isset($_POST['quiz_result'])) : ?>
            <div class="quiz_result_img">
                <div class="quiz_result_img_numbers">
                    <?php
                    $images = str_split($quiz_sum);
                    foreach ($images as $image) {
                    ?>
                        <div class="quiz_result_img_number">
                            <img src="<?php echo CO2_URL . '/img/cloudfont/' . $image . '.png' ?>" />
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php if ($quiz_sum > 1) : ?>
                    <div>
                        <img src="<?php echo CO2_URL . '/img/cloudfont/tonnes.png' ?>" alt="">
                    </div>
                <?php else : ?>
                    <div>
                        <img src="<?php echo CO2_URL . '/img/cloudfont/tonne.png' ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <?php

            echo apply_filters(
                'woocommerce_loop_add_to_cart_link',
                sprintf(
                    '<a href="%s" data-quantity="%s" class="button product_type_simple add_to_cart_button ajax_add_to_cart quiz_result_btn" data-product_id= "%s" ><span>%s</span>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
            <path d="M11.4621 7L4.46211 14L2.53711 12.1625L7.69961 7L2.53711 1.8375L4.46211 0L11.4621 7Z" fill="white" />
        </g>
        <defs>
            <clipPath id="clip0">
                <rect width="14" height="14" fill="white" />
            </clipPath>
        </defs>
    </svg>
    </a>',
                    esc_url($selected_product->add_to_cart_url()),
                    esc_attr($quiz_sum != 0 ? $quiz_sum : 1),
                    $selected_product->get_id(),
                    __('Offset now', 'co2')
                ),
                $selected_product
            );

            ?>
        <?php elseif (isset($_POST['co2-add-to-cart'])) : ?>
            <div class="quiz_result_img">
                <div class="quiz_result_img_numbers">
                    <?php
                    $images = str_split($co2_quantity);
                    foreach ($images as $image) {
                    ?>
                        <div class="quiz_result_img_number">
                            <img src="<?php echo CO2_URL . '/img/cloudfont/' . $image . '.png' ?>" />
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php if ($quiz_sum > 1) : ?>
                    <div>
                        <img src="<?php echo CO2_URL . '/img/cloudfont/tonnes.png' ?>" alt="">
                    </div>
                <?php else : ?>
                    <div>
                        <img src="<?php echo CO2_URL . '/img/cloudfont/tonne.png' ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <?php

            echo apply_filters(
                'woocommerce_loop_add_to_cart_link',
                sprintf(
                    '<a href="%s" data-quantity="%s" class="button product_type_simple add_to_cart_button ajax_add_to_cart quiz_result_btn" data-product_id= "%s" ><span>%s</span>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
            <path d="M11.4621 7L4.46211 14L2.53711 12.1625L7.69961 7L2.53711 1.8375L4.46211 0L11.4621 7Z" fill="white" />
        </g>
        <defs>
            <clipPath id="clip0">
                <rect width="14" height="14" fill="white" />
            </clipPath>
        </defs>
    </svg>
    </a>',
                    esc_url($selected_product->add_to_cart_url()),
                    esc_attr($co2_quantity != 0 ? $co2_quantity : 1),
                    $selected_product->get_id(),
                    __('Offset now', 'co2')
                ),
                $selected_product
            );

            ?>
        <?php endif; ?>


        <div class="quiz_result_share">Share your results with your friends and on social media</div>
        <div class="quiz_result_share_wrap">
            <a href="https://www.facebook.com/sharer?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank" class="quiz_result_share_facebook">facebook</a>
            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="quiz_result_share_twitter">twitter</a>
        </div>



        <div class="quiz_result_projects_title">We will transfer your offsetting to the project</div>
        <div class="quiz_result_projects">
            <?php

            $index = 0;
            foreach ($_products as $product) {
                $index++;
                $product_id = $product->get_id();
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $product_name = $product->get_name();
                $cat = $product->get_category_ids();
                $selected_cat = get_term_by('id', array_shift($cat), 'product_cat');


            ?>
                <input type="radio" name="quiz_result" id="quiz_result_<?php echo $index; ?>" data-id="<?php echo absint($product_id); ?>" <?php echo $index === 1 ? 'checked' : '' ?>>
                <label class="quiz_result_project" for="quiz_result_<?php echo $index; ?>">
                    <div class="quiz_result_project_img">
                        <img src="<?php echo $image_url; ?>" alt="" />
                    </div>
                    <div class="quiz_result_project_theme"><?php echo $selected_cat->name; ?></div>
                    <div class="quiz_result_project_title"><?php echo $product_name; ?></div>
                </label>
            <?php
            }
            ?>

        </div>
    </div>
</main>

<?php
get_footer('quiz');
?>