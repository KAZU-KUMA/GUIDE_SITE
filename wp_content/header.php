<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=<?php bloginfo( 'description' ); ?>>
    <!-- ファビコン -->
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/img/favicon.ico" type="image/png" sizes="16x16">
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <?php wp_head(); ?>
    <?php
		// 独自CSS
		if (@$GLOBALS['ADDITIONAL_HEAD']) {
			$GLOBALS['ADDITIONAL_HEAD']();
        }
    ?>
</head>
<body <?php body_class(); ?>>
<?php
	if(is_front_page()){
	/* トップページ */
?>
    <!-- ローディング設定 -->
    <div class="loading">
         <img src="<?= get_template_directory_uri(); ?>/img/loading.gif" />
    </div>
    <header class="header">
    <div class="header_container">
        <!-- ロゴ -->
        <div class="logo">
            <h1>新潟県観光ガイド</h1>
        </div>
    </div>
    <!-- スライド -->
    <div class="slider lazy">
    <?php for ($i = 1; $i <= 5; $i++):?>
        <?php if ($slide_image = getImage('slide_image' . $i)):?>
            <div class="slick-slide"><img data-lazy="<?=$slide_image;?>" height="600px" width=100%  alt=""></div>
        <?php endif?>
    <?php endfor?>
    </div>
    <!-- ヘッダーメニュー -->
    <div class="nav_wrapper">
        <nav class="header_menu_top header_menu">
            <ul>
                <li><a href="/">ホーム</a></li>
                <li><a href="/news/">お知らせ</a></li>
                <li><a href="/event/">イベント情報</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
            </ul>
        </nav>
                <!-- ハンバーガーメニュー --> 
                <div class="Toggle">
                　　<span></span>
                　　<span></span>
                　　<span></span>
                </div>
    </div>
    </header>

	<?php
	}else{
	/* トップページ下層 */
    ?>
    <header class="header">
    <div class="container">
        <!-- ロゴ -->
        <a href="/">
            <div class="left">
                <h1>新潟県観光ガイド</h1>
            </div>
        </a>

        <div class="right">
            <!-- ナビメニュー -->
            <nav class="header_menu">
            <ul>
                <li><a href="/">ホーム</a></li>
                <li><a href="/news/">お知らせ</a></li>
                <li><a href="/event/">イベント情報</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
            </ul>
            </nav>
            <!-- ハンバーガーメニュー --> 
            <div class="Toggle">
            　　<span></span>
            　　<span></span>
            　　<span></span>
            </div>
        </div>
    </div>
    </header>
<?php }?>