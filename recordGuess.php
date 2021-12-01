<?php
include "lang.php";
require_once 'user.php';
session_start();
$id=$_SESSION["id"];
$record = $_POST["new_record"];
$user = $_SESSION['class_user'];
$pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_53ae102770f6a82', "ba3595a923b6d7", "75287824");
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