<?php
include "../handleLanguage/lang.php";
require_once '../Class/user.php';
session_start();
$id=$_SESSION["id"];
$record = $_POST["new_record"];
$user = $_SESSION['class_user'];
$pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
$statement = $pdo->prepare('UPDATE users SET  record_guess = :record WHERE id = :id');
$statement->setFetchMode(PDO::FETCH_CLASS, 'User');
$statement->bindValue(":record", $record);
$statement->bindValue(":id", $id);
if($statement->execute()){
    $users = $statement->fetch();
    $user->setRecordGuess($record);
    $_SESSION['record_guess'] = $user->getRecordGuess();
    echo $alertHighScore;
} else {
    echo $errorRecordingDB;
}