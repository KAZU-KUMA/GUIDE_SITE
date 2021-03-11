<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <!-- パンくずリスト -->
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li>イベント一覧</li>
            </ul>
                <!-- タイトル -->
                <h1 class="title">イベント一覧</h1>
                <!-- 説明 -->
                <p class="description">新潟県内のイベント情報をご紹介。祭りや伝統行事、花火大会やイルミネーション、グルメ・フードフェス、アート・スポーツなど、お好みのカテゴリーや、エリア、開催日からイベントを簡単検索！!</p>
                <div class="nav_wrapper">
                    <!-- エリア別メニュー -->
                    <nav class="btnArea">
                      <ul class="primary_nav clearfix fade">
                        <li>
                          <span class="btn">エリア別で探す</span>
                          <ul class="secondary_nav">
                            <li><a href="/event/area/niigata/">新潟エリア</a></li>
                            <li><a href="/event/area/nagaoka/">長岡エリア</a></li>
                            <li><a href="/event/area/joetsu/">上越エリア</a></li>
                            <li><a href="/event/area/sado/">佐渡エリア</a></li>
                          </ul>
                        </li>
                        <li>
                          <span class="btn">シーズン別で探す</span>
                          <ul class="secondary_nav">
                            <li><a href="/event/season/spring/">1月~3月</a></li>
                            <li><a href="/event/season/summer/">4月~6月</a></li>
                            <li><a href="/event/season/autumn/">7月~9月</a></li>
                            <li><a href="/event/season/winter/">10月~12月</a></li>
                          </ul>
                        </li>
                        <li>
                          <span class="btn">カテゴリ別で探す</span>
                          <ul class="secondary_nav">
                            <?php
                            $args = [
                              'orderby' => 'count',
                              'order' => 'desc',
                              'hide_empty' => true,
                              'number' => 10,
                            ];
                            $terms = get_terms( 'event_type', $args );
                            foreach( $terms as $term ) :
                              $term_url = get_term_link( $term->term_id, 'event_type' ); ?>
                              <li><a href="<?php echo esc_url( $term_url ); ?>"><?php echo esc_html( $term->name ); ?></a></li>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <ul class="event_lists flex_tab">
                  <!-- ページネーション設定、条件指定して記事を取得 -->
                  <?php
                    $paged = get_query_var('paged') ?: 1;
                    $args  = array(
                      'post_type' => 'event',
                      'posts_per_page' => eventCount, 
                      'paged' => $paged,
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