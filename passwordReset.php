<?php

require_once 'Class/user.php';
include 'header.php';
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
<body style="background-color: #282c34;">
<div class="row">
<div class="col-6">
    
    </div>
</div>


</div>
<div  id="content"style = "background-color : white; border-radius : 20px;border : 3px solid black; margin-left : 3vw; width: 50vw; margin-top : 4vh;padding-top : 3vw; padding-left : 2vw; min-width : 250px">
    <h2 style="margin-bottom :2vh"><?php echo $changePasswordTitle?></h2>
    <form id="formulaire"  method='post' >
        <div style='font-weight : 500; '>
            <div>
                <label><?php echo $labelNewPassword; ?> : </label>
            </div>
            <div>
                <input id='password'type='password' name='password'>
            </div>
        </div>
        <div>
            <div>
                <label style='margin-top : 2vh; font-weight : 500;'><?php echo $labelNewPassword2; ?> : </label>
            </div>
            <div>
                <div>
                    <input id='password2'type='password' name='password2'></input>
                </div>
            </div>
            <div>
                <button type='button' id='newPassword' style='margin : 4vh' class='btn btn-success'><?php echo $valid ?></button>
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
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>

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
