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
    <!-- スライド用CSS -->      
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <?php
		// 追加のヘッド
		if (@$GLOBALS['ADDITIONAL_HEAD']) {
			$GLOBALS['ADDITIONAL_HEAD']();
        }
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
// <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    ?>
    
    <?php wp_head(); ?>
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
        <img src="<?= get_template_directory_uri(); ?>/img/img_slide01.png" width="100%" alt="">
        <img src="<?= get_template_directory_uri(); ?>/img/img_slide02.png" width="100%" alt="">
        <img src="<?= get_template_directory_uri(); ?>/img/img_slide03.png" width="100%" alt="">
    </div>
    <!-- ヘッダーメニュー -->
    <div class="nav_wrapper">
        <nav class="header_nav_top">
        <ul>
            <li><a href="/">ホーム</a></li>
            <li><a href="/news/">お知らせ</a></li>
            <li><a href="/event/">イベント情報</a></li>
            <li><a href="/contact/">お問い合わせ</a></li>
        </ul>
        </nav>
    </div>
    </header>

	<?php
	}else{
	/* トップページ下層 */
    ?>
    
    <!-- ヘッダーについて -->
    <header class="header">
    <!-- ヘッダーについて -->
    <div class="header_container">
        <div class="inner">
            <!-- 左側ロゴ -->
            <div class="headerLeft">
                <h1>新潟県観光ガイド</h1>
            </div>
        <!-- ヘッダーメニュー -->
            <div class="headerRight">
                <div class="nav_wrapper">
                    <nav class="header_nav">
                    <ul>
                        <li><a href="/">ホーム</a></li>
                        <li><a href="/news/">お知らせ</a></li>
                        <li><a href="/events/">イベント情報</a></li>
                        <li><a href="/contact/">お問い合わせ</a></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </header>

<?php }?>
