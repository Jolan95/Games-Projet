<?php
include  '../handleLanguage/lang.php';
require_once '../Class/user.php';
session_start();
$password = $_POST["password"];


if(isset($_POST['password'])){

    if(strlen($_POST['password']) > 7 ){
        $user = $_SESSION['class_user'];
        $id=$_SESSION["id"];
        $password = $_POST["password"];
       
        $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
        $statement = $pdo->prepare('UPDATE users SET  password = :password WHERE id = :id');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->bindValue(":password", password_hash(htmlspecialchars($password), PASSWORD_BCRYPT));
        $statement->bindValue(":id", $id);
        if($statement->execute()){
            echo $passwordChanged;                
        } else {
            echo $mistakeRecordingDB;
        }
    } 
}
    
  

