<?php

/**
 * Template Name: Quiz
 */
get_header('quiz');
?>
<main>
    <div class="quiz_wrap">
        <div class="quiz_left">
            <div class="quiz_left_img">
                <img src="<?php echo get_theme_mod('image_quiz_url'); ?>" alt="">
            </div>
            <div class="quiz_left_text">
                Did you know that a single bitcoin transfer has a carbon footprint of <span>300 kgs</span> of CO2. That’s the same as a return flight from London to Frankfurt.
            </div>
        </div>
        <div class="quiz_right">
            <div class="quiz_right_logo">
                <img src="<?php echo get_theme_mod('image_quiz_logo_url'); ?>" alt="">
            </div>
            <div class="quiz_right_header">
                <div class="quiz_right_header_num">Question <span>1</span> of 3</div>
                <div class="quiz_right_header_name">Bitcoin footprint Quiz</div>
            </div>
            <div class="quiz_right_header_progress">
                <span></span>
            </div>
            <form action="<?php echo get_permalink(127); ?>" method="post" class="form-quiz" enctype='multipart/form-data'>
                <?php
                wp_nonce_field('co2_quiz_action', 'co2_quiz_name');
                ?>
                <div class="quiz_step quiz_step_1 shown">
                    <div class="quiz_right_question">
                        In the last 12 months how many times have you transferred BTC to a friend or family member?
                    </div>
                    <div class="quiz_right_answer_variants">
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_1" value="0.650" id="answer_1_variant_1" checked><label for="answer_1_variant_1">1-2 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_1" value="1.625" id="answer_1_variant_2"><label for="answer_1_variant_2">4-5 times
                            </label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_1" value="6.5" id="answer_1_variant_3"><label for="answer_1_variant_3">10-20 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_1" value="8.125" id="answer_1_variant_4"><label for="answer_1_variant_4">More than 20 times</label>
                        </div>
                        <!-- <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_1" value="5" id="answer_1_variant_5"><label for="answer_1_variant_5"></label>
                        </div> -->
                    </div>
                </div>
                <div class="quiz_step quiz_step_2">
                    <div class="quiz_right_question">
                        In the last 12 months how many times have you transferred BTC to or from an exchange ?
                    </div>
                    <div class="quiz_right_answer_variants">
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_2" value="0.650" id="answer_2_variant_1" checked><label for="answer_2_variant_1">1-2 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_2" value="1.625" id="answer_2_variant_2"><label for="answer_2_variant_2">4-5 times
                            </label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_2" value="6.5" id="answer_2_variant_3"><label for="answer_2_variant_3">10-20 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_2" value="8.125" id="answer_2_variant_4"><label for="answer_2_variant_4">More than 20 times</label>
                        </div>
                        <!-- <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_2" value="5" id="answer_2_variant_5"><label for="answer_2_variant_5">More than 20 times</label>
                        </div> -->

                    </div>
                </div>
                <div class="quiz_step quiz_step_3">
                    <div class="quiz_right_question">
                        In the last 12 months how many times have you transferred BTC to or from an exchange ?
                    </div>
                    <div class="quiz_right_answer_variants">
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_3" value="0.650" id="answer_3_variant_1" checked><label for="answer_3_variant_1">1-2 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_3" value="1.625" id="answer_3_variant_2"><label for="answer_3_variant_2">4-5 times
                            </label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_3" value="6.5" id="answer_3_variant_3"><label for="answer_3_variant_3">10-20 times</label>
                        </div>
                        <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_3" value="8.125" id="answer_3_variant_4"><label for="answer_3_variant_4">More than 20 times</label>
                        </div>
                        <!-- <div class="quiz_right_answer_variant">
                            <input type="radio" name="quiz_3" value="5" id="answer_3_variant_5"><label for="answer_3_variant_5">More than 20 times</label>
                        </div> -->
                    </div>
                </div>
                <div class="quiz_right_btn_wrap">
                    <button type="submit" class="quiz_result_btn" name="quiz_result">
                        <span>See result</span>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M11.4625 7L4.46248 14L2.53748 12.1625L7.69998 7L2.53748 1.8375L4.46248 0L11.4625 7Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="14" height="14" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <div class="quiz_right_btn">
                        <span>Next question</span>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M11.4625 7L4.46248 14L2.53748 12.1625L7.69998 7L2.53748 1.8375L4.46248 0L11.4625 7Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="14" height="14" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>

                </div>
            </form>

        </div>
    </div>
</main>
<?php
get_footer('quiz');
?>