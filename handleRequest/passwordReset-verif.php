<?php 

if(isset($_POST['password']) && isset($_POST['password2'])){

    if(strlen($_POST['password']) > 7 && strlen($_POST['password2']) > 7 ){
        $user = $_SESSION['class_user'];
        $id=$_SESSION["id"];
        $password = htmlspecialchars($_POST["password"]);
       
        $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
        $statement = $pdo->prepare('UPDATE users SET  password = :password WHERE email = :email');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->bindValue(":password", password_hash(htmlspecialchars($password), PASSWORD_BCRYPT));
        $statement->bindValue(":email", $email);
        if($statement->execute()){
            $users = $statement->fetch();
            $statement = $pdo->prepare('UPDATE users SET  token = NULL WHERE email = :email');                    
            $statement->bindValue(":email", $email);
            $statement->execute();
            $successRequest = 1;
        } else {
            echo $mistakeRecordingDB;
        }
    } 
  
}
?>