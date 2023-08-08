<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<style>
    html {
        padding-bottom: 0 !important;
        margin-bottom: 0 !important;
    }

    @media screen and (max-width:782px) {
        html {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }
    }
</style>

</div>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"> </script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- <script type="test/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/pickup.js"></script> -->
<script>
    jQuery(".slideshow").slick({
        autoplaySpeed: 2000,
        speed: 3000,
        autoplay: true,
        Infinity: true,
        slidesToShow: 1,
        slideToscroll: 1,
        arrows: true,
        dots: true,
    });
</script>

<?php wp_footer(); ?>
</body>

</html>