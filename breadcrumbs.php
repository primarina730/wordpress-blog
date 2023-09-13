<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

use LDAP\ResultEntry;

?>
<div class="breadcrumbs-container">
    <?php
    $http = is_ssl() ? 'https' : 'http' . '://';
    $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $before_url = urldecode($_SERVER['HTTP_REFERER']);

    $categories = get_categories();
    $tags = get_tags();
    if (is_404() || (is_search())) {
    } else if (!is_home()) {
        echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/') . '">ホーム</a></p>';
        if (is_archive()) {
            echo '<p class="breadcrumbs-arrow">＞</p>';
            echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/blog') . '">記事一覧</a></p>';
            if (is_category()) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                // echo  the_category()；
                foreach ($categories as $category) {
                    $category_name = strtolower($category->name);
                    if (false !== strstr($url, $category_name)) {
                        echo '<a href="' . get_category_link($category->term_id) . '"><p class="breadcrumbs-signpost">' . $category->name . '</p>';
                    }
                }
            }
            if (is_tag()) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo the_archive_title('<p class="breadcrumbs-signpost"><a href ="' . $url . '"></a>＃', '</a></p>');
            }
        } else if (is_single()) {
            if (false !== strstr($before_url, 'tag')) {
                foreach ($tags as $tag) {
                    $tag_name = $tag->name;
                    if (ctype_alpha($tag_name)) {
                        $tag_name = strtolower($tag_name);
                    }
                    if (false !== strstr($before_url, $tag_name)) {
                        echo '<p class="breadcrumbs-arrow">＞</p>';
                        echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/blog') . '">記事一覧</a></p>';
                        echo '<p class="breadcrumbs-arrow">＞</p>';
                        echo '<a href="' . get_tag_link($tag->term_id) . '"><p class="breadcrumbs-signpost">＃' . $tag->name . '</p>';
                    }
                }
            } else if (false !== strstr($before_url, 'blog')) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/blog') . '">記事一覧</a></p>';
            } else if (false !== strstr($before_url, 'category')) {
                foreach ($categories as $category) {
                    $category_name = strtolower($category->name);
                    if (false !== strstr($before_url, $category_name)) {
                        echo '<p class="breadcrumbs-arrow">＞</p>';
                        echo '<a href="' . get_category_link($category->term_id) . '"><p class="breadcrumbs-signpost">' . $category->name . '</p>';
                    }
                }
            } else {
            }
            echo '<p class="breadcrumbs-arrow">＞</p>';
            echo '<a href ="./">';
            echo the_title('<p class="breadcrumbs-signpost">', '</p>');
            echo '</a>';
        } else if (is_page()) {
            echo '<p class="breadcrumbs-arrow">＞</p>';
            echo '<a href ="./">';
            echo the_title('<p class="breadcrumbs-signpost">', '</p>');
            echo '</a>';
        }
    }

    ?>
</div>