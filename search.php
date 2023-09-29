	<?php

	/**
	 * The template for displaying search results pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twenty_One
	 * @since Twenty Twenty-One 1.0
	 */
	get_header();
	?>
	<article>
		<div class="search-page">
			<?php
			if (have_posts()) {
			?>

				<header class="page-header alignwide">
					<h2 class="page-title">
						<?php
						printf(
							/* translators: %s: Search term. */
							esc_html__('Results for "%s"', 'twentytwentyone'),
							'<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
						);
						?>
					</h2>
				</header><!-- .page-header -->

				<div class="search-result-count default-max-width">
					<?php
					printf(
						esc_html(
							/* translators: %d: The number of search results. */
							_n(
								'We found %d result for your search.',
								'We found %d results for your search.',
								(int) $wp_query->found_posts,
								'twentytwentyone'
							)
						),
						(int) $wp_query->found_posts
					);
					?>
				</div><!-- .search-result-count -->
				<?php get_search_form() ?>
				<div class="searched-columns-container">
					<?php
					// Start the Loop.
					while (have_posts()) {
						the_post();
						/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/ ?>
						<article>
							<a href="<?php the_permalink(); ?>" class="to-each-searched-column">
								<div class="each-searched-column">
									<?php the_title('<h3 class="first-headline">', '</h3>');
									the_post_thumbnail();
									$content = get_the_content();

									$content = wp_strip_all_tags($content);

									$content = strip_shortcodes($content);

									// ４、出力する
									echo '<div class="part-of-content"><p>' . $content . '</p></div>';
									?>
									<div class="searched-column-detail">
										<p class="searched-column-time">投稿日：<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></p>
										<?php $categories = get_the_category();
										$tags = get_the_tags();

										if ($categories) {
											echo '<p>カテゴリー：' . $categories[0]->name . '</p>';
										}
										if ($tags) {
											echo '<p>';
											foreach ($tags as $tag) {
												echo '#' . $tag->name . '&nbsp;';
											}
											echo '</p>';
										}
										?>
									</div>
								</div>
							</a>
						</article>


					<?php

						// get_template_part('template-parts/content/content-excerpt', get_post_format());
					} // End the loop.
					// Previous/next page navigation.
					// twenty_twenty_one_the_posts_navigation();
					?>
				</div><?php
						// If no content, include the "No posts found" template.
					} else {
						get_template_part('template-parts/content/content-none');
					}
						?>
		</div>

	</article>


	<?php get_footer() ?>