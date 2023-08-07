<?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    'tag' => 'pickup' //追加するタグの名前
);
$pickupPosts = get_posts($args);
if ($pickupPosts) : ?>

    <div class="clearfix">
        <h2 class="top-headline">Pick Up</h2>
        <div class="slideshow">
            <input type="radio" name="slideshow" id="switch0" checked>
            <input type="radio" name="slideshow" id="switch1">
            <input type="radio" name="slideshow" id="switch2">
            <input type="radio" name="slideshow" id="switch3">
            <input type="radio" name="slideshow" id="switch4">
            <div class="slide-contents">
                <?php for ($i = 0; $i <= 4; $i++) { ?>
                    <section id="slide<?php echo $i ?>">
                        <?php $post = $pickupPosts[$i];
                        setup_postdata($post) ?>
                        <figure class="pickup-thumbnail">
                            <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb150'); ?></a>
                        </figure>
                        <div class="post-info">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                    </section>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <p class="arrow prev">
                <i class="ico"></i>
                <label for="switch0"></label>
                <label for="switch1"></label>
                <label for="switch2"></label>
                <label for="switch3"></label>
                <label for="switch4"></label>
            </p>
            <p class="arrow next">
                <i class="ico"></i>
                <label for="switch0"></label>
                <label for="switch1"></label>
                <label for="switch2"></label>
                <label for="switch3"></label>
                <label for="switch4"></label>
            </p>
        </div>
    </div>
<?php endif; ?>