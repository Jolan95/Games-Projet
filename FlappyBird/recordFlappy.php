<?php
require_once '../user.php';
session_start();
$newRecord = $_POST['new_record'] ;
$user = $_SESSION['class_user'];


$pdo = new PDO('mysql:host=localhost;dbname=projet', "root", "");

$statement = $pdo->prepare('UPDATE users SET record_flappy= :newRecord WHERE id = :id');
$statement->setFetchMode(PDO::FETCH_CLASS, 'User');
$statement->bindValue(':id', $_SESSION['id']);
$statement->bindValue(':newRecord',  $_POST['new_record']);
if ($statement->execute()) {
    $users = $statement->fetch();
    $user->setRecordFlappy($newRecord);
    $_SESSION['record_flappy'] = $user->getRecordFlappy();
    
} 