<?php

require_once '../user.php';
include '../lang.php';
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=projet', "root", "");
$user = $_SESSION['class_user'];


  if(isset($_POST['new_recordE'])){
    $statement = $pdo->prepare("UPDATE users SET record_ecap = :record WHERE id = :id");
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->bindValue(':record', $_POST["new_recordE"]);
    if($statement->execute()){
    $users = $statement->fetch();
    $user->setRecordEcap($_POST['new_recordE']);
    $_SESSION['record_Ecap'] = $user->getRecordEcap();
    echo $capNewRecord.' : '.$_POST['new_recordE'].'/10';
    } else {
        echo $errorRecordingDB;
    }
 };


  if(isset($_POST['new_recordM'])){
    $statement = $pdo->prepare("UPDATE users SET record_Mcap=:record WHERE id = :id");
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->bindValue(':record', $_POST['new_recordM']);
    if($statement->execute()){
        $users = $statement->fetch();
        $user->setRecordMcap($_POST['new_recordM']);
        $_SESSION['record_Mcap'] = $user->getRecordMcap();
        echo $capNewRecord.' : '.$_POST['new_recordM'].'/50';
    } else {
        echo $errorRecordingDB;
    }
 };


  if(isset($_POST['new_recordH'])){
    $statement = $pdo->prepare("UPDATE users SET record_Hcap=:record WHERE id = :id");
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->bindValue(':record', $_POST['new_recordH']);
    if($statement->execute()){
        $users = $statement->fetch();
        $user->setRecordHcap($_POST['new_recordH']);
        $_SESSION['record_Hcap'] = $user->getRecordHcap();
        echo $capNewRecord.' : '.$_POST['new_recordH'].'/198';
    } else {
        echo $errorRecordingDB;
    }
 };