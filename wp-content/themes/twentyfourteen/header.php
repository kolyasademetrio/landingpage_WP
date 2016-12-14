<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <!-- Bootstrap -->
    <link href="/wp-content/themes/twentyfourteen/css/bootstrap.css" rel="stylesheet">
    <!-- slider -->
    <link rel="stylesheet" href="/wp-content/themes/twentyfourteen/css/flexslider.css" type="text/css"/>
    <!-- popup -->
    <link rel="stylesheet" href="/wp-content/themes/twentyfourteen/css/magnific-popup.css">
    <!-- fonts css -->
    <link rel="stylesheet" href="/wp-content/themes/twentyfourteen/css/fonts.css">
</head>

<body <?php body_class(); ?>>
<header class="header" role="banner">
    <div class="container header__container">
        <div class="row header__row">
            <div class="col-xs-12 header__itemInner">
                <?php if (get_header_image()) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="header__link" rel="home">
                        <img src="<?php header_image(); ?>" alt="logo" class="header__img">
                    </a>
                <?php endif;
                $phone = get_post_meta(11, 'phone', true);
                $schedule = get_post_meta(11, 'schedule', true);
                $vk = get_post_meta(11, 'vk', true);
                $inst = get_post_meta(11, 'inst', true);
                ?>
                <div class="header__phoneOrder">
                    <div class="header__phoneSchedule">
                        <div class="header__phone">
                            <a href="#" class="header__linkPhone"><?= $phone ?></a>
                        </div>
                        <div class="header__schedule"><?= $schedule ?></div>
                    </div>
                    <div class="header__cart">
                        <?
                        global $woocommerce;
                        $viewing_cart = __('View your shopping cart', 'your-theme-slug');
                        $start_shopping = __('Start shopping', 'your-theme-slug');
                        $cart_url = $woocommerce->cart->get_cart_url();
                        $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
                        $cart_contents_count = $woocommerce->cart->cart_contents_count;
                        $cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
                        if ($cart_contents_count == 0) {
                            ?>
                            <a class="header__cartLink" href="<?=$shop_page_url?>" title="<?=$start_shopping?>"></a>
                            <?
                        } else {
                            ?>
                            <a class="header__cartLink" href="<?=$cart_url?>" title="<?=$viewing_cart?>"><span><?=$cart_contents?></span></a>
                            <?
                        }
                        ?>
<!--                        <a href="#" class="header__cartLink"></a>-->
                    </div>
                    <div class="header__social">
                        <a href="<?= $vk ?>" class="header__socialLink vk"></a>
                        <a href="<?= $inst ?>" class="header__socialLink inst"></a>
                    </div>
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </div>
                <nav class="header__nav" role="navigation">
                    <ul class="header__navList">
                        <?
                        $menus = wp_get_nav_menus(array('hide_empty' => false, 'orderby' => 'name'));
                        $menu_list = wp_get_nav_menu_items($menus[1]);
                        for ($i = 0; $i < count($menu_list); $i++) {
                            ?>
                            <li class="header__navItem">
                                <a href="<?= $menu_list[$i]->url ?>" class="header__navLink"
                                   id=""><?= $menu_list[$i]->title ?></a>
                            </li>
                            <?
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="main">
    <!--<div id="page" class="hfeed site">
	<?php /*if ( get_header_image() ) : */ ?>
	<div id="site-header">
		<a href="<?php /*echo esc_url( home_url( '/' ) ); */ ?>" rel="home">
			<img src="<?php /*header_image(); */ ?>" width="<?php /*echo get_custom_header()->width; */ ?>" height="<?php /*echo get_custom_header()->height; */ ?>" alt="<?php /*echo esc_attr( get_bloginfo( 'name', 'display' ) ); */ ?>">
		</a>
	</div>
	<?php /*endif; */ ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php /*echo esc_url( home_url( '/' ) ); */ ?>" rel="home"><?php /*bloginfo( 'name' ); */ ?></a></h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php /*_e( 'Search', 'twentyfourteen' ); */ ?></a>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<button class="menu-toggle"><?php /*_e( 'Primary Menu', 'twentyfourteen' ); */ ?></button>
				<a class="screen-reader-text skip-link" href="#content"><?php /*_e( 'Skip to content', 'twentyfourteen' ); */ ?></a>
				<?php /*wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); */ ?>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php /*get_search_form(); */ ?>
			</div>
		</div>
	</header>

	<div id="main" class="site-main">
-->