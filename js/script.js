/* HeaderSize */
$(window).on('load resize', function(){
 var wh = ($(window).height()<650) ? $(window).height() : 650;
 var wf = ($(window).width()<678) ? 30 : 40;
 $('header').css('height', (wh-wf)+'px');
});

/* SmoothScroll */
$(function(){
 $('a[href^="#"]').click(function(){
  var speed = 800;
  var href = $(this).attr('href');
  var target = $(href == '#' || href == '' ? 'html' : href);
  var position = target.offset().top;
  $('html, body').animate({scrollTop: position}, speed, 'swing');
  return false;
 });
});

/* Modal */
$(function(){
 $('.overlay').on('click', function(event){
  if(!$(event.target).closest('.modal').length){
   closeModal();
  }
 });
 $('.close').on('click', function(){
  closeModal();
 });
 function closeModal(){
  $('.overlay').animate({ opacity: 0 }, 300, function(){
   $(window).off('touchmove.noscroll');
   $('.overlay').scrollTop(0).hide().removeAttr('style');
   $('html, body').removeAttr('style');
  });
 }
});
