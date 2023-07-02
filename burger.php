<?php

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
?>

<div class="site-panel-wrap">
  <div class="burger-wrap">
    <div class="burger-btn">меню</div>
    <div class="burger-body">
      <div class="burger-body__in center_block">
        <div class="burger-body__top">
          <a href="/" class="header__logo">
          	<?php
              if ( has_custom_logo() ) {
                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
              }
            ?>
          </a>
          <div class="burger-close-btn">закрыть</div>
        </div>
        <div class="burger-body__bottom">
          <div class="burger-body__info">
            <nav class="burger-body__menu">
              <?php wp_nav_menu("menu=main_menu"); ?>
            </nav>
          </div>
          <div class="burger-body__contacts">

            <a href="tel:<?= get_option('site_telephone'); ?>"
               class="burger-body__tel"><?= get_option('site_telephone'); ?></a>
            <a href="mailto:<?= get_option('site_email'); ?>"
               class="burger-body__mail"><?= get_option('site_email'); ?></a>
            <div class="burger-body__address"><?= get_option('site_address'); ?></div>
            <div class="burger-body__work"><?= get_option('site_worktime'); ?></div>
            <div class="burger-body__socs">
              <?php foreach ($site_socials_decoded as $link) { ?>
              <a href="<?= $link->link; ?>" target="_blank" rel="noopener noreferrer"
                 class="header__soc">
                <img src="<?= $link->image_url; ?>" alt="<?= $link->title; ?>">
                <span><?= $link->title; ?></span>
              </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>