<aside>
    <div class="listArea">
    <h2 class="sub_title">エリア別</h2>
        <ul>
            <li><a href="/event/area/niigata/">新潟エリア</a></li>
            <li><a href="/event/area/nagaoka/">長岡エリア</a></li>
            <li><a href="/event/area/joetsu/">上越エリア</a></li>
            <li><a href="/event/area/sado/">佐渡エリア</a></li>
        </ul>
    <h2 class="sub_title">シーズン別</h2>
        <ul>
            <li><a href="/event/season/spring/">1月~3月</a></li>
            <li><a href="/event/season/summer/">4月~6月</a></li>
            <li><a href="/event/season/autumn/">7月~9月</a></li>
            <li><a href="/event/season/winter/">10月~12月</a></li>
        </ul>
    <h2 class="sub_title">カテゴリ別</h2>
        <ul>
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
                <li><a href="<?=esc_url( $term_url ); ?>"><?=esc_html( $term->name ); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>