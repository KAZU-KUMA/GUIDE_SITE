<?php
// CSSを読み込む
function my_styles() {
	wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

// JavaScriptを読み込む
function my_scripts() {
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// 文字数制限、limitを超えた場合、末尾を…に置換
function limit_length( $str, $limit ) {
	return mb_strlen( $str ) > $limit ? mb_substr( $str, 0, $limit - 1 ) . '…' : $str;
}
