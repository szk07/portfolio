<?php
require_once 'Connect.php';
require_once 'Escape.php';

$name = es($_POST['Name']);
$msg = es($_POST['Message']);
$to = es($_POST['Email']);

require_once 'SendForm_mail.php';
$admin = mb_send_mail($to, $subject, $body, $header);

header('Location: http://'.$_SERVER['HTTP_HOST'].'/#send');
?>
