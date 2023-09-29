<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<section>
	<div class="page-title-container">
		<h2 class="page-title"><?php esc_html_e('Nothing here', 'twentytwentyone'); ?></h2>
	</div>
	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'twentytwentyone'); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
	<div class="archives-container">
		<div class="monthly-archive-container line-partition">
			<h2 class="monthly-archive-headline">Archives
			</h2>
			<ul>
				<?php
				wp_get_archives();
				?>
			</ul>
		</div>
		<div class="category-container line-partition">
			<h2 class="category-headline">Categories</h2>
			<div class="category-nav">
				<ul class="categories">
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
		</div>
		<div class="tag-container">
			<h2 class="tag-headline">Tags</h2>
			<ul>
				<?php
				$posttags = get_tags();
				if ($posttags) {
					foreach ($posttags as $tag) {
						echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
					}
				}
				?>
			</ul>
		</div>
	</div>
</section>
<?php get_footer(); ?>