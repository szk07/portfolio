<?php
function connect(){
 $dsn = 'mysql:dbname=Portfolio; host=localhost; charset=utf8';
 $usr = 'root';
 $pass = 'root';

 try{
  $db = new PDO($dsn, $usr, $pass);
 }catch(PDOException $e){
  exit("DBに接続できません。：{$e->getMessage()}");
 }
 return $db;
}
?>
