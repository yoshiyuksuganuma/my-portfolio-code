<?php
//基本機能を追加
add_action('after_setup_theme', function () {
    add_theme_support('title-tag'); // tiltleタグの追加
    add_theme_support('post-thumbnails'); //サムネイル機能の追加
    register_nav_menus([
        'global_nav' => 'グローバルナビゲーション',
        'footer_menu' => 'フッターメニュー'
    ]);
    add_theme_support('widgets'); // ウィジェットの追加
});

//通常投稿のアーカイブ設定を有効にする
function post_has_archive($args, $post_type)
{

    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'blog'; // スラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//カスタムヘッダーを有効にする
$custom_header_defaults = array(
    'flex-height' => true,
    'flex-width' => true,
    'video' => true,
    'width' => 1800,
    'height' => 400,
    'header-text' => true, //ヘッダー画像上にテキストをかぶせる
    'admin-head-callback' => 'admin_header_style', //管理画面でヘッダープレビューをスタイリングするためのコールバックを指定
);
add_theme_support('custom-header', $custom_header_defaults);

//カスタム投稿works,投稿アーカイブページの並び順を変更
function change_posts_per_page($query)
{
    //管理画面,メインクエリに干渉しないために必須
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    //カスタム投稿「works」アーカイブページの表示件数を5件、ふりがなの昇順でソート
    if ($query->is_post_type_archive('works')) {
        $query->set('posts_per_page', '6');
        $query->set('order', 'DESC'); //昇順
        return;
    }
    if ($query->is_post_type_archive('post')) {
        $query->set('posts_per_page', '6');
        $query->set('order', 'ASC'); //昇順
        return;
    }
}
add_action('pre_get_posts', 'change_posts_per_page'); //pre_get_postsでメインクエリが実行される前のクエリを書き換える
//functions.phpからアクションフックを使用して各cssファイル js を読み込む、jqueryCDNはプラグインより先に読み込む
function read_enqueue_styles()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('slick1', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css');
    wp_enqueue_style('slick2', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    if (!is_admin()) { //管理画面じゃなかったら
        wp_deregister_script('jquery'); //コンフリクトを避けるためwordpress同梱のjqueryを読み込み中止
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.12.4.js', array(), '1.12.4');
    }
    if (is_single(384)) {
        wp_enqueue_script('jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
        wp_enqueue_script('jqueryui-touch-punch', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js');
    }
    wp_enqueue_script('velocity', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js');
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');
}
add_action('wp_enqueue_scripts', 'read_enqueue_styles');

//カスタム投稿タイプを追加
function init_func()
{

    register_post_type('works', [
        'labels' => [
            'name' => ('制作実績'),
        ],
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt', 'author'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'show_in_rest' => true,
    ]);
};
add_action('init', 'init_func');

//不要なbodyのクラスを削除
add_filter('body_class', 'remove_body_class');
function remove_body_class($wp_classes)
{
    foreach ($wp_classes as $key => $value) {
        //.blogを削除する
        if ($value == 'blog') unset($wp_classes[$key]);
    }
    return $wp_classes;
}


//thanksページへ遷移させる
add_action('wp_footer', 'add_thanks_page');
function add_thanks_page()
{
    echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
location = 'https://yoshiyukisuganuma.com/thanks/';
}, false );
</script>
EOD;
}

//headタグの中のwordpressのバージョン番号を消す
function remove_cssjs_ver2($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver2', 9999);
add_filter('script_loader_src', 'remove_cssjs_ver2', 9999);
//meta name=”generator”は不要なので削除
remove_action('wp_head', 'wp_generator');
//絵文字は使用しないので削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//recaptacha v3 をお問い合わせフォーム以外でのページでは非表示にする
function load_recaptcha_js()
{
    if (!is_page('contact')) {
        wp_deregister_script('google-recaptcha');
    }
}
add_action('wp_enqueue_scripts', 'load_recaptcha_js');



// ページネーションのHTMLカスタマイズ
function custom_pagination_html($template)
{
    $template = '
    <nav class="pagination">
        <h2 class="screen-reader-text">%2$s</h2>
        %3$s
    </nav>';
    return $template;
}
add_filter('navigation_markup_template', 'custom_pagination_html');
