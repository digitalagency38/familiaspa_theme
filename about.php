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
/* Template Name: About */

get_header();


$main_image = get_field( "фоновая_картинка" );
$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
$main_title = get_field( "заголовок" );
$main_description = get_field( "описание" );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
$slides = get_field('слайдер');
?>
<div class="header--animated vacan">
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
  <div class="about_slider center_block">
    <div class="about_slider__in js_ab_sl">
      <?php foreach( $slides as $slide): ?>
      	<div class="about_slider__img"><img src="<?= $slide["картинка"]; ?>" alt=""></div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php
get_footer();