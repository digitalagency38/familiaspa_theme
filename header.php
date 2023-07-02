<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package familiaspa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Mulish:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
  <script src="https://api-maps.yandex.ru/2.1/?apikey=8a69628d-9012-482b-962d-9bd92d6f2d51&lang=ru_RU" type="text/javascript">
    </script>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WQRM9Z6');</script>
<!-- End Google Tag Manager -->
	<meta name="yandex-verification" content="4dace99114f57351" />

</head>

<body <?php body_class(); ?>>
<!-- 	<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #0b1015 url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='57' height='57' viewBox='0 0 57 57' stroke='%23fff'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg transform='translate(1 1)' stroke-width='2'%3E%3Ccircle cx='5' cy='50' r='5'%3E%3Canimate attributeName='cy' begin='0s' dur='2.2s' values='50;5;50;50' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='cx' begin='0s' dur='2.2s' values='5;27;49;5' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='27' cy='5' r='5'%3E%3Canimate attributeName='cy' begin='0s' dur='2.2s' from='5' to='5' values='5;50;50;5' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='cx' begin='0s' dur='2.2s' from='27' to='27' values='27;49;5;27' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='49' cy='50' r='5'%3E%3Canimate attributeName='cy' begin='0s' dur='2.2s' values='50;50;5;50' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='cx' from='49' to='49' begin='0s' dur='2.2s' values='49;5;27;49' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3C/g%3E%3C/g%3E%3C/svg%3E") center center no-repeat;background-size:41px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script> -->
<?php wp_body_open(); ?>
<div class="wrapper">