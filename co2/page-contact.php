<?php get_header(); ?>
<main>
    <section class="contacts">
        <div class="container">
            <div class="row">
                <div class="contacts_title"><?php the_title(); ?></div>
                <div class="contacts_col_1">
                    <div class="contacts_subtitle">ImpactScope</div>
                    <div class="contacts_text"><?php echo get_theme_mod('addr_co2'); ?></div>
                </div>
                <div class="contacts_col_2">
                    <div class="contacts_subtitle">Partnership and press</div>
                    <div class="contacts_text">
                        <p><a href="mailto:<?php echo get_theme_mod('email_co2', ''); ?>" target="blank"><?php echo get_theme_mod('email_co2', ''); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>