<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
	<div class="categories">
		<div class="container categories__container">
			<div class="row categories__row">
				<div class="col-xs-12 categories__innerItem">
					<ul class="categories__list">
						<?
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
							<li class="categories__listItem"><a href="<?= $link ?>" class="categories__link"><?= $name ?></a></li>
							<?
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div id="main-content" class="main-content container">

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

<?php
//get_sidebar();
get_footer();
