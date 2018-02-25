<?php
require_once '../../php/Connect.php';
require_once '../../php/Escape.php';

$name = es($_POST['name']);
$msg = es($_POST['meg']);
$to = es($_POST["mail"]);

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

header('Location: http://'.$_SERVER['HTTP_HOST'].'/work/formSample/form.php#send');
?>
