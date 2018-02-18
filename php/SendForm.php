<?php
function es($str){
 return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

mb_language('Japanese');
mb_internal_encoding('UTF-8');
$masterMail = '@';
$send = date("Y/m/d H:i:s", time());
$name = es($_POST['Name']);
$msg = es($_POST['Message']);
$to = es($_POST['Email']);
$subject = 'Portfolio：お問合せを受付ました';
$header = 'Form: Ogino Shizuka '.$masterMail.'\n';
$header .= 'Bcc: Portfolio '.$masterMail;
$body = <<<EOD
{$name}様\n\n
当Portfolioを閲覧いただきありがとうございます。\n
下記の通り、お問合せ内容を承りました。\n\n
-----------------\n
Date：{$send}\n
Name：{$name}\n
Email：{$to}\n
Message：\n
{$msg}\n
-----------------\n\n
いただいたお問合せを確認し、改めてご連絡いたします。\n
このメールにお心当たりのない場合は、\n
大変お手数ですが下記までご連絡のほどお願いいたします。\n\n
──　 Signature 　──────────────\n\n
　荻野 静香 / OGINO SHIZUKA\n
　Email: {$masterMail}\n\n
───────────────────────\n
EOD;
<<<<<<< HEAD
$admin = mb_send_mail($to, $subject, $body, $header);
=======
// $admin = mb_send_mail($to, $subject, $body, $header);
>>>>>>> b373378... add: submit後にalertを表示
header('Location: http://'.$_SERVER['HTTP_HOST'].'/#send');
?>
