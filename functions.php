<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_script('jquery');
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css');
    wp_enqueue_style('global', get_stylesheet_directory_uri() . '/css/global.css');

    if (is_archive()) {
        wp_enqueue_style('archive', get_stylesheet_directory_uri() . '/css/archive.css');
    } else if (is_page()) {
        wp_enqueue_style('page', get_stylesheet_directory_uri() . '/css/page.css');
    } else if (is_search()) {
        wp_enqueue_style('search', get_stylesheet_directory_uri() . '/css/search.css');
    } else if (is_single()) {
        wp_enqueue_style('single', get_stylesheet_directory_uri() . '/css/single.css');
    } else {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/css/index.css');
        wp_enqueue_style(
            'child-style',
            get_stylesheet_directory_uri() . '/css/index.css',
            array('parent-style')
        );
    }
    // wp_enqueue_script('slide-js', get_stylesheet_directory_uri() . '/js/slide.js', array('slide'), '1.0.0', true);
    wp_enqueue_script('pickup-js', get_stylesheet_directory_uri() . '/js/pickup.js', array('jquery'), '1.0.0', true);
    // wp_enqueue_script('slider-js', get_stylesheet_directory_uri(), 'js/slider.js', array('jquery'), '1.0.0', true);
}



function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'blog'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：' . esc_html(get_search_query(false));
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {
    }
    return $title;
});

function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function Change_menulabel()
{
    global $menu;
    global $submenu;
    $name = 'Columns';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新しい' . $name;
}

function Change_objectlabel()
{
    global $wp_post_types;
    $name = 'Columns';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

// アイキャッチ
add_theme_support('post-thumbnails');
add_image_size('l-size', 300, 200, array('left', 'top'));
add_image_size('top-pickup', 300, 300, true);

/*---- Google Web Fonts ----*/
function add_google_fonts()
{
    wp_register_style(
        'googleFonts',
        'https://fonts.googleapis.com/css2?family=BIZ+UDPMincho&display=swap'
    );
    wp_enqueue_style('googleFonts');
}
add_action('wp_enqueue_scripts', 'add_google_fonts');
/*---- Google Web Materials ----*/
function add_google_materials()
{
    wp_register_style(
        'googleMaterials',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'
    );
    wp_enqueue_style('googleMaterials');
}
add_action('wp_enqueue_scripts', 'add_google_materials');

function my_script()
{
    // 独自スクリプトの読み込み

}
//アクションフックの指定
add_action('wp_enqueue_scripts', 'my_script');
