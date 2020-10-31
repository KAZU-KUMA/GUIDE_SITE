<?php $GLOBALS['ADDITIONAL_HEAD'] = function() {?>
    <!-- このページのみCSS -->
	<link rel="stylesheet" href="<?=get_template_directory_uri();?>/css/news.css">
<?php }?>
<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">TOP</a></li>
                <li>ニュース一覧</li>
            </ul>
            <h1 class="title">ニュース一覧</h1>
            <?php
                $paged = get_query_var('paged') ?: 1;
                $args  = array(
                    'post_type' => 'news',
                    'posts_per_page' => 3, 
                    'paged' => $paged,
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    $article = SCF::get('news'); 
                    foreach ($article as $news): ?>
                    <dl>
                        <dt class="days"><?= esc_html($news['news_day']); ?></dt>
                        <dt class="news_title"><?= esc_html($news['news_title']); ?></dt>
                        <dd class="news_text"><?= esc_html($news['news_text']); ?></dd>
                    </dl>

                    <? endforeach; 
                    endwhile;
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