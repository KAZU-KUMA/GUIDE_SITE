<?php $GLOBALS['ADDITIONAL_HEAD'] = function() {?>
    <!-- このページのみCSS -->
	<link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/event.css">
<?php }?>
<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
    <?php get_template_part('sidebar'); ?>
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li><a href="/event/">イベント一覧</a></li>
                <li><?php the_title();?></li>
            </ul>
                <h1 class="title"><?=esc_html(get_field('event_title'));?></h1>
                <p class="label_area place"><?=esc_html(get_field('event_area'));?></p>
                <p class="description"><?=esc_html(get_field('event_text'));?></p>
                <div class="photo_area">
                    <img src="<?= getImage('event_image')?>" alt="">
                </div>
                <div class="event_info">
                    <h1 class="sub_title">基本情報</h1>
                    <table class="tableList">
                        <tr><th>開催期間</th><td><?=esc_html(get_field('event_day'));?></td></tr>
                        <tr><th>開催時間</th><td><?=esc_html(get_field('event_time'));?></td></tr>
                        <tr><th>住所</th><td><?=esc_html(get_field('event_place'));?></td></tr>
                        <tr><th>電話番号</th><td><?=esc_html(get_field('event_tel'));?></td></tr>
                        <tr><th>料金</th><td><?=number_format(esc_html(get_field('event_price')));?></td></tr>
                        <tr><th>備考</th><td><?=esc_html(get_field('event_other'));?></td></tr>
                    </table>
                </div>
                <!-- 一覧戻る -->
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>