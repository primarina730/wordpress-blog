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

<div class="archive-page">
	<?php the_archive_title('<h2 class="first-headline">', '</h2>'); ?>
	<?php
	echo '<div class="category-nav"><ul class="categories">';
	wp_list_categories('title_li=');
	echo '</ul></div>'; ?>


	<!-- テスト -->
	<?php
	$http = is_ssl() ? 'https' : 'http' . '://';
	$url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	// echo $url;
	?>


	<div class="category-nav">
		aaaaa
		<ul class="categories">
			<?php
			$categories = get_categories();
			$category1 = $categories[0]->name;

			$category_size = count($categories);
			echo $category_size;

			for ($i = 0; $i <= $category_size - 1; $i++) {
				$category = $categories[$i]->name;
				if (mb_strpos($url, $category) !== false) {
					echo '<li class="cat-item"><a class="at-same" href=" ' . get_category_link($categories[$i]->term_id) . '">' . $category . '</a></li>';
				} else {
					echo '<li class="cat-item"><a class="" href=" ' . get_category_link($categories[$i]->term_id) . '">' . $category . '</a></li>';
				}
			}
			?>

		</ul>
	</div>



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