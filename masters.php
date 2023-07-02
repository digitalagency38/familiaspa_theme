<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package familiaspa
 */
/* Template Name: Masters */

get_header();


$main_image = get_field( "фоновая_картинка" );
$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
$main_title = get_field( "заголовок" );
$main_description = get_field( "описание" );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
$creator = get_field('основатель');
$groups = get_field('группа_мастеров');

?>
<div class="header--animated">
  <header class="header">
    <div class="header__bg"><img src="<?= $main_image; ?>" alt=""></div>
    <div class="header__mob"><img src="<?= $main_image_mobile; ?>" alt=""></div>
    <div class="header__in center_block">
      <div class="header__top">
        <a href="/" class="header__logo">
          <?php
          if ( has_custom_logo() ) {
            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
          }
          ?>
        </a>

        <?php include get_template_directory() . '/burger.php'; ?>
      </div>
      <?php include get_template_directory() . '/breadcrumbs.php'; ?>
      <div class="header__bottom">
        <h1 class="header__h1"><?= $main_title; ?></h1>
        <div class="header__text"><?= $main_description; ?></div>
		  <div class="header__info">
			  <div class="header__infos">
				  <a href="tel:<?= get_option('site_telephone'); ?>" class="header__tels"><?= get_option('site_telephone'); ?></a>
				  <?php if($site_socials_decoded) { ?>
				  <div class="header__socs">
					  <?php foreach ($site_socials_decoded as $link) { ?>
					  <a href="<?= $link->link; ?>" target="_blank" rel="noopener noreferrer" class="header__soc">
						  <img src="<?= $link->image_url; ?>" alt="<?= $link->title; ?>">
						  <span><?= $link->title; ?></span>
					  </a>
					  <?php } ?>
				  </div>
				  <?php } ?>
			  </div>
		  </div>
      </div>
    </div>
  </header>
  <div class="scroller"></div>
</div>
<main class="content">
  <div class="sales_block">
    <div class="sales_block__blocks">
      <div class="sales_block__block">
        <div class="sales_block__l-side"><img src="<?= $creator['картинка']; ?>" alt="<?= $creator['имя']; ?>"></div>
        <div class="sales_block__r-side">
          <div class="sales_block__tit"><?= htmlspecialchars_decode($creator['заголовок']); ?></div>
          <div class="sales_block__name"><?= $creator['имя']; ?></div>
          <div class="sales_block__text">
            <?= htmlspecialchars_decode($creator['текст']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="master_blocks center_block">
    <?php foreach( $groups as $group):?>
      <div class="master_blocks__block">
        <div class="master_blocks__title"><?= $group['заголовок']; ?></div>
        <div class="master_blocks__slider js_mast_sl">
          <?php foreach( $group['список'] as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
            <div class="master_blocks__slide">
              <div class="master_blocks__img"><img src="<?= get_field('аватар'); ?>" alt="<?= get_field('имя'); ?>"></div>
              <div class="master_blocks__name"><?= get_field('имя'); ?></div>
              <div class="master_blocks__work"><?= get_field('должность'); ?></div>
              <div class="master_blocks__about"><?= get_field('описание'); ?></div>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
<?php
get_footer();