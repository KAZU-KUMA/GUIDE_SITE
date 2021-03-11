<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li><a href="/event/">イベント一覧</a></li>
                <li><?php the_title() ?></li>
            </ul>
                <h1 class="title"><?=esc_html(('event_title'))?></h1>
                <p class="label_area place"><?=esc_html(('event_area'))?></p>
                <p class="description"><?=esc_html(('event_text'))?></p>
                <div class="photo_area">
                    <img src="./lib/images/image01.png" alt="">
                </div>
                <div class="event_info">
                    <h1 class="sub_title">基本情報</h1>
                    <table class="tableList">
                        <tr><th>開催期間</th><td><?=esc_html((get_field('event_day'))?></td></tr>
                        <tr><th>開催時間</th><td><?=esc_html(('event_time'))?></td></tr>
                        <tr><th>住所</th><td><?=esc_html(('event_place'))?></td></tr>
                        <tr><th>電話番号</th><td><?=esc_html(('event_tel'))?></td></tr>
                        <tr><th>料金</th><td><?=number_format(esc_html(('event_price')))?></td></tr>
                        <tr><th>備考</th><td><?=esc_html(('event_other'))?></td></tr>
                    </table>
                </div>
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>