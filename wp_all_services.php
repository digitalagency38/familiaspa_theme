<?php 
/**
*	Template name: Все услуги и цены
*/
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

get_header();
$main_image = get_field( "фоновая_картинка" );
$main_image_mobile = get_field( "фоновая_картинка_мобильная" );
$main_description = get_field( "описание" );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
?>
<div class="header--animated mob_page_start">
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
        <h1 class="header__h1"><?= the_title(); ?></h1>
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

<main class="content center_block">
	<div class="tabs">
	  <div class="tabs__nav">
		<button class="tabs__btn tabs__btn_active">По направлениям</button>
		<button class="tabs__btn">По времени</button>
	  </div>
	  <div class="tabs__content">
		<div class="serv_blocks tabs__pane tabs__pane_show">
			<?php
				$post_type = 'services';
				$count = wp_count_posts('post_services')->publish;
				$services_list = get_posts([
					'post_type' => $post_type
				]);
			?>
			<?php foreach ($services_list as $item): ?>
				<div class="serv_item" itemid="<?php echo $item->ID?>">
					<div class="serv_title"><?php echo $item->post_title?></div>
					<div class="serv_content">
						<?php $types = get_field("типы_услуг", $item->ID); ?>
						  <?php foreach ($types as $post) { ?>
							<?php setup_postdata($post); ?>
								<div class="typess__top">
									<div class="typess__title"><?php the_title(); ?></div>
									<a href="<?= the_permalink(); ?>" class="typess__more"><span>Подробнее</span></a>
								</div>
								<?php $list_price = get_field( "список" ); ?>
								<?php if ($list_price): ?>
									<div class="typess__bottom">
										<div class="main__price__top">
											<div class="main__price__tit">Время</div>
											<div class="main__price__tit">Описание</div>
											<div class="main__price__tit">Цена</div>
										</div>
										<div class="main__price__blocks">
											<?php foreach ($list_price as $e) { ?>
												<div class="main__price__block">
													<div class="main__price__item"><span>Время</span><?= $e['время']; ?></div>
													<div class="main__price__item"><span>Описание</span><?= $e['текст']; ?></div>
													<div class="main__price__item"><span>Цена</span><?= $e['стоимость']; ?></div>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php endif ?>
							<?php } ?>
						  <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		<div class="tabs__pane df_time">
			<?php $time_list = get_field( "time_list" ); ?>
			<?php foreach ($time_list as $s): ?>
				<div class="serv_item">
					<div class="serv_title"><?= $s['tits_time']; ?></div>
					<div class="serv_content">
						<?php $serv_lsy = ($s['serv_lsy']); ?>
						<div class="main__price__blocks">
							<?php foreach ($serv_lsy as $e) { ?>
							<div class="main__price__block">
								<div class="main__price__item" style="display: none;"></div>
								<div class="main__price__item"><span>Название массажа</span><?= $e['serv_usl']; ?></div>
								<div class="main__price__item"><span>Цена</span><?= $e['serv_sum']; ?></div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	  </div>
	</div>
	  <script>
		class ItcTabs {
		  constructor(target, config) {
			const defaultConfig = {};
			this._config = Object.assign(defaultConfig, config);
			this._elTabs = typeof target === 'string' ? document.querySelector(target) : target;
			this._elButtons = this._elTabs.querySelectorAll('.tabs__btn');
			this._elPanes = this._elTabs.querySelectorAll('.tabs__pane');
			this._eventShow = new Event('tab.itc.change');
			this._init();
			this._events();
		  }
		  _init() {
			this._elTabs.setAttribute('role', 'tablist');
			this._elButtons.forEach((el, index) => {
			  el.dataset.index = index;
			  el.setAttribute('role', 'tab');
			  this._elPanes[index].setAttribute('role', 'tabpanel');
			});
		  }
		  show(elLinkTarget) {
			const elPaneTarget = this._elPanes[elLinkTarget.dataset.index];
			const elLinkActive = this._elTabs.querySelector('.tabs__btn_active');
			const elPaneShow = this._elTabs.querySelector('.tabs__pane_show');
			if (elLinkTarget === elLinkActive) {
			  return;
			}
			elLinkActive ? elLinkActive.classList.remove('tabs__btn_active') : null;
			elPaneShow ? elPaneShow.classList.remove('tabs__pane_show') : null;
			elLinkTarget.classList.add('tabs__btn_active');
			elPaneTarget.classList.add('tabs__pane_show');
			this._elTabs.dispatchEvent(this._eventShow);
			elLinkTarget.focus();
		  }
		  showByIndex(index) {
			const elLinkTarget = this._elButtons[index];
			elLinkTarget ? this.show(elLinkTarget) : null;
		  };
		  _events() {
			this._elTabs.addEventListener('click', (e) => {
			  const target = e.target.closest('.tabs__btn');
			  if (target) {
				e.preventDefault();
				this.show(target);
			  }
			});
		  }
		}

		// инициализация .tabs как табов
		new ItcTabs('.tabs');
		  document.addEventListener('DOMContentLoaded', () => {
			  let questions = document.querySelectorAll('.serv_item');

			  questions.forEach(question => {
				  const title = question.querySelector('.serv_title');
				  const text = question.querySelector('.serv_content');
				  title.addEventListener('click', () => {
					  if (text.style.maxHeight) {
						  text.style.maxHeight = null;
						  title.classList.toggle('isActive');
						  text.classList.toggle('isShow');
					  } else {
						  questions.forEach(q => {
							  const qText = q.querySelector('.serv_content');
							  const qTitle = q.querySelector('.serv_title');
							  qText.style.maxHeight = null;
							  qTitle.classList.remove('isActive');
							  qText.classList.remove('isShow');
						  });

						  text.style.maxHeight = (text.scrollHeight + 5) + 'px';
						  title.classList.add('isActive');
						  text.classList.add('isShow');
					  }
				  });
			  });
		  });
  </script>
</main>

<?php
get_footer();
?>