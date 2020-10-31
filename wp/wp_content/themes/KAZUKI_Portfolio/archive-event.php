<?php $GLOBALS['ADDITIONAL_HEAD'] = function() {?>
    <!-- このページのみCSS -->
	<link rel="stylesheet" href="<?=get_template_directory_uri();?>/css/event.css">
<?php }?>
<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="">TOP</a></li>
                <li><?php the_title();?></li>
            </ul>

                <h1 class="title">イベント一覧</h1>
                <p class="description">新潟県内のイベント情報をご紹介。祭りや伝統行事、花火大会やイルミネーション、グルメ・フードフェス、アート・スポーツなど、お好みのカテゴリーや、エリア、開催日からイベントを簡単検索！!</p>

                <div class="nav_wrapper">
                    <nav class="btnArea">
                      <ul class="primary_nav clearfix fade">
                        <li>
                          <span class="btn">エリア別で探す</span>
                          <ul class="secondary_nav">
                            <!-- エリアラベルカラー -->
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
                          <!-- カスタム追加 -->
                          <ul class="secondary_nav">
                            <li><a href="/event/type/firework/">花火</a></li>
                            <li><a href="/event/type/festival/">祭り</a></li>
                            <li><a href="/event/type/sport/">スポーツ</a></li>
                            <li><a href="/event/type/other/">その他</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <ul class="event_lists">
                  <?php
                    $paged = get_query_var('paged') ?: 1;
                    $args  = array(
                      'post_type' => 'event',
                      'posts_per_page' => 3, 
                      'paged' => $paged,
                    );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <li class="event_list">
                                <a href="<?=esc_url(get_the_permalink($post->ID));?>">
                                    <div class="list_content">
                                        <div class="photo_area">
                                            <img src="<?= getImage('event_image')?>" alt="">
                                        </div>
                                        <div class="top_area">
                                            <div class="label_area place"><?=esc_html(get_field('event_area'));?></div>
                                            <div class="event_date_archive"><?=esc_html(get_field('event_day'));?></div>
                                        </div>
                                        <div class="event_title"><?=esc_html(get_field('event_title'));?></div>                                       
                                        <div class="event_description"><?=esc_html(limit_length( get_field('event_text'),53));?></div>
                                    </div>
                                </a>
                            </li>
                        <? endwhile;
                    endif;

                    /* ページングの表示 */
                    if (function_exists( 'pagination' )) :
                        pagination( $the_query->max_num_pages, $paged );  
                    endif;

                    wp_reset_postdata();?>
                    
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>