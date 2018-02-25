<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title>メールフォームサンプル｜Portfolio</title>
 <link rel="canonical" href="/">
 <link rel="stylesheet" href="../../css/style.css">
 <link rel="stylesheet" href="form.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 </head>
 <body>
  <main>
   <section id="contact">
    <h2>Sample Form</h2>
    <p>
     フォームサンプルです。実際に送信する事も可能ですのでお試しください。<br>
     <span class="red">*</span>は必須項目です。
    </p>
    <form action="SendForm.php" method="post">
     <dl>
      <dt>Name <span class="red">*</span></dt>
      <dd><input type="text" name="name" required></dd>
     </dl>
     <dl>
      <dt>Email <span class="red">*</span></dt>
      <dd><input type="email" name="mail" required></dd>
     </dl>
     <dl>
      <dt>Message <span class="red">*</span></dt>
      <dd><textarea name="msg" required></textarea></dd>
     </dl>
     <p class="hr txt-l">よろしければお答えください。（※項目サンプル）</p>
     <dl>
      <dt>性別</dt>
      <dd>
       <input type="radio" name="gen" id="gen01" value="男性"><label for="gen01">男性</label>
       <input type="radio" name="gen" id="gen02" value="女性"><label for="gen02">女性</label>
       <input type="radio" name="gen" id="gen03" value="その他"><label for="gen03">その他</label>
      </dd>
     </dl>
     <dl>
      <dt>お好きな鳥（複数可）</dt>
      <dd>
       <?php
       $bard = ['すずめ','はと','にわとり','インコ','フクロウ','文鳥'];
       for($i=0; $i<count($bard); $i++){
        print "<input type='checkbox' name='bard' id='bard{$i}' value='{$bard[$i]}'><label for='bard{$i}'>{$bard[$i]}</label>";
       }
       ?>
      </dd>
     </dl>
     <p class="mt20">ご回答ありがとうございました。</p>
     <dl>
      <input type="button" class="confirm off" value="確認" disabled>
     </dl>
    </form>
    <div class="overlay">
     <div class="inner">
      <div id="contactModal" class="modal">
       <p>以下の内容でよろしければ<br class="sp">「SUBMIT」ボタンを押してください。</p>
       <div class="formAction">
        <input type="button" class="close" value="cancel">
        <input type="button" class="submit" value="Submit">
       </div>
      </div>
     </div>
    </div>
   </section>
  </main>
  <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="../../js/sweetalert.min.js"></script>
  <script src="../../js/script.js"></script>
  <script src="form.js"></script>
 </body>
</html>
