$(function(){
 var formArea = $('#contact input, #contact textarea');
 var formAry;
 var mail = 'Email';
 var mailCheck = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
 var $confirm = $('input.confirm');

 formArea.blur(function(){
  //formArea判定
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
  //submit判定
  var flg = true;
  formAry = formArea.serializeArray();
  for(i=0; i<formAry.length; i++){
   if(!formAry[i].value || (formAry[i]['name']==mail && !formAry[i].value.match(mailCheck))){
    flg = false;
   }
  }
  if(flg === true){
   valid();
  }else{
   invalid();
  }
 });

 //formArea処理
 function addError($dl, ms){
  $dl.addClass('error');
  $dl.find('span').remove();
  $dl.find('dt').append('<span>'+ms+'</span>')
  $dl.find('span')
   .fadeIn(300)
   .animate({bottom:'-8px'}, {duration: 500, queue: false});
 }
 function rmError($dl){
  $dl.removeClass('error');
  $dl.find('span').remove();
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
 $('#contact form .confirm').on('click', function(event){
  $('#contactModal').children('dl').remove();
  for(var i=0; i<formAry.length; i++){
   $('#contactModal .formAction')
    .before('<dl><dt>'+formAry[i]['name']+'</dt><dd>'+formAry[i]['value']+'</dd></dl>');
  }
  $('.overlay').fadeIn(300);
 });

 //submit処理
 $('#contactModal .submit').click(function(){
  $('#contact form').submit();
 });
 //submit後の表示位置
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
});
