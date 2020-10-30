'use strict';

{
// スライドショー
$(document).ready(function(){
  $('.slider').bxSlider({
      auto: true,
      mode: 'fade',
      pause: 5000,
      captions: true
  });
});
}


// ドロップメニュー
$(function() {
  $(".fade > li").hover(
    function() {
      $(this)
        .find(".secondary_nav")
        .stop(true)
        .fadeIn(500);
    },
    function() {
      $(this)
        .find(".secondary_nav")
        .fadeOut(500);
    }
  );
});

//page topボタン
$(function(){
  var topBtn=$('#pageTop');
  topBtn.hide();
  //◇ボタンの表示設定
  $(window).scroll(function(){
    if($(this).scrollTop()>80){
      //---- 画面を80pxスクロールしたら、ボタンを表示する
      topBtn.fadeIn();
    }else{
      //---- 画面が80pxより上なら、ボタンを表示しない
      topBtn.fadeOut();
    }
  });
  // ◇ボタンをクリックしたら、スクロールして上に戻る
  topBtn.click(function(){
    $('body,html').animate({
    scrollTop: 0},500);
    return false;
  });
});