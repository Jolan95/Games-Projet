<?php
session_start();
include 'lang.php';
  $pdo = new PDO('mysql:host=localhost;dbname=projet', "root", "");
  $statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
$statement->bindValue(':id', $_SESSION['id']);
   
    if($statement->execute()) {
    echo 'ok';
      session_destroy();
      $_SESSION = "";
   }
?>