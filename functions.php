<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 11);
function theme_enqueue_styles()
{

    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css');
    wp_enqueue_style('global', get_stylesheet_directory_uri() . '/css/global.css');
    if (is_archive()) {
        wp_enqueue_style('archive', get_stylesheet_directory_uri() . '/css/archive.css');
    } else if (is_page()) {
        wp_enqueue_style('page', get_stylesheet_directory_uri() . '/css/page.css');
    } else if (is_search()) {
        wp_enqueue_style('search', get_stylesheet_directory_uri() . '/css/search.css');
    } else if (is_single()) {
        wp_enqueue_style('single', get_stylesheet_directory_uri() . '/css/single.css');
    } else if (is_404()) {
        wp_enqueue_style('404', get_stylesheet_directory_uri() . '/css/404.css');
    } else {
        // wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style(
            'child-style',
            get_stylesheet_directory_uri() . '/css/index.css'
        );
    }
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
add_image_size('top-aboutme', $image_square, $image_square, array('left', 'top'));



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

function load_slick_scripts()
{
    wp_enqueue_script('jquery-script-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', array(), '3.6.3');
    wp_enqueue_script('slick-script-cdn', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1');
    wp_enqueue_script('pickup-js', get_stylesheet_directory_uri() . '/js/pickup.js');
}

add_action('wp_footer', 'load_slick_scripts');

// OGPの設定
function add_ogp_prefix_to_language_attributes($output)
{
    // lang 属性の後に prefix 属性 を追加
    return $output . ' prefix="og: https://ogp.me/ns#"';
}
add_filter('language_attributes', 'add_ogp_prefix_to_language_attributes');

function add_ogp_metas()
{

    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
        $_SERVER['HTTPS'] = 'on';
    }
    // 投稿の個別ページや固定ページ、トップページであれば
    if (is_front_page() || is_home() || is_single() || is_page()) {
        global $post;
        // ページタイプ
        $ogp_type = 'website';
        // ページの URL
        $ogp_url = '';
        // ページのタイトル（トップページでは以下で指定すればその値を）
        $ogp_title = '';
        // ページの説明文（トップページでは以下で指定すればその値を）
        $ogp_description = '';
        // デフォルト画像の URL （アイキャッチ画像がない場合に使用）
        $ogp_image = '';
        // サイト名（以下で指定すればその値を、空の場合は  get_bloginfo('name') の値）
        $ogp_site_name = '';
        // サイトの言語（以下で指定すればその値を、空の場合は get_locale() の値）
        $ogp_locale = 'ja_JP';
        // Twitter カードの種類（summary_large_image または summary を指定）
        $twitter_card_type = 'summary_large_image';
        // Twitter の @ユーザー名（指定すれば twitter:site のタグを出力）
        $twitter_site_username = '';
        // Facebook アプリ ID（指定すれば fb:app_id のタグを出力）
        $fb_app_id = '';
        // 出力する meta タグ
        $ogp = '';

        // 個別ページの場合はページタイプを article に
        if (is_singular()) {
            $ogp_type = 'article';
            $ogp_title = wp_strip_all_tags(stripslashes(single_post_title('', false)), true);
            // 抜粋を取得
            $excerpt = wp_strip_all_tags($post->post_excerpt);
            // 抜粋が設定されていなければコンテンツから抽出
            if (empty($excerpt)) {
                // HTML タグを削除
                $excerpt = wp_strip_all_tags($post->post_content);
                // 改行を半角スペースに変換
                $excerpt = str_replace(array("\r\n", "\n", "\r"), ' ', $excerpt);
            }
            // 80 文字に
            $ogp_description = wp_trim_words($excerpt, 80, '...');

            // アイキャッチ画像があれば
            if (has_post_thumbnail()) {
                $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                // $thumbnail_src[0] は画像の URL
                if ($thumbnail_src && $thumbnail_src[0]) {
                    $ogp_image = $thumbnail_src[0];
                }
            }
        } elseif (is_front_page() || is_home()) { //トップページ
            if (empty($ogp_title)) {
                $ogp_title = get_bloginfo('name');
            }
            if (empty($ogp_description)) {
                $ogp_description = get_bloginfo('description');
            }
        }

        // ページの URL
        $ogp_url =  (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];

        // サイト名（初期値が設定されていなければ get_bloginfo('name') の値を設定）
        if (empty($ogp_site_name)) {
            $ogp_site_name = get_bloginfo('name');
        }

        // サイトの言語（初期値が設定されていなければ get_locale() の値を設定）
        if (empty($ogp_locale)) {
            $ogp_locale = get_locale();
        }

        // 出力する meta タグを生成
        $ogp = "\n";
        $ogp .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
        $ogp .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
        $ogp .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";

        if (is_home()) {
            $ogp .= '<meta property="og:description" content="中身のないブログ">' . "\n";
            $ogp .= '<meta name="description" content="犬好きの犬について記載しないブログ">' . "\n";
        } else if (is_archive() || (is_page())) {
            $ogp .= '<meta property="og:description" content="アーカイブページ' . esc_attr($ogp_title) . '">' . "\n";
            $ogp .= '<meta name="description" content="' . esc_attr($ogp_title) . '">' . "\n";
        } else if (is_single() || (is_404()) || (is_search())) {
            $ogp .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
            $ogp .= '<meta name="description" content="' . esc_attr($ogp_description) . '">' . "\n";
        }
        $ogp .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
        $ogp .= '<meta property="og:site_name" content="' . esc_attr($ogp_site_name) . '">' . "\n";
        $ogp .= '<meta property="og:locale" content="' . esc_attr($ogp_locale) . '">' . "\n";
        $ogp .= '<meta name="twitter:card" content="' . $twitter_card_type . '">' . "\n";

        // $twitter_site_username に値が設定されていれば
        if (!empty($twitter_site_username)) {
            $ogp .= '<meta name="twitter:site" content="' . $twitter_site_username . '">' . "\n";
        }
        // $fb_app_id に値が設定されていれば
        if (!empty($fb_app_id)) {
            $ogp .= '<meta property="fb:app_id" content="' . $fb_app_id . '">' . "\n";
        }
        // meta タグを出力
        echo $ogp;
    }
}
add_action('wp_head', 'add_ogp_metas');

// カテゴリー選択数を一つに制限する
//カテゴリーの選択を1つに制限
add_action('admin_print_footer_scripts', 'limit_category_select');
function limit_category_select()
{
?>
    <script type="text/javascript">
        jQuery(function($) {
            // 投稿画面のカテゴリー選択を制限
            var categorydiv = $('#categorydiv input[type=checkbox]');
            categorydiv.click(function() {
                $(this).parents('#categorydiv').find('input[type=checkbox]').attr('checked', false);
                $(this).attr('checked', true);
            });
            // クイック編集のカテゴリー選択を制限
            var inline_edit_col_center = $('.inline-edit-col-center input[type=checkbox]');
            inline_edit_col_center.click(function() {
                $(this).parents('.inline-edit-col-center').find('input[type=checkbox]').attr('checked', false);
                $(this).attr('checked', true);
            });

            $('#categorydiv #category-pop > ul > li:first-child, #categorydiv #category-all > ul > li:first-child, .inline-edit-col-center > ul.category-checklist > li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>');

        });
    </script>
<?php
}
