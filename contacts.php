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
/* Template Name: Contacts */

get_header();


$main_image = get_field( "фоновая_картинка" );
$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
$main_title = get_field( "заголовок" );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
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
        <div class="main__contacts__blocks center_block">
          <div class="main__contacts__l-side">
            <a href="tel:<?= get_option('site_telephone'); ?>" class="main__contacts__tel"><?= get_option('site_telephone'); ?></a>
            <a href="mailto:<?= get_option('site_email'); ?>" class="main__contacts__mail"><?= get_option('site_email'); ?></a>
          </div>
          <div class="main__contacts__r-side">
            <div class="main__contacts__address"><?= get_option('site_address'); ?></div>
            <div class="main__contacts__work"><?= get_option('site_worktime'); ?></div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="scroller"></div>
</div>
<main class="content">
  <div class="main__contacts">
	  <div class="main__contacts__map">
                    <div class="main__contacts__hide"></div>
		  <div class="mapBlock" id="map" style="height: 720px;"></div>
	  </div>
	</div>
</main>
<script type="text/javascript" >
        if (jQuery('#map').length) {
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [52.268705, 104.319126],
                zoom: 16,
                controls: ['zoomControl', 'fullscreenControl',"geolocationControl"]
            }, {
                searchControlProvider: 'yandex#search'
            }),
             myPlacemark2 = new ymaps.Placemark([52.268705, 104.319126], {
                hintContent: 'FamiliaSPA',
                balloonContent: 'FamiliaSPA'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/wp-content/themes/familiaspa/img/point.png',
                iconImageSize: [70, 70],
                iconImageOffset: [-36, -76]

            });

        myMap.geoObjects
            // .add(myPlacemark)
            .add(myPlacemark2)
    });
}
</script>
<?php
get_footer();