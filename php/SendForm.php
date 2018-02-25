<?php
require_once 'Connect.php';
require_once 'Escape.php';

$name = es($_POST['name']);
$msg = es($_POST['msg']);
$to = es($_POST['mail']);

try{
 $db = connect();
 $sql = 'INSERT INTO ContactForm(Name, Email, Message, time)
                VALUES (:name, :mail, :msg, NOW())';
 $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
 $stmt->execute(array(':name' => $name, ':mail' => $to, ':msg' => $msg));
 $db = NULL;
}catch(PDOException $e){
 exit("エラーが発生しました。：{$e->getMessage()}");
}

require_once 'SendForm_mail.php';
$admin = mb_send_mail($to, $subject, $body, $header);

header('Location: http://'.$_SERVER['HTTP_HOST'].'/#send');
?>
