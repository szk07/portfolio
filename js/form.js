$(function(){
 var formArea = $('#contact input, #contact textarea');
 var formAry;
 var mail = 'Email';
 var mailCheck = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
 var $confirm = $('input.confirm');

 //Error判定
 formArea.blur(function(){
  var $val = $(this).val();
  var $dl = $(this).parents('dl');
  if(!$val){
   var ms = '必須項目です。';
   addError($dl, ms);
  }else if($(this).attr('name')==mail && !$val.match(mailCheck)){
   var ms = 'アドレスの形式が正しくありません。';
   addError($dl, ms);
  }else{
   rmError($dl);
  }
 });
 //submit判定
 formArea.keyup(function(){
  var flg = true;
  formAry = formArea.serializeArray();
  for(i=0; i<formAry.length; i++){
   if(!formAry[i].value || (formAry[i]['name']==mail && !formAry[i].value.match(mailCheck))){
    flg = false;
   }
  }
  if(flg === true){
   rmError($(this).parents('dl'));
   valid();
  }else{
   invalid();
  }
 });

 //エラー表示処理
 function addError($dl, ms){
  $dl.addClass('error');
  $dl.find('span.er').remove();
  $dl.find('dt').append('<span class="er">'+ms+'</span>')
  $dl.find('span.er')
   .fadeIn(300)
   .animate({bottom:'-8px'}, {duration: 500, queue: false});
 }
 function rmError($dl){
  $dl.removeClass('error');
  $dl.find('span.er').remove();
 }

 //confirm処理
 function valid(){
  $confirm.removeClass('off');
  $confirm.prop('disabled', false);
 }
 function invalid(){
  $confirm.addClass('off');
  $confirm.prop('disabled', true);
 }

 //confirmモーダル処理
 var touchStart;
 $(window).on('touchstart', function(event) {
  touchStart = event.originalEvent.changedTouches[0].screenY;
 });
 $('#contact form .confirm').on('click', function(event){
  $('#contactModal').children('dl').remove();
  for(var i=0; i<formAry.length; i++){
   var formName = formAry[i]['name'];
   var formVal = formAry[i]['value'];
   if(formName === 'Message'){
    formVal = formVal.replace(/\r?\n/g, '<br>');
   }
   $('#contactModal .formAction')
    .before('<dl><dt>'+formName+'</dt><dd>'+formVal+'</dd></dl>');
  }
  //スクロール処理
  $(window).on('touchmove.noscroll', function(event){
   var current_y = event.originalEvent.changedTouches[0].screenY,
       height = $('.overlay').outerHeight(),
       is_top = touch_start_y <= current_y && $('.overlay')[0].scrollTop === 0,
       is_bottom = touch_start_y >= current_y && $('.overlay')[0].scrollHeight - $('.overlay')[0].scrollTop === height;
   if(is_top || is_bottom){
    event.preventDefault();
   }
  });
  $('html, body').css('overflow', 'hidden');
  $('.overlay').fadeIn(300);
 });

 //submit処理
 $('#contactModal .submit').click(function(){
  $('#contact form').submit();
 });
 //submit後のスクロール位置調整
 var windowPosition = function(){
  var wp;
  windowPosition = sessionStorage.getItem('wp');
  windowPosition = window.sessionStorage.getItem('wp');
  windowPosition = sessionStorage.windowPosition;

  $(window).scrollTop(windowPosition);
  sessionStorage.clear();
  window.sessionStorage.clear();

  $('#contactModal .submit').click(function(){
   windowPosition = $(window).scrollTop();
   sessionStorage.setItem('wp', windowPosition);
   window.sessionStorage.setItem('wp', windowPosition);
   sessionStorage.windowPosition = windowPosition;
  });
 }();
 // 送信完了後のアラート
 var submitAlert = function(){
  var submitHash = location.hash;
  if(submitHash === '#send'){
   swal({
    title: 'Message sent!',
    text: 'お問合せありがとうございます。\nメールアドレスに確認メールをお送りしました。',
    icon: 'success'
   });
   history.replaceState(null,null,'/');
  }
 }();
});
