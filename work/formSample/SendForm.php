<?php
require_once '../../php/Connect.php';
require_once '../../php/Escape.php';

$name = es($_POST['name']);
$to = es($_POST["mail"]);
$msg = es($_POST['msg']);
$gen = !empty($_POST['gen']) ? es($_POST['gen']) : '';
if(!empty($_POST['bard']) && is_array($_POST['bard'])){
 $bard = implode(',', $_POST['bard']);
}else{
 $bard = '';
}

try{
 $db = connect();
 $sql = 'INSERT INTO SampleForm(Name, Email, Message, gen, bard, time)
                VALUES (:name, :mail, :msg, :gen, :bard, NOW())';
 $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
 $stmt->execute(array(':name' => $name,
                      ':mail' => $to,
                      ':msg' => $msg,
                      ':gen' => $gen,
                      ':bard' => $bard));
 $db = NULL;
}catch(PDOException $e){
 exit("エラーが発生しました。：{$e->getMessage()}");
}

header('Location: http://'.$_SERVER['HTTP_HOST'].'/work/formSample/form.php#send');
?>
