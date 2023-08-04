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

        <div class="scroll-content">

            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <p class="arrow prev">
                    <i class="ico"></i>
                    <label for="switch<?php echo $i; ?>">
                        <figure class="pickup-thumbnail">
                            <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb150'); ?></a>
                        </figure>
                        <div class="post-info">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                    </label>
                </p>
            <?php } ?>

            <?php wp_reset_postdata(); ?>

        </div><!--/scroll-content-->
        <!-- <a class="leftbutton" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a> -->
        <!-- <a class="rightbutton" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a> -->
    </div><!--/pickup-->
<?php endif; ?>