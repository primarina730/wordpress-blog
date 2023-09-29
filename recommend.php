<?php

use function PHPSTORM_META\type;

$current_post_info = get_post();
$current_tags_info = get_the_tags();

if ($current_tags_info) {
    foreach ($current_tags_info as $cti) :
        $current_tags_id[] = $cti->term_id;
        $current_tags_name[] = $cti->name;
    endforeach;

    function current_tags_parameter_element($arg_var)
    {
        $str4tagparam = "";
        $temp = $arg_var;
        foreach ($arg_var as $elm) :
            $str4tagparam = $str4tagparam . "'" . $elm . "'";
            if (next($temp)) {
                $str4tagparam = $str4tagparam . ",";
            }
        endforeach;
        return $str4tagparam;
    }

    $recommend_columns_condition = array(
        'tag' => current_tags_parameter_element($current_tags_name),
        'posts_per_page'   => 3,
        'fields' => 'ids',
        'orderby' => 'rand',
        'post__not_in' => array(get_the_ID())
    );


    $recommend_columns_ids = get_posts($recommend_columns_condition);

    // if (count($recommend_columns_ids) < 4) {
    //     $current_cat_id = get_the_category()[0]->cat_ID;
    //     $lack_columns_number = 4 - count($recommend_columns_ids);
    //     $exception_ids = $recommend_columns_ids;
    //     array_push($exception_ids, get_the_ID());
    //     $lack_columns_condition =
    //         array(
    //             'category__in' => array($current_cat_id),
    //             'posts_per_page' => $lack_columns_number,
    //             'fields' => 'ids',
    //             'post__not_in' => $exception_ids
    //         );
    //     var_dump($lack_columns_condition);

    //     // if (get_post($lack_columns_condition)) {
    //     array_push($recommend_columns_ids, get_post($lack_columns_condition));
    //     // }
    //     // var_dump($recommend_columns_ids);
    // }
}
?>

<div class="recommend_part">
    <h2 class="top-headline">おすすめの記事</h2>
    <div class="recommend-columns-container">
        <?php if ($current_tags_info) {
            foreach ($recommend_columns_ids as $rci) :
                echo '<div class="recommend-column"><a href="' . get_the_permalink($rci) . '" class="to-recommend-column"><figure>' . get_the_post_thumbnail($rci, 'l-size') . '</figure><h3 class="recommend-column-title">' . get_the_title($rci) . '</h3></a></div>';
            endforeach;
        }
        ?>
    </div>
</div>