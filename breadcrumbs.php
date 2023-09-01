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

?>
<section>
    <div class="breadcrumbs-container">

        <?php
        $http = is_ssl() ? 'https' : 'http' . '://';
        $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        if (is_404()) {
        } else if (!is_home()) {
            echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/') . '">ホーム</a></p>';
            if (is_archive()) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo '<p class="breadcrumbs-signpost"><a href="' . home_url('/blog') . '">記事一覧</a></p>';
                if (false === strstr($url, 'blog') && false === strstr($url, 'tag')) {
                    echo '<p class="breadcrumbs-arrow">＞</p>';
                    echo  the_category();
                }
                if (false === strstr($url, 'blog') && false !== strstr($url, 'tag')) {
                    echo '<p class="breadcrumbs-arrow">＞</p>';
                    echo the_archive_title('<p class="breadcrumbs-signpost"><a href ="./"></a>＃', '</a></p>');
                }
            } else if (is_single()) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo  the_category();
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo the_title('<p class="breadcrumbs-signpost"><a href ="./" >', '</a></p>');
            } else if (is_page()) {
                echo '<p class="breadcrumbs-arrow">＞</p>';
                echo '<a href ="./">';
                echo the_title('<p class="breadcrumbs-signpost">', '</p>');
                echo '</a>';
            }
        }

        ?>
    </div>
</section>