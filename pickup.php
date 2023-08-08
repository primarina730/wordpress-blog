<?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    'tag' => 'pickup' //追加するタグの名前
);
$pickupPosts = get_posts($args);
if ($pickupPosts) : ?>
    <div class="pickup-part">
        <h2 class="top-headline">Pick Up</h2>
        <div class="slideshow">
            <?php for ($i = 0; $i <= 4; $i++) { ?>
                <div id="slide<?php echo $i ?>">
                    <?php $post = $pickupPosts[$i];
                    setup_postdata($post) ?>
                    <figure class="pickup-thumbnail">
                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'l-size'); ?></a>
                    </figure>
                    <div class="post-info">
                        <h3 class=pickup-each-title><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><a href="<?php the_permalink(); ?>">
                                <?php the_excerpt(); ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>