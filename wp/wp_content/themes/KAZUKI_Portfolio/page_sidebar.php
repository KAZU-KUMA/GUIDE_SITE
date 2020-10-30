<?php
/*
Template Name: サイドバーあり
*/
?>
<?php get_header(); ?>
<main>        
    <!-- コンテンツ100% -->
    <div class="contents">
    <?php  get_template_part('sidebar'); ?>
        <!-- コンテナ960px -->
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="">TOP</a></li>
                <li><?php the_title() ?></li>
            </ul>
            <?php if (have_posts()):
                        while (have_posts()) :
                            the_post();
                            the_content();
                        endwhile;
                    endif; ?>
        </div> <!--containers-->
    </div> <!--contents-->
<main>
<?php get_footer(); ?>