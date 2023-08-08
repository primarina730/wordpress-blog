<?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    'tag' => 'pickup' //追加するタグの名前
);
$pickupPosts = get_posts($args);
if ($pickupPosts) : ?>

    <h2 class="top-headline">Pick Up</h2>
    <div class="slideshow">
        <?php for ($i = 0; $i <= 4; $i++) { ?>
            <div id="slide<?php echo $i ?>">
                <?php $post = $pickupPosts[$i];
                setup_postdata($post) ?>
                <figure class="pickup-thumbnail">
                    <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb150'); ?></a>
                </figure>
                <div class="post-info">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
            </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>