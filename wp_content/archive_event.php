<?php $GLOBALS['ADDITIONAL_HEAD'] = function() {?>
    <!-- このページのみCSS -->
	<link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/event.css">
<?php }?>
<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="">TOP</a></li>
                <li><?php the_title() ?></li>
            </ul>
                </ul>
                <h1 class="title">イベント一覧</h1>
                <p class="description">新潟県内のイベント情報をご紹介。祭りや伝統行事、花火大会やイルミネーション、グルメ・フードフェス、アート・スポーツなど、お好みのカテゴリーや、エリア、開催日からイベントを簡単検索！!</p>

                <div class="nav_wrapper">
                    <nav class="btnArea">
                      <ul class="primary_nav clearfix fade">
                        <li>
                          <span class="btn">エリア別で探す</span>
                          <ul class="secondary_nav">
                            <li>
                              <a href="#">新潟エリア</a>
                            </li>
                            <li>
                              <a href="#">長岡エリア</a>
                            </li>
                            <li>
                              <a href="#">上越エリア</a>
                            </li>
                            <li>
                              <a href="#">佐渡エリア</a>
                            </li>
                          </ul>
                        </li>
              
                        <li>
                          <span class="btn">シーズン別で探す</span>
                          <ul class="secondary_nav">
                            <li>
                              <a href="#">1月~3月</a>
                            </li>
                            <li>
                              <a href="#">4月~6月</a>
                            </li>
                            <li>
                              <a href="#">7月~9月</a>
                            </li>
                            <li>
                              <a href="#">10月~12月</a>
                            </li>
                          </ul>
                        </li>
              
                        <li>
                          <span class="btn">カテゴリ別で探す</span>
                          <ul class="secondary_nav">
                            <li>
                              <a href="#">花火</a>
                            </li>
                            <li>
                              <a href="#">祭り</a>
                            </li>
                            <li>
                              <a href="#">スポーツ</a>
                            </li>
                            <li>
                              <a href="#">その他</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <ul class="event_lists">
                    <?php if (have_posts()):
                                while (have_posts()) :?>
                                    <li class="event_list">
                                    <a href="<?=esc_url(get_the_permalink($post->ID));?>">
                                        <div class="list_content">
                                            <div class="photo_area">
                                               <img src="<?= getImage('event_image')?>" alt="">
                                            </div>
                                            <div class="label_area place"><?=get_field('event_area')?></div>
                                            <div class="event_date"><?=esc_html(get_field('event_day'))?></div>
                                            <div class="event_description">
                                            <p><?=//esc_html(functions::limitTextLength(get_field('event_text'), 30, '...'))?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile;
                            endif; ?>
                                    </div> <!--containers-->
                 </ul>
            <div class="center">
                <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>