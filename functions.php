<?php
/**
 * familiaspa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package familiaspa
 */

require get_template_directory() . '/customizer-repeater/functions.php';

add_action( 'init', 'true_register_post_type_init' );
 
function true_register_post_type_init() {
 
	$services_labels = array(
		'name' => 'Услуги',
		'singular_name' => 'Услуга',
		'add_new' => 'Добавить услугу',
		'add_new_item' => 'Добавить услугу',
		'edit_item' => 'Редактировать услугу',
		'new_item' => 'Новая услуга',
		'all_items' => 'Все Услуги',
		'search_items' => 'Искать Услуги',
		'not_found' =>  'Услуги по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет услуг.',
		'menu_name' => 'Услуги'
	);
 
	$services_args = array(
		'labels' => $services_labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-star-filled',
		'menu_position' => 3,
		'supports' => array( 'title' )
	);
  
  	$reviews_labels = array(
		'name' => 'Отзывы',
		'singular_name' => 'Отзыв',
		'add_new' => 'Добавить отзыв',
		'add_new_item' => 'Добавить отзыв',
		'edit_item' => 'Редактировать отзыв',
		'new_item' => 'Новый отзыв',
		'all_items' => 'Все отзывы',
		'search_items' => 'Искать отзывы',
		'not_found' =>  'Отзывов по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет отзывов.',
		'menu_name' => 'Отзывы'
	);
 
	$reviews_args = array(
		'labels' => $reviews_labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-admin-users',
		'menu_position' => 4,
		'supports' => array( 'title' )
	);
  	$types_labels = array(
		'name' => 'Типы услуг',
		'singular_name' => 'Тип услуги',
		'add_new' => 'Добавить тип услуги',
		'add_new_item' => 'Добавить тип услуги',
		'edit_item' => 'Редактировать тип услуги',
		'new_item' => 'Новый тип услуги',
		'all_items' => 'Все типы услуг',
		'search_items' => 'Искать типы услуг',
		'not_found' =>  'Типов услуг по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет типов услуг.',
		'menu_name' => 'Типы услуг'
	);
 
	$types_args = array(
		'labels' => $types_labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-hammer',
		'menu_position' => 4,
		'supports' => array( 'title' )
	);
  	$masters_labels = array(
		'name' => 'Мастера',
		'singular_name' => 'Мастер',
		'add_new' => 'Добавить мастера',
		'add_new_item' => 'Добавить мастера',
		'edit_item' => 'Редактировать мастера',
		'new_item' => 'Новый мастер',
		'all_items' => 'Все мастера',
		'search_items' => 'Искать мастера',
		'not_found' =>  'Мастеров по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет типов мастера.',
		'menu_name' => 'Мастера'
	);
 
	$masters_args = array(
		'labels' => $masters_labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-groups',
		'menu_position' => 4,
		'supports' => array( 'title' )
	);
  
  	$sales_labels = array(
		'name' => 'Акции',
		'singular_name' => 'Акция',
		'add_new' => 'Добавить акцию',
		'add_new_item' => 'Добавить акцию',
		'edit_item' => 'Редактировать акцию',
		'new_item' => 'Новая акция',
		'all_items' => 'Все акции',
		'search_items' => 'Искать акцию',
		'not_found' =>  'Акций по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет типов акций.',
		'menu_name' => 'Акции'
	);
 
	$sales_args = array(
		'labels' => $sales_labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-awards',
		'menu_position' => 4,
		'supports' => array( 'title' )
	);
 
	register_post_type( 'services', $services_args );
  	register_post_type( 'reviews', $reviews_args );
  	register_post_type( 'types', $types_args );
  	register_post_type( 'masters', $masters_args );
  	register_post_type( 'sales', $sales_args );
}

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
function my_style() {
    wp_enqueue_style('my_style', get_template_directory_uri() . '/css/main_style.css');
}
add_action('wp_enqueue_scripts', 'my_style');

function slick_styles() {
    wp_enqueue_style('slick_styles', get_template_directory_uri() . '/css/slick.css');
}
add_action('wp_enqueue_scripts', 'slick_styles');


function add_jquery(){
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'add_jquery' );

function add_slick(){
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js');
}
add_action( 'wp_enqueue_scripts', 'add_slick' );

function add_gsap(){
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap.min.js');
}
add_action( 'wp_enqueue_scripts', 'add_gsap' );

function add_scrolltrigger(){
	wp_enqueue_script( 'scrolltrigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js');
}
add_action( 'wp_enqueue_scripts', 'add_scrolltrigger' );

function add_main(){
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'),'',true);
}
add_action( 'wp_enqueue_scripts', 'add_main' );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function familiaspa_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on familiaspa, use a find and replace
		* to change 'familiaspa' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'familiaspa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'familiaspa' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'familiaspa_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'familiaspa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function familiaspa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'familiaspa_content_width', 640 );
}
add_action( 'after_setup_theme', 'familiaspa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function familiaspa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'familiaspa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'familiaspa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'familiaspa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function familiaspa_scripts() {
	wp_enqueue_style( 'familiaspa-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'familiaspa-style', 'rtl', 'replace' );

	wp_enqueue_script( 'familiaspa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'familiaspa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
Короткий пример для использования Theme_Customization_API 
http://casepress.org/kb/web/nastrojki-temy-wordpress-kak-dobavit-svoi-polya/
*/
/**
 * Добавляет страницу настройки темы в админку Вордпресса
 */
function mytheme_customize_register( $wp_customize ) {
/*
Добавляем секцию в настройки темы
*/
  $wp_customize->add_section(
      // ID
      'data_site_section',
      // Arguments array
      array(
          'title' => 'Данные сайта',
          'capability' => 'edit_theme_options',
          'description' => "Тут можно указать данные сайта"
      )
  );
/*
Добавляем поле телефона site_telephone
*/
  $wp_customize->add_setting(
      // ID
      'site_telephone',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'site_telephone_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Номер телефона",
          'section' => 'data_site_section',
          // This last one must match setting ID from above
          'settings' => 'site_telephone'
      )
  );
  
  /*
Добавляем поле телефона site_email
*/
  $wp_customize->add_setting(
      // ID
      'site_email',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'site_email_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Email",
          'section' => 'data_site_section',
          // This last one must match setting ID from above
          'settings' => 'site_email'
      )
  );
  /*
Добавляем поле телефона site_address
*/
  $wp_customize->add_setting(
      // ID
      'site_address',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'site_address_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Адрес",
          'section' => 'data_site_section',
          // This last one must match setting ID from above
          'settings' => 'site_address'
      )
  );
  /*
Добавляем поле телефона site_worktime
*/
  $wp_customize->add_setting(
      // ID
      'site_worktime',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'site_worktime_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Часы работы",
          'section' => 'data_site_section',
          // This last one must match setting ID from above
          'settings' => 'site_worktime'
      )
  );
  /*
Добавляем поле телефона site_map
*/
  $wp_customize->add_setting(
      // ID
      'site_map',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'site_map_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Ссылка на карту",
          'section' => 'data_site_section',
          // This last one must match setting ID from above
          'settings' => 'site_map'
      )
  );
  $wp_customize->add_setting( 'site_socials', array(
  'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'site_socials', array(
	'label'   => esc_html__('Социальные Сети','customizer-repeater'),
	'section' => 'data_site_section',
	'priority' => 1,
	'customizer_repeater_image_control' => true,
	'customizer_repeater_icon_control' => true,
	'customizer_repeater_title_control' => true,
	'customizer_repeater_link_control' => true,
 ) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );


