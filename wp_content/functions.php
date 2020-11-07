<?php
// CSSを読み込む
function my_styles() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', array(), '1.0', false);
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array('reset'), '1.0', false);
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array('reset'), '1.0', false);
    wp_enqueue_style( 'style-slide', get_template_directory_uri() . '/slick/slick.css', array(), '1.0', false);
    wp_enqueue_style( 'style-slide2', get_template_directory_uri() . '/slick/slick-theme.css', array(), '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'my_styles' );


//JQuery読み込み
function custom_print_scripts() {
    if (!is_admin()) {
        //デフォルトjquery削除
        wp_deregister_script('jquery');
        
        //読み込む
        wp_enqueue_script('jquery-js', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js' );
    }
}
add_action('wp_enqueue_scripts', 'custom_print_scripts');

// JavaScriptを読み込む
function my_scripts() {
    wp_enqueue_script( 'slide-script', get_template_directory_uri() . '/slick/slick.min.js', array(), '1.0', true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// 文字数制限、limitを超えた場合、末尾を…に置換
function limit_length( $str, $limit ) {
	return mb_strlen( $str ) > $limit ? mb_substr( $str, 0, $limit - 1 ) . '…' : $str;
}


//画像出力
function getImage($fieldName) {
	$img = get_field($fieldName);
	return wp_get_attachment_image_url($img, 'full');
}

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;   
    $paged = $paged ?: 1;      

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}

// 定数
//イベント説明文字数制限
define("textLength", 75);
//イベント一覧表示数
define("eventCount", 3);
//ニュース一覧表示数
define("newsCount", 5);