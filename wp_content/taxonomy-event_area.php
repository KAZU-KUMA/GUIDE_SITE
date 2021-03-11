<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <!-- パンくずリスト -->
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li><?php single_term_title(); ?>一覧</li>
            </ul>
                <!-- タイトル -->
                <h1 class="title"><?php single_term_title(); ?>一覧</h1>
                <!-- 説明 -->
                <p class="description">新潟県内のイベント情報をご紹介。祭りや伝統行事、花火大会やイルミネーション、グルメ・フードフェス、アート・スポーツなど、お好みのカテゴリーや、エリア、開催日からイベントを簡単検索！!</p>
                <!-- リスト一覧 -->
                <ul class="event_lists flex_tab">
                <!-- ページネーション設定、条件指定して記事を取得 -->
                <?php
                    $paged = get_query_var('paged') ?: 1;
                    $args  = array(
                      'post_type' => 'event',
                      'posts_per_page' => eventCount, 
                      'paged' => $paged,
                      'tax_query' => [[
                        'taxonomy' => 'event_area',
                        'field' => 'slug',
                        'terms' => get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')),
                    ]],
                    );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <li class="event_list">
                                <a href="<?=esc_url(get_the_permalink($post->ID));?>">
                                    <div class="list_content">
                                        <!-- 画像 -->
                                        <div class="photo_area">
                                            <img src="<?= getImage('event_image')?>" alt="">
                                        </div>
                                        <!-- ラベル -->
                                        <?php
                                        $areas = get_field('event_area');
                                        if( $areas ): ?>
                                            <div class="label">
                                                <?php foreach( $areas as $area ): ?>
                                                    <p class="label_area<?=esc_html($area['value']); ?> area"><?=esc_html($area['label']); ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- 日付 -->
                                        <p class="days bold"><?=esc_html(get_field('event_day'));?></p>
                                        <!-- イベントタイトル -->
                                        <p class="event_title bold"><?=esc_html(get_field('event_title'));?></p>  
                                        <!-- イベント説明 -->
                                        <p class="event_description area_size"><?=esc_html(limit_length( get_field('event_text'), textLength));?></p>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile;
                    endif; ?>
                </ul>
                   <?php /* ページネーションの表示 */
                    if (function_exists( 'pagination' )) :
                        pagination( $the_query->max_num_pages, $paged );  
                    endif;
                    wp_reset_postdata();?>             
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>