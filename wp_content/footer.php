<!-- トップページ、詳細ページ、一覧ページのみ(トップへ戻る) -->
<?php if(is_front_page() || is_singular("event") || is_archive()): ?>
<p id="pageTop"><a href="#"><i class="fas fa-chevron-up"></i></a></p>
<?php endif; ?>
    <footer class="footer">
        <div class="container">
            <!-- フッターメニュー -->
            <nav class="menu">
                <ul>
                    <li><a href="/privacy/">プライバシーポリシー</a></li>
                    <li><a href="/contact/">お問い合わせ</a></li>
                    <li><a href="/access/">アクセス</a></li>
                    <li><a href="/about/">このサイトについて</a></li>
                </ul>
            </nav>
            <!-- 管理者情報 -->
            <p class="about textCenter">
                <strong>●●法人 新潟県●●観光協会</strong><br>
                〒123-4567 新潟県●●市●●区●●番地●●-●<br>
                電話番号：123-4567-8900<br>
                案内受付：月曜日～金曜日8時30分～17時15分（年末年始・祝日を除く）
            </p>
        </div>
        <!-- コピーライト -->
        <p class="copyright textCenter">
            <small>Copyright &#169; 2020 ●●●● All Rights Reserved.</small>
        </p>
    </footer>
    <script src="<?=get_template_directory_uri();?>/js/scrpt.js" type="text/javascript"></script>
    <?php
		// 独自JS
		if (@$GLOBALS['ADDITIONAL_FOOTER']) {
			$GLOBALS['ADDITIONAL_FOOTER']();
		}
	?>
    <?php wp_footer(); ?>
</body>
</html>
