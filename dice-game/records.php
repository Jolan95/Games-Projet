<?php
include  '../handleLanguage/lang.php';
require_once '../Class/user.php';
session_start();

$newRecord = $_POST['new_record'] ;
$user = $_SESSION['class_user'];
$pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
$statement = $pdo->prepare('UPDATE users SET record_dice= :newRecord WHERE id = :id');
$statement->setFetchMode(PDO::FETCH_CLASS, 'User');
$statement->bindValue(':id', $user->getId());
$statement->bindValue(':newRecord',  $_POST['new_record']);
if ($statement->execute()) {
    $users = $statement->fetch();
    $user->setRecordDice($newRecord);
    $_SESSION['record_dice'] = $user->getRecordDice();
    echo $capNewRecord.' : '.$_SESSION['record_dice'];
} else {
    echo $errorRecordingDB;
}
