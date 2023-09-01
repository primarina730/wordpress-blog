<?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    // 'tag' => 'pickup' //追加するタグの名前
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
                        <a href="<?php the_permalink(); ?>" class="pickup-link"><?php the_post_thumbnail(); ?></br>
                            <p class="pickup-title"><?php the_title() ?></p>
                        </a>
                    </figure>
                </div>
            <?php } ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>