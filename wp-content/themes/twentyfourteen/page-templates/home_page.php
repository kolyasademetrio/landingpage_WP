<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    <div id="main-content" class="main-content main-background">

        <?php
        //	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
        //		// Include the featured content template.
        //		get_template_part( 'featured-content' );
        //	}
        ?>
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
                    // Include the page content template.
                    get_template_part( 'content', 'page' );

                endwhile;
                ?>
            </div>
        </div>
        <!--	--><?php //get_sidebar( 'content' ); ?>
    </div>
    </div>
    <div class="offer">
    <div class="container offer__container">
        <div class="row offer__row">
            <div class="col-xs-12">
                <h3 class="offer__title">Мы предлагаем:</h3>
            </div>
            <?
            $args = array(
                'parent'       => 0,
                'orderby'      => 'name',
                'order'        => 'ASC',
                'hide_empty'   => 0,
                'hierarchical' => 1,
                'taxonomy'     => 'product_cat'
            );
            $categories = get_categories( $args );
            for($i = 0; $i < count($categories); $i++ ) {
                $name = $categories[$i]->name;
                $id_cat = $categories[$i]->term_id;
                $link = get_category_link( $id_cat );
                $category_thumbnail = get_woocommerce_term_meta($id_cat, 'thumbnail_id', true);
                $image = wp_get_attachment_url($category_thumbnail);
                ?>
                <div class="col-md-4 col-sm-4 col-xs-6 offer__innerItem">
                    <a href="<?=$link?>" class="offer__link">
                        <img src="<?=$image?>" alt="" class="offer__img">
                        <h5 class="offer__itemTitle"><?=$name?></h5>
                    </a>
                </div>
                <?
            }
            ?>
        </div>
    </div>
<?php
get_footer();
