<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<article>
	<div class="single-page">
		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			the_title('<h2 class="first-headline single-title">', '</h2>');
			the_post_thumbnail();
		?>

			<div class="columns-sentence-surround">
				<div class="columns-sentence-part">

					<?php
					the_content();
					?>
				</div>
			</div>

			<div class="single-details">
				<div class="single-date">
					<p><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date() ?></time></p>
				</div>
				<div class="single-category">
					<p>カテゴリー：</p><?php the_category() ?>
				</div>
				<div class="single-tags">
					<p><?php the_tags(); ?></p>
				</div>
			</div>


		<?php

		// If comments are open or there is at least one comment, load up the comment template.
		// if (comments_open() || get_comments_number()) {

		// 	comments_template('<div class="">', '</div>');
		// }
		endwhile; // End of the loop.
		?>
	</div>
</article>
<?php get_template_part('recommend'); ?>
<?php get_footer() ?>