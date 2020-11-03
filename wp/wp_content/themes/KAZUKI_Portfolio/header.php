<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content=<?php bloginfo( 'description' ); ?>>
    <!-- ファビコン -->
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/img/favicon.ico" type="image/png" sizes="16x16">
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <?php wp_head(); ?>
    <?php
		// 追加のヘッド
		if (@$GLOBALS['ADDITIONAL_HEAD']) {
			$GLOBALS['ADDITIONAL_HEAD']();
        }
    ?>
</head>
<body>
<?php
	if(is_front_page()){
	/* トップページ */
?>
    <!-- ヘッダーについて -->
    <header class="header">
    <div class="header_container">
        <!-- 左側ロゴ -->
        <div class="header_logo_top">
            <h1>新潟県観光ガイド</h1>
        </div>
    </div>
    <!-- スライド -->
    <div class="slider">
    <?php for ($i = 1; $i <= 5; $i++):?>
        <?php if ($slide_image = getImage('slide_image' . $i)):?>
			<img src="<?=$slide_image;?>" height="600px"  alt="">
        <?php endif?>
    <?php endfor?>
    </div>
    <!-- ヘッダーメニュー -->
    <div class="nav_wrapper">
        <nav class="header_nav_top NavMenu">
                <ul class="menu">
                    <li class="menu_item"><a href="/">ホーム</a></li>
                    <li class="menu_item"><a href="/news/">お知らせ</a></li>
                    <li class="menu_item"><a href="/event/">イベント情報</a></li>
                    <li class="menu_item"><a href="/contact/">お問い合わせ</a></li>
                </ul>
                </nav>
                <!-- ハンバーガーメニュー部分 --> 
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
    
    <!-- ヘッダーについて -->
    <header class="header">
    <!-- ヘッダーについて -->
    <div class="container">
        <!-- 左側ロゴ -->
        <a href="/">
            <div class="left">
                <h1>新潟県観光ガイド</h1>
            </div>
        </a>

        <div class="right">
            <!-- ナビメニュー部分 -->
            <!-- <div class="nav_wrapper"> -->
                <nav class="NavMenu">
                <ul class="menu">
                    <li class="menu_item"><a href="/">ホーム</a></li>
                    <li class="menu_item"><a href="/news/">お知らせ</a></li>
                    <li class="menu_item"><a href="/event/">イベント情報</a></li>
                    <li class="menu_item"><a href="/contact/">お問い合わせ</a></li>
                </ul>
                </nav>
                <!-- ハンバーガーメニュー部分 --> 
                <div class="Toggle">
                　　<span></span>
                　　<span></span>
                　　<span></span>
                </div>
            <!-- </div> -->
        </div>
    </div>
    </header>
<?php }?>