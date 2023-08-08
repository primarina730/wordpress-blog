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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

	<style>
		html {
			padding-top: 0 !important;
			margin-top: 0 !important;
		}

		@media screen and (max-width:782px) {
			html {
				padding-top: 0 !important;
				margin-top: 0 !important;
			}
		}
	</style>
	<?php wp_head(); ?>
</head>

<body>
	<div class="titleAndNavigator">
		<div>
			<h2><a href=<?php echo home_url('/'); ?> class="blogTitle">Inside&nbsp;<br class="sp_br">Emma's&nbsp;<br class="sp_br">Case</a></h2>
		</div>
		<div>
			<ul class="nav-menu">
				<li><a href=<?php echo (get_post_type_archive_link("post") . "/blog") ?> class="ap_navigation">All Columns</a></li>
				<?php $toAboutMe = get_page_by_path('about-me');
				$post_id_a = $toAboutMe->ID; ?>
				<li><a href=<?php echo (get_permalink($post_id_a)) ?> class="ap_navigation">About Me</a></li>
				<?php $toContact = get_page_by_path('contact');
				$post_id_c = $toContact->ID; ?>
				<li><a href=<?php echo (get_permalink($post_id_c)) ?> class="ap_navigation">Contact</a></li>
			</ul>
		</div>
	</div>

	<div class="container">