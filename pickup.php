<?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    // 'tag' => 'pickup' //追加するタグの名前
);
$pickupPosts = get_posts($args);
if ($pickupPosts) : ?>
    <section>
        <div class="pickup-part">
            <h2 class="top-headline">Pick Up</h2>
            <article>
                <div class="slideshow">
                    <?php for ($i = 0; $i <= 4; $i++) { ?>
                        <div id="slide<?php echo $i ?>">
                            <?php $post = $pickupPosts[$i];
                            setup_postdata($post) ?>
                            <div class="pickup-container">
                                <a href="<?php the_permalink(); ?>" class="pickup-link">
                                    <figure class="pickup-thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                    <h3 class="pickup-title"><?php the_title() ?></h3>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </article>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>