<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <!-- パンくずリスト -->
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li>ニュース一覧</li>
            </ul>
            <!-- タイトル -->
            <h1 class="title">ニュース一覧</h1>
            <!-- ページネーション設定、条件指定して記事を取得 -->
            <?php
                $paged = get_query_var('paged') ?: 1;
                $args  = array(
                    'post_type' => 'news',
                    'posts_per_page' => newsCount, 
                    'paged' => $paged,
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    $article = SCF::get('news'); 
                    foreach ($article as $news): ?>
                    <dl>
                        <!-- 日付 -->
                        <dt class="days bold"><?= esc_html($news['news_day']); ?></dt>
                        <!-- ニュースタイトル -->
                        <dt class="news_title bold"><?= esc_html($news['news_title']); ?></dt>
                        <!-- ニュース説明 -->
                        <dd class="news_text"><?= esc_html($news['news_text']); ?></dd>
                    </dl>
                    <? endforeach; 
                    endwhile;
                endif;
                /* ページネーションの表示 */
                if (function_exists( 'pagination' )) :
                    pagination( $the_query->max_num_pages, $paged );  
                endif;
                wp_reset_postdata();?>
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>