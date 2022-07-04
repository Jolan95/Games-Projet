<?php
$pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
$statement = $pdo->prepare("SELECT pseudo FROM users WHEN pseudo = :pseudo");
$statement->bindValue(":pseudo", $_POST["pseudo"]);
if($statement->execute()){
    echo "true";
}

?>