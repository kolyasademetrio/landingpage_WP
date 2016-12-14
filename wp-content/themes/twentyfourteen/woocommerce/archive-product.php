<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header('shop');
?>
<div class="categories">
    <div class="container categories__container">
        <div class="row categories__row">
            <div class="col-xs-12 categories__innerItem">
                <ul class="categories__list">
                    <?
                    $term = get_queried_object();
                    $args = array(
                        'parent' => 0,
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => 0,
                        'hierarchical' => 1,
                        'taxonomy' => 'product_cat'
                    );
                    $categories = get_categories($args);
                    for ($i = 0; $i < count($categories); $i++) {
                        $name = $categories[$i]->name;
                        $id_cat = $categories[$i]->term_id;
                        $link = get_category_link($id_cat);
                        ?>
                        <li class="categories__listItem <? if ($term->term_id == $id_cat) { ?>active<?
                        } ?>"><a href="<?= $link ?>" class="categories__link"><?= $name ?></a></li>
                        <?
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="catItem cat">
<?php if (have_posts()) : ?>
    <?php
    /**
     * woocommerce_before_shop_loop hook.
     *
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');
    ?>

    <?php woocommerce_product_loop_start(); ?>
    <div class="container catItem__container">
        <div class="row catItem__row">
            <?php woocommerce_product_subcategories(); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php wc_get_template_part('content', 'product'); ?>

            <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
            /**
             * woocommerce_after_shop_loop hook.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
            ?>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>
                <div class="container">
                 <?php wc_get_template('loop/no-products-found.php'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action('woocommerce_after_main_content');
    ?>
</div>
<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>

<?php get_footer('shop'); ?>
