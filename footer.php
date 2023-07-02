<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package familiaspa
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);

?>

	<footer class="footer">
            <div class="footer__in center_block">
                <div class="footer__top">
                    <a href="/" class="footer__logo">
                  		<?php
                          if ( has_custom_logo() ) {
                          	echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                      		}
                      	?>
                  	</a>
                    <div class="footer__nav">
                        <?php wp_nav_menu("menu=main_menu"); ?>
                    </div>
                    <div class="footer__contacts">
                        <div class="footer__title">Контакты</div>
                        <a href="tel:<?= get_option('site_telephone'); ?>" class="footer__tel"><?= get_option('site_telephone'); ?></a>
                        <a href="mailto:<?= get_option('site_email'); ?>" class="footer__mail"><?= get_option('site_email'); ?></a>
                        <div class="footer__address"><?= get_option('site_address'); ?></div>
                        <div class="footer__work"><?= get_option('site_worktime'); ?></div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="footer__copy">©2022 Familia Spa</div>
                  	<?php $url = get_privacy_policy_url(); ?>
                    <a class="footer__link" href="<?= $url ?: '#'; ?>" target="_blank">Политика конфиденциальности</a>
                    <div class="footer__socs">
                      <?php foreach ($site_socials_decoded as $link) { ?>
                        <a href="<?= $link->link; ?>" target="_blank" rel="noopener noreferrer" class="footer__soc">
                            <img src="<?= $link->image_url; ?>" alt="<?= $link->title; ?>">
                            <span><?= $link->title; ?></span>
                        </a>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>

<?php wp_footer(); ?>

</body>
</html>
