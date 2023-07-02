<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package familiaspa
 */
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

get_header();
?>
<div class="header--animated mob_page_start">
    <header class="header">
        <div class="header__bg"><img src="<?php echo get_theme_file_uri(); ?>/img/first_img.jpg" alt=""></div>
        <div class="header__mob"><img src="<?php echo get_theme_file_uri(); ?>/img/first_img_mob.jpg" alt=""></div>
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
            </div>
        </div>
    </header>
    <div class="scroller"></div>
</div>

<main class="content">
  <div class="main__contacts center_block">
		<div class="header__text">
          <?php
          while ( have_posts() ) :
              the_post();

              get_template_part( 'template-parts/content', 'page' );

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                  comments_template();
              endif;

          endwhile; // End of the loop.
          ?>
    	</div>
  </div>
</main>

<?php
get_footer();
