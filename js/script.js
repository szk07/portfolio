/* HeaderSize */
$(window).on('load resize', function(){
  var wh = ($(window).height()<650) ? $(window).height() : 650;
  var wf = ($(window).width()<678) ? 30 : 40;
  $('header').css('height', (wh-wf)+'px');
});

$(function(){
  /* SmoothScroll */
  $('a[href^="#"]').click(function(){
    var speed = 800;
    var href = $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top;
    $('html, body').animate({scrollTop: position}, speed, 'swing');
    return false;
  });
});
