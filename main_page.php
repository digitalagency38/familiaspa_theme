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
/* Template Name: Main Page */

get_header();

$main_image = get_field( "фоновая_картинка" );
$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
$main_title = get_field( "заголовок" );
$main_description = get_field( "описание" );
$services = get_field('услуги');
$services_title = get_field('заголовок_услуг');
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
$about = get_field('о_салоне');
$reviews = get_field('отзывы');
$reviews_title = get_field('заголовок_отзывов');
?>
<script src="https://w762920.yclients.com/widgetJS" charset="UTF-8"></script>
<script>
    function triggerButtonClick() {
        document.querySelector(".yButton").dispatchEvent(new Event("click"));
    }
</script>
    
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
            <div class="header__bottom">
                <h1 class="header__h1"><?= $main_title; ?></h1>
                <div class="header__text"><?= $main_description; ?></div>
                <div class="header__info">
					<div class="header__link ms_link" onclick="triggerButtonClick()"><span>Записаться</span></div>
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
    <div class="main_services" id="services">
        <div class="main_services__title center_block"><?= $services_title; ?></div>
        <div class="main_services__blocks">
        	<?php foreach( $services as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
          		<?php setup_postdata($post); ?>
                  <div class="main_services__block">
                      <div class="main_services__l-side">
                          <img src="<?= get_field( "картинка" ); ?>" alt="<?php the_title(); ?>">
                      </div>
                      <div class="main_services__r-side">
                          <div class="main_services__tit"><?php htmlspecialchars(the_title()); ?></div>
                          <div class="main_services__info">
                              <div class="main_services__time"><?= get_field( "время" ); ?></div>
                              <div class="main_services__price">от <?= get_field( "цена" ); ?> Руб.</div>
                          </div>
                          <div class="main_services__text"><?= get_field( "описание" ); ?></div>
                          <a href="<?php the_permalink(); ?>" class="main_services__more"><span>Подробнее</span></a>
                      </div>
                  </div>
          		<?php } ?>
          <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
        </div>
    </div>
    <div class="main_rev">
        <div class="main_rev__in center_block">
            <div class="main_rev__title"><?= $reviews_title; ?></div>
            <div class="main_rev__blocks js_rev_sl">
              <?php foreach( $reviews as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                <div class="main_rev__block">
                    <div class="main_rev__text"><?= get_field( "текст" ); ?></div>
                    <div class="main_rev__info">
                        <div class="main_rev__img"><img src="<?= get_field( "аватар" ); ?>" alt=""></div>
                        <div class="main_rev__texts">
                            <div class="main_rev__name"><?= get_field( "имя" ); ?></div>
                            <div class="main_rev__logo"><img src="<?= get_field( "платформа" ); ?>" alt=""></div>
                        </div>
                        <a href="<?= get_field( "ссылка" ); ?>" class="main_rev__more"><span>Подробнее</span></a>
                    </div>
                </div>
                <?php endforeach; ?>
              <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
            </div>
            <div class="count"></div>
        </div>
    </div>
    <div class="main_text center_block">
        <div class="main_text__l-side">
            <div class="main_text__title"><?= $about['заголовок']; ?></div>
            <div class="main_text__info">
                <div class="main_text__text"><?= $about['текст']; ?></div>
                <a href="<?= $about['ссылка']; ?>" class="main_text__more"><span>Подробнее</span></a>
            </div>
        </div>
        <div class="main_text__r-side">
            <img src="<?= $about['картинка']; ?>" alt="">
        </div>
    </div>
    <div class="main__contacts">
        <div class="main__contacts__title center_block">Контакты</div>
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