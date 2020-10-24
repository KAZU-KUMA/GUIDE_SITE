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