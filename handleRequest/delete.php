<?php
session_start();
include '../handleLanguage/lang.php';
$pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
$statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
$statement->bindValue(':id', $_SESSION['id']);
    
if($statement->execute()) {
    echo 'ok';
        session_destroy();
        $_SESSION = "";
   }
?>