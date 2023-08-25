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

<div class="page-page">
    <h2 class="first-headline"><?php the_title() ?></h2>
    <?php the_post_thumbnail('<div class="page-content">') ?>

    <?php
    the_content('</div>');
    ?>

</div>
<?php get_footer() ?>