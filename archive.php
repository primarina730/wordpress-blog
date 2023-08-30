<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="each-breadcrumbs-area">
	<?php get_template_part('breadcrumbs'); //ピックアップ記事 
	?>
</div>
<div class="archive-page">
	<?php the_archive_title('<h2 class="first-headline">', '</h2>'); ?>
	<?php
	echo '<div class="category-nav"><ul class="categories">';
	wp_list_categories('title_li=');
	echo '</ul></div>'; ?>

	<div class="repeatHeadlines">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if ($description) : ?>
					<div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
				<?php endif; ?>
				<article class="blog-list__list-item">
					<div class="item">
						<a href="<?php the_permalink(); ?>" class="blog-item">

							<div class="blog-item__thumbnail">
								<?php if (has_post_thumbnail()) : ?>
									<?php echo get_the_post_thumbnail($post->ID, 'l-size'); ?>
								<?php endif; ?>
							</div>

							<div class="blog-item__content">
								<h3 class="blog-item__title"><?php echo get_the_title() ?></h3>
							</div>
						</a>
					</div>
				</article>
		<?php endwhile;
		endif; ?>
	</div>
</div>
<?php get_footer() ?>