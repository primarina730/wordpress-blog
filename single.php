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

					<div class="single-details">
						<div class="single-date"><?php the_date() ?>&emsp;</div>
						<div class="single-category">
							<p>カテゴリー：</p><?php the_category() ?>&emsp;
						</div>
						<div class="single-tags"><?php the_tags(); ?></div>
					</div>
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
<?php get_footer() ?>