<?php
session_start();
include 'lang.php';
$pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_53ae102770f6a82', "ba3595a923b6d7", "75287824");
  $statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
$statement->bindValue(':id', $_SESSION['id']);
   
    if($statement->execute()) {
    echo 'ok';
      session_destroy();
      $_SESSION = "";
   }
?>