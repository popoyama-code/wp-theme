<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'reset-style', get_template_directory_uri() . '/css/ress.min.css' );
    wp_enqueue_style( 'navi-style', get_template_directory_uri() . '/css/responsive-nav.css' );
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css' );
    // wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/theme.css' );
    wp_enqueue_script( 'navi-script', get_template_directory_uri() . '/js/responsive-nav.min.js' );
    wp_enqueue_script( 'grid-script', get_template_directory_uri() . '/js/magic-grid.min.js' );
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme.js', array(), false, true );
}

add_action( 'after_setup_theme', 'hook_after_setup' );
function hook_after_setup() {    
    register_nav_menu( 'main-menu','メインメニュー');
    add_image_size( 'grid-thumbnail', 500, 5000 );
    add_theme_support( 'post-formats', array( 'image' ) );
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
}

// 不要なアクションの削除
remove_action( 'wp_head', 'wp_generator' );	
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// ライブラリ等のバージョン削除
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );
function remove_cssjs_ver2( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// the_archive_title 余計な文字を削除
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

// コメント欄表示変更
add_filter( "comment_form_defaults", "remove_my_comment_notes_before");
add_filter("comment_form_default_fields", "remove_my_comment_form");
add_filter("comment_form_fields", "arrange_my_comment_form");
function remove_my_comment_notes_before( $defaults) {
    $defaults['comment_notes_before'] = "";
    return $defaults;
}
function remove_my_comment_form($arg) {
    $arg['url'] = "";
    $arg['email'] = "";
    return $arg;
}
function arrange_my_comment_form( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

// xmlrpc.php無効化
add_filter('xmlrpc_enabled', '__return_false');

add_filter('wp_headers', 'remove_x_pingback'); 
function remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}

//wp-adminからリダイレクトさせない
add_filter('auth_redirect_scheme', 'stop_redirect', 9999);
function stop_redirect($scheme) {
    if ( $user_id = wp_validate_auth_cookie( '',  $scheme) ) {
        return $scheme;
    }
    global $wp_query;
    $wp_query->set_404();
    get_template_part( 404 );
    exit();
}

add_action('init', 'remove_default_redirect');
function remove_default_redirect() {
    remove_action('template_redirect', 'wp_redirect_admin_locations', 1000);
}
?>