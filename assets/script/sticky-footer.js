'use strict';

/*=================================================
コンテンツの量が少ないページでもフッターを最下部に
===================================================*/
$(window).on("load resize", function () {
  let window_height = window.innerHeight
    ? window.innerHeight
    : $(window).innerHeight();
  $(".sticky-footer-wrapper").css("min-height", window_height + "px");
});