<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
$attributes = $product->get_attributes();
?>
<div class="catItem__info">
    <div class="catItem__qty">
        <?
        foreach ($attributes as $attribute) :
            ?>
            <div class="catItem__qty1">
                <?
                if ($attribute['is_taxonomy']) {
                    $values = wc_get_product_terms($product->id, $attribute['name'], array('fields' => 'names'));
                    echo $values[0];
                } else {
                    // Convert pipes to commas and display values
                    $values = array_map('trim', explode(WC_DELIMITER, $attribute['value']));
                    echo $values[0];
                }
                ?>
            </div>
            <?
        endforeach;
        ?>
    </div>
    <?php if ($price_html = $product->get_price_html()) : ?>
        <div class="catItem__price"><?php echo $price_html; ?></div>
        <!--	<span class="price">--><?php //echo $price_html; ?><!--</span>-->
    <?php endif; ?>
</div>
