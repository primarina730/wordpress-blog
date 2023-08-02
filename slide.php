<?php $args = array(
    'numberposts' => 10, //表示する記事の数
    'post_type' => 'post',
    'orderby' => 'rand', //ランダム表示
    'tag' => 'pickup' //追加するタグの名前
);
$pickupPosts = get_posts($args);
if ($pickupPosts) : ?>

    <div id="pickup" class="clearfix">
        <p id="pickup-title">ピックアップ記事</p>
        <div class="scroll-wrapper">
            <div class="scroll-left">
                <div class="scroll-content">

                    <?php foreach ($pickupPosts as $post) : setup_postdata($post); ?>
                        <ul class="slides">
                            <li class="slide-content">
                                <article class="pickup-content">
                                    <figure class="pickup-thumbnail">
                                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb150'); ?></a>
                                    </figure>
                                    <div class="post-info">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>

                </div><!--/scroll-content-->
            </div>
            <a class="leftbutton" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            <a class="rightbutton" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div><!--/scroll-wrapper-->
    </div><!--/pickup-->
<?php endif; ?>