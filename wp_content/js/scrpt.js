'use strict';

// スライドショー
jQuery(function() {
    jQuery('.slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1500,
    arrows: false,
    dots: true,
    fade: true,
    infinite: true,
    mobileFirst: true,
    pauseOnHover: false,
    });
});

//遅延表示
jQuery(function() {
  jQuery('.lazy').slick({
    lazyLoad: 'ondemand',
  }); 
});

// ローディング
jQuery(window).on('load', function(){
	jQuery('.loading').fadeOut();	
});

// ドロップメニュー
jQuery(function() {
  jQuery(".fade > li").hover(
    function() {
      jQuery(this)
        .find(".secondary_nav")
        .stop(true)
        .fadeIn(500);
    },
    function() {
      jQuery(this)
        .find(".secondary_nav")
        .fadeOut(500);
    }
  );
});

//page topボタン
jQuery(function(){
  var topBtn=jQuery('#pageTop');
  topBtn.hide();
  //ボタンの表示設定
  jQuery(window).scroll(function(){
    if(jQuery(this).scrollTop()>80){
      //画面を80pxスクロールしたら、ボタンを表示する
      topBtn.fadeIn();
    }else{
      //画面が80pxより上なら、ボタンを表示しない
      topBtn.fadeOut();
    }
  });
  // ボタンをクリックしたら、スクロールして上に戻る
  topBtn.click(function(){
    jQuery('body,html').animate({
    scrollTop: 0},500);
    return false;
  });

//ハンバーガーメニュー
jQuery(function() {
  　jQuery('.Toggle').click(function() {
  　　jQuery(this).toggleClass('active');
  
  　if (jQuery(this).hasClass('active')) {
  　　jQuery('.NavMenu').addClass('active');　 
  　} else {
  　　jQuery('.NavMenu').removeClass('active'); 
  　}
  　});
  });
});