'use strict';

{
// スライドショー
jQuery(document).ready(function(){
  jQuery('.slider').bxSlider({
      auto: true,
      mode: 'fade',
      pause: 5000,
      captions: true
  });
});
}


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
  //◇ボタンの表示設定
  jQuery(window).scroll(function(){
    if(jQuery(this).scrollTop()>80){
      //---- 画面を80pxスクロールしたら、ボタンを表示する
      topBtn.fadeIn();
    }else{
      //---- 画面が80pxより上なら、ボタンを表示しない
      topBtn.fadeOut();
    }
  });
  // ◇ボタンをクリックしたら、スクロールして上に戻る
  topBtn.click(function(){
    jQuery('body,html').animate({
    scrollTop: 0},500);
    return false;
  });
});