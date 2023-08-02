<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>



<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<div class="container">
	<div class="top-screen">
		<?php get_header() ?>
	</div>

	<div class="area">
		<div class="second-screen">
			<!-- 第二画面左部分 -->
			<div class="left-side">
				<div class="latest-columns">
					<h2 class="top-headline">Latest Columns</h2>
					<ul>
						<?php
						$args = array(
							'posts_per_page' => 5 // 表示件数
						);
						$posts = get_posts($args);
						foreach ($posts as $post) : // ループの開始
							setup_postdata($post); // 記事データの取得
						?>
							<div class="cols">
								<li>
									<p class="latest-columns-time-tags"><?php the_time(get_option('date_format')); ?>&emsp;#<?php the_tags(""); ?></p>
									<a href="<?php the_permalink(); ?>" class="to-columns"><?php the_title(); ?></a>
								</li>
							</div>
						<?php
						endforeach; // ループの終了
						?>
					</ul>
				</div>
				</ul>
				<div class="viewmore-button-a">
					<a href=<?php echo (get_post_type_archive_link("post") . "/blog") ?> class="viewMore hover-button">View More</a>
				</div>
				<?php get_search_form(); ?>
			</div>

			<!-- 第二画面右部分 -->
			<div class="right-side">
				<div class="about-me frame">
					<h3 class="top-headline">About Me</h3>
					<?php // スラッグからIDを取得して表示
					$page = get_page_by_path("about-me");
					$page_id = $page->ID; ?>
					<?php echo '<div class="about-me-image">' . get_the_post_thumbnail($page_id, 'thumbnail') . '</div>'; ?>
					<p class="small-letters">浅く広く投稿していきます。</p>
					<!-- <p class="small-letters">mmochiさんがブログに圧をかけてくるのは一種のパワハラではないでしょうか。</p> -->
					<p class="small-letters">31アイスでもチョコミントアイスを選ぶぐらいチョコミントアイスが好き（ただ選ぶの面倒くさいだけ）</p>
				</div>
				<div class="tags frame">
					<h3 class="top-headline">Tags</h3>
					<?php
					$posttags = get_tags();
					if ($posttags) {
						foreach ($posttags as $tag) {
							echo '<a href="' . get_tag_link($tag->term_id) . '" class="toTags">' . "#" . $tag->name . '&emsp;' . '</a>';
						}
					}
					?>
				</div>
				<div class="topArchive">
					<ul class="monthly-list">
						<?php wp_get_archives('post_type=post&type=monthly&show_post_count=1'); ?>
					</ul>
				</div>
			</div>
		</div>
		<?php get_template_part('pickup'); //ピックアップ記事 
		?>
	</div>

	<?php get_footer(); ?>

</html>