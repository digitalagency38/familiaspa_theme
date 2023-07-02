<script src="https://w762920.yclients.com/widgetJS" charset="UTF-8"></script>
<script>
    function triggerButtonClick() {
        document.querySelector(".yButton").dispatchEvent(new Event("click"));
    }
</script>
<?php
if ($post_type === 'types') { ?>
<?php
	$main_image = get_field( "fonovaya_kartinka" );
	$main_image_mobile = get_field( "fonovaya_kartinka_mobilnaya" );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$site_socials = get_theme_mod('site_socials');
	$site_socials_decoded = json_decode($site_socials);
	$main_description2 = get_field( "polnoe_opisanie" );
	$main_description = get_field( "текст" );
	$content_sl_title = get_field( "content_sl_title" );
	$main_price_title = get_field( "main_price_title" );
	$content_sl_title = get_field( "content_sl_title" );
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
					<h1 class="header__h1"><?php the_title(); ?></h1>
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
		<?php if($main_description2) { ?>
			<div class="content_text center_block"><?= $main_description2; ?></div>
		<?php } ?>
		<?php if($content_slider) { ?>
			<div class="content_slider center_block">
				<div class="content_text__title"><?= $content_sl_title; ?></div>
				<div class="content_slider__blocks content_slider_js">
					<?php foreach ($content_slider as $e) { ?>
						<div class="content_slider__img">
							<img src="<?= $e['img']; ?>" alt="">
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php if($main_price_title) { ?>
			<div class="main__price center_block">
				<div class="main__price__title"><?= $main_price_title; ?></div>
				<div class="main__price__top">
					<div class="main__price__tit">Время</div>
					<div class="main__price__tit">Описание</div>
					<div class="main__price__tit">Цена</div>
				</div>
				<div class="main__price__blocks">
					<?php $list_price = get_field( "список" ); ?>
					<?php foreach ($list_price as $e) { ?>
						<div class="main__price__block">
							<div class="main__price__item"><span>Время</span><?= $e['время']; ?></div>
							<div class="main__price__item"><span>Описание</span><?= $e['текст']; ?></div>
							<div class="main__price__item"><span>Цена</span><?= $e['стоимость']; ?></div>
						</div>
					<?php } ?>
				</div>
				<div class="header__link ms_link" onclick="triggerButtonClick()"><span>Записаться</span></div>
			</div>
		<?php } ?>
		<div class="main__contacts new_block">
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
	</main>
<?php } else { ?>
<?php
	$main_image = get_field( "фоновая_картинка" );
	$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$site_socials = get_theme_mod('site_socials');
	$site_socials_decoded = json_decode($site_socials);
	$txt_mast = get_field( "testmastera" );
	$main_title = get_field( "заголовок" );
	$main_description = get_field( "описание" );
	$types = get_field( "типы_услуг" );
	$reviews = get_field('отзывы');
	$reviews_title = get_field('заголовок_отзывов');
	$masters = get_field('мастера');
	$seo_block = get_field('seo_block');
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
					<h1 class="header__h1"><?php the_title(); ?></h1>
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
	  <div class="main_services">
		<div class="main_services__blocks">
		  <?php foreach ($types as $post) { ?>
			<?php setup_postdata($post); ?>
			  <div class="main_services__block">
				<div class="main_services__l-side">
					<?php
						$image_id = get_field('картинка');
						$image_url = wp_get_attachment_image_src($image_id, 'full');
					?>
				  <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="main_services__r-side">
				  <div class="main_services__tit"><?php the_title(); ?></div>
				  <div class="main_services__text"><?= get_field('текст'); ?></div>
				  <ul class="main_services__list">
					<?php foreach (get_field('список') as $item) { ?>
					  <li>
						<div class="main_services__times"><?= $item['время']; ?></div>
						<div class="main_services__txt">
						  <?= $item['текст']; ?>
						</div>
					  </li>
					<?php } ?>
				  </ul>
				  <div class="main_services__info">
					<div class="main_services__time"><?= get_field('время'); ?></div>
					<div class="main_services__price"><?= get_field('стоимость'); ?> ₽</div>
				  </div>
				  <div class="main_services__buttons">
				  	<div class="header__link ms_link" onclick="triggerButtonClick()"><span>Записаться</span></div>
<!-- 					  <a class="main_services__mores" href="<?= the_permalink(); ?>">Подробнее</a> -->
				  </div>
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
	  <div class="main_serv">
		<div class="main_serv__l-side">
		  <div class="main_serv__title">Мастера</div>
		  <div class="main_serv__navs">
			<div class="main_serv__text"><?= $txt_mast; ?></div>
		  <div class="hide_block slider-nav">
			<?php foreach( $masters as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
				<div class="main_serv__name"><?= get_field( "имя" ); ?></div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
		  </div>
		</div>
		</div>
		<div class="main_serv__r-side">
		  <div class="main_serv__slider slider-for">
			<?php foreach( $masters as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
			  <div class="main_serv__block">
				<div class="main_serv__img"><img src="<?= get_field( "аватар" ); ?>" alt="<?= get_field( "имя" ); ?>"></div>
				<div class="main_serv__name"><?= get_field( "имя" ); ?></div>
				<div class="main_serv__work"><?= get_field( "должность" ); ?></div>
				<div class="main_serv__work n_bl"><?= get_field( "описание" ); ?></div>
			</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
		  </div>
		</div>
	  </div>
		 <?php if( !empty($seo_block) ): ?>
		  <div class="seo_block">
				<div class="seo_block__in">
					<h2><?php echo $seo_block['title']; ?></h2>
					<div class="seo_block__txt"><?php echo $seo_block['text']; ?></div>
				</div>
		  </div>
		<?php endif; ?>
	</main>
<?php } ?>