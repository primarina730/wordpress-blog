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
<div class="breadcrumbs-part">
    <nav>
        <ul class="breadcrumbs-container">
            <?php
            $http = is_ssl() ? 'https' : 'http' . '://';
            $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
            $before_url = urldecode($_SERVER['HTTP_REFERER']);

            $categories = get_categories();
            $tags = get_tags();
            if (is_404() || (is_search())) {
            } else if (!is_home()) {
                echo '<li class="breadcrumbs-signpost"><a href="' . home_url('/') . '">ホーム</a></li>';
                if (is_archive()) {
                    echo '<li class="breadcrumbs-signpost latter"><a href="' . home_url('/blog') . '">記事一覧</a></li>';
                    if (is_category()) {
                        foreach ($categories as $category) {
                            $category_name = strtolower($category->name);
                            if (false !== strstr($url, $category_name)) {
                                echo '<li class="breadcrumbs-signpost latter"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                            }
                        }
                    }
                    if (is_tag()) {
                        echo the_archive_title('<li class="breadcrumbs-signpost latter"><a href ="' . $url . '">＃', '</a></li>');
                    }
                } else if (is_single()) {

                    $current_category = get_the_category();

                    echo '<li class="breadcrumbs-signpost latter"><a href="' . home_url('/blog') . '">記事一覧</a></li>';
                    echo '<li class="breadcrumbs-signpost latter"><a href="' . get_category_link($current_category[0]->term_id) . '">' . $current_category[0]->name . '</a></li>';
                    echo the_title('<li class="breadcrumbs-signpost latter"><a href ="' . get_the_permalink() . '">', '</a></li>');
                } else if (is_page()) {
                    echo the_title('<li class="breadcrumbs-signpost latter"><a href ="./">', '</a></li>');
                }
            }

            ?>
        </ul>
    </nav>
</div>