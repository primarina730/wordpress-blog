<!DOCTYPE html>
<html lang="ja">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

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

<body>
	<div class="archive-page">
		<?php
		$description = get_the_archive_description();
		?>

		<?php // ブログの一覧を表示する start 
		?>
		<?php the_archive_title('<h2 class="page-title">', '</h2>'); ?>
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
								<?php // アイキャッチを表示させる start 
								?>
								<div class="blog-item__thumbnail">
									<?php if (has_post_thumbnail()) : ?>
										<?php echo get_the_post_thumbnail($post->ID, 'l-size'); ?>
									<?php endif; ?>
								</div>
								<?php // アイキャッチを表示させる end 
								?>
								<div class="blog-item__content">
									<?php // タイトルを表示させる start 
									?>
									<h3 class="blog-item__title"><?php the_title(); ?></h3>
									<?php // タイトルを表示させる end 
									?>
									<?php // 抜粋を表示させる start 
									?>
									<p class="blog-item__read"><?php the_excerpt(); ?></p>
									<?php // 抜粋を表示させる end 
									?>
								</div>
							</a>
						</div>
					</article>
			<?php endwhile;
			endif; ?>
		</div>

	</div>
</body>

</html>