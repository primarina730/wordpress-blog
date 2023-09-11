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

use function PHPSTORM_META\type;

get_header();
?>
<div class="top-screen">
</div>
<div class="second-screen">

	<!-- 第二画面左部分 -->
	<div class="left-side">
		<div class="latest-columns">
			<article>
				<h2 class="first-headline">Latest Columns</h2>
				<ul>
					<?php
					$args = array(
						'posts_per_page' => 5 // 表示件数
					);
					$posts = get_posts($args);
					foreach ($posts as $post) : // ループの開始
						setup_postdata($post); // 記事データの取得
					?>

						<li>
							<article>
								<a href="<?php the_permalink(); ?>" class="to-columns">
									<p class="latest-columns-time-tags"><?php the_time(get_option('date_format')); ?>&emsp;
										<?php
										$posttags = get_the_tags();
										if ($posttags) {
											foreach ($posttags as $tag) {
												echo '#' . $tag->name . '&nbsp;';
											}
										}
										?>
									</p>
									<h3><?php the_title(); ?></h3>
								</a>
							</article>
						</li>

					<?php
					endforeach; // ループの終了
					?>
				</ul>
				<div class="viewmore-button-a">
					<a href=<?php echo (get_post_type_archive_link("post") . "/blog") ?> class="viewMore hover-button">View More</a>
				</div>
			</article>
		</div>

		<div class="pc-search">
			<?php get_search_form(); ?>
		</div>
		<div class="top-archive-mobile">
			<div class="top-archive-part">
				<div class="archive-dropdown-part">
					<select class="archive-dropdown-select" onChange='document.location.href=this.options[this.selectedIndex].value;'>
						<option value="">Archive</option>
						<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
					</select>
				</div>
			</div>
		</div>
	</div>

	<!-- 第二画面右部分 -->
	<div class="right-side">
		<article>
			<div class="about-me frame">
				<h2 class="top-headline">About Me</h2>
				<?php // スラッグからIDを取得して表示
				$page = get_page_by_path("about-me");
				$page_id = $page->ID; ?>
				<?php echo '<div class="about-me-image">' . get_the_post_thumbnail($page_id, 'thumbnail') . '</div>'; ?>
				<p class="introduce-sentence">浅く広く投稿していきます。</p>
				<p class="introduce-sentence">31アイスでもチョコミントアイスを選ぶぐらいチョコミントアイスが好き</p>
			</div>
		</article>
		<div class="tags frame">
			<section>
				<h2 class="top-headline">Tags</h2>
				<?php
				$posttags = get_tags();
				if ($posttags) {
					foreach ($posttags as $tag) {
						echo '<a href="' . get_tag_link($tag->term_id) . '" class="toTags">' . "#" . $tag->name . '&emsp;' . '</a>';
					}
				}
				?>
			</section>
		</div>
		<div class="top-archive-pc">
			<div class="top-archive-part">
				<div class="archive-dropdown-part">
					<select class="archive-dropdown-select" onChange='document.location.href=this.options[this.selectedIndex].value;'>
						<option value="">Archive</option>
						<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
					</select>
				</div>
			</div>
		</div>
		<div class="mobile-search">

			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_template_part('pickup'); //ピックアップ記事 
?>


<?php get_footer(); ?>