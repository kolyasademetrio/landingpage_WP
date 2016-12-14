<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

</div><!-- #main -->
<footer class="footer">
    <div class="container footer__container">
        <div class="row footer__row">
            <div class="col-xs-12 footer__innerItem">
                <div class="footer__copyright">
                    <div class="footer__copyItem">Все права на дизайн, текст и фотографии защищены. SushiManga™ 2016г.
                    </div>
                    <div class="footer__copyItem">Разработка сайта - <a href="http://expensive.pro"
                                                                        class="footer__copyLink">Expensive.pro</a></div>
                </div>
                <nav class="footer__nav">
                    <ul class="footer__navList">
                        <?
                        $menus = wp_get_nav_menus(array('hide_empty' => false, 'orderby' => 'name'));
                        $menu_list = wp_get_nav_menu_items($menus[1]);
                        for ($i = 0; $i < count($menu_list); $i++) {
                            ?>
                            <li class="footer__navListItem"><a href="<?= $menu_list[$i]->url ?>"
                                                               class="footer__navLink"><?= $menu_list[$i]->title ?></a>
                            </li>
                            <?
                        }
                        ?>
                    </ul>
                </nav>
                <div class="footer__categories">
                    <h5 class="footer__catTitle">Меню</h5>
                    <ul class="footer__catList">
                        <?
                        $menu_list = wp_get_nav_menu_items($menus[0]);
                        for ($i = 0; $i < count($menu_list); $i++) {
                            ?>
                            <li class="footer__catListItem"><a href="<?= $menu_list[$i]->url ?>"
                                                               class="footer__catLink"><?= $menu_list[$i]->title ?></a>
                            </li>
                            <?
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--<footer id="colophon" class="site-footer" role="contentinfo">

			<?php /*get_sidebar( 'footer' ); */ ?>

			<div class="site-info">
				<?php /*do_action( 'twentyfourteen_credits' ); */ ?>
				<a href="<?php /*echo esc_url( __( 'http://wordpress.org/', 'twentyfourteen' ) ); */ ?>"><?php /*printf( __( 'Proudly powered by %s', 'twentyfourteen' ), 'WordPress' ); */ ?></a>
			</div>
		</footer>-->
<?php wp_footer(); ?>

<!-- custom js -->
<script type="text/javascript" src="/wp-content/themes/twentyfourteen/js/script.js"></script>
<!-- slider JS -->
<script type="text/javascript" src="/wp-content/themes/twentyfourteen/js/jquery.flexslider.js"></script>
<!-- popup JS -->
<script src="/wp-content/themes/twentyfourteen/js/jquery.magnific-popup.js"></script>
<!-- flexslider initialize -->
<script type="text/javascript">
    //flexslider initialization
    (function () {
        // store the slider in a local variable
        var $window = jQuery(window),
            flexslider = {vars: {}};
        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 700) ? 1 :
                (window.innerWidth < 992) ? 2 : 3;
        }

        $window.load(function () {
            jQuery('.sliderBlock1 .catItem__flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: true,
                controlsContainer: jQuery('.sliderBlock1 .catItem__flexslider'),
                slideshow: false,
                slideshowSpeed: 5000,
                pauseOnAction: true,
                startAt: 1,
                // minItems: 1,
                // maxItems: 5,
                itemWidth: 278,
                animationLoop: true,
                move: 1,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                start: function (slider) {
                    flexslider = slider; //Initializing flexslider here.
                }
            });
        });
        // check grid size on resize event
        $window.resize(function () {
            var gridSize = getGridSize();
            flexslider.vars.minItems = gridSize;
            flexslider.vars.maxItems = gridSize;
        });
    }());
</script>
<!-- popup initialize -->
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.catItem__orderBtn').magnificPopup({
            type: 'inline',
            removalDelay: 500,
            mainClass: 'mfp-fade popup_inline',
            showCloseBtn: true,
            closeMarkup: '<div class="mfp-close">x</div>',
            closeBtnInside: true,
            closeOnContentClick: false,
            closeOnBgClick: true,
            alignTop: false,
            fixedContentPos: true
        });
    });
</script>
</body>
</html>