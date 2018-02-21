<?php
require_once '../../php/Connect.php';
require_once '../../php/Escape.php';

$name = es($_POST['Name']);
$msg = es($_POST['Message']);
$to = es($_POST["Email"]);

try{
 $db = connect();
 $sql = 'INSERT INTO SampleForm(Name, Email, Message, time)
                VALUES (:name, :mail, :msg, NOW())';
 $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
 $stmt->execute(array(':name' => $name, ':mail' => $to, ':msg' => $msg));
 $db = NULL;
}catch(PDOException $e){
 exit("エラーが発生しました。：{$e->getMessage()}");
}

header('Location: http://'.$_SERVER['HTTP_HOST'].'/work/formSample/form.html#send');
?>
