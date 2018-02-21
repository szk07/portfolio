<?php
require_once '../../php/Connect.php';
require_once '../../php/Escape.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title>登録一覧：Form Sample</title>
 <link rel="canonical" href="/">
 <link rel="stylesheet" href="style.css">
</head>
 <body>
  <h1>登録一覧：Form Sample</h1>
  <table>
   <thead>
    <tr>
     <th>管理番号</th>
     <th>名前</th>
     <th>メールアドレス</th>
     <th>メッセージ</th>
     <th>受付日</th>
    </tr>
   </thead>
   <tbody>
    <?php
    try{
     $db = connect();
     $stmt = $db->prepare('SELECT * FROM SampleForm');
     $stmt->execute();

     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
     <td><?php print es($row['id']); ?></td>
     <td><?php print es($row['Name']); ?></td>
     <td><?php print es($row['Email']); ?></td>
     <td><?php print preg_replace('/\n/', "<br>", $row['Message']); ?></td>
     <td><?php print es($row['time']); ?></td>
    </tr>
    <?php
     }
    }catch(PDOException $e){
     exit("エラーが発生しました。");
    }
    ?>
   </tbody>
  </table>
  </tr>
 </body>
</html>
