<?php
include "handleLanguage/lang.php";  
require_once 'Class/user.php';
$successRequest = 0;
$token = $_GET['token'] ;
if(!$token){
    echo "<h2><i>Impossible d'accéder à cette page, une erreur est survenu!</i></h2>";
    die();
}
$pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
$statement = $pdo->prepare('SELECT email FROM users WHERE token = :token');
$statement->bindValue(':token', $_GET['token']);
if($statement->execute()) {
    $users = $statement->fetch();
    if($users !== false ) {
        $email = $users["email"];
    } else {
        echo "<h2><i>Impossible d'accéder à cette page, la session a expiré!</i></h2>";
        die();
    };
} 
?>
<html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir notre liste de jeux !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Style/style.css">    
	</head>
	<body class="container text-center">
        <h1><?php echo $changePasswordTitle?></h1>
        <form id="formulaire"  method='post'>
            <div class="my-3">
                <label><?php echo $labelNewPassword; ?> : </label>
            </div>
            <div>
                <input id='password'type='password' name='password'>
            </div>
            <div class="mt-2">
                <label><?php echo $labelNewPassword2; ?> : </label>
            </div>
            <div>
                <input id='password2'type='password' name='password2'></input>
            </div>
            <div>
                <button type='button' id='newPassword' class='btn btn-success mt-3'><?php echo $valid ?></button>
            </div>   
        </form>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            $("#newPassword").click(()=>{
                let password = $("#password").val()
                let password2 = $("#password2").val()
                if(password.length > 7 && password2.length >7){
                    if(password === password2){
                        $("#formulaire").submit()
                    }else{
                        alert(<?php echo $errorChangePassword ?>)
                    }
                } else {
                    alert(<?php echo $errorChangePassword2 ?>)
                }
            })
            let success = <?php echo $successRequest; ?>;
            if (success == 1){ 
            setTimeout(function (){window.location = "https://games-online.herokuapp.com/form.php" ; alert('<?php echo $passwordChanged?>')}, 200)
            } 
        </script>
    </body>
</html>    