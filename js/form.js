$(function(){
 var formArea = $('#contact input, #contact textarea');
 var $submit = $('input.submit');
 var mailCheck = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

 formArea.blur(function(){
  //formArea判定
  var $val = $(this).val();
  var $dl = $(this).parents('dl');
  if(!$val){
   var ms = '必須項目です。';
   addError($dl, ms);
  }else if($(this).attr('name')=='mail' && !$val.match(mailCheck)){
   var ms = 'アドレスの形式が正しくありません。';
   addError($dl, ms);
  }else{
   rmError($dl);
  }
  //submit判定
  var formAry = formArea.serializeArray();
  var flg = true;
  for(i=0; i<formAry.length; i++){
   if(!formAry[i].value || (formAry[i]['name']=='mail' && !formAry[i].value.match(mailCheck))){
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
  $submit.removeClass('off');
  $submit.prop('disabled', false);
 }
 function invalid(){
  $submit.addClass('off');
  $submit.prop('disabled', true);
 }

 //confirmモーダル処理
 $('#contact form .submit').on('click', function(event){
  $('.overlay').fadeIn(300);
 });
});
