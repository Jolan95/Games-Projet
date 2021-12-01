<?php
$validate = false; 
require_once 'user.php';
$style="style.css";
include 'header.php';
include 'sous-header.php';

?>
<div class="row">
<div class="col-6">
    
    </div>
</div>


</div>
<div  id="content"style = "border-radius : 20px;border : 3px solid black; margin-left : 3vw; width: 50vw; margin-top : 4vh;padding-top : 3vw; padding-left : 2vw; min-width : 250px">
    <h2 style="margin-bottom :2vh"><?php echo $changePasswordTitle?></h2>
    <form id="formulaire"  method='post' >
        <div style='font-weight : 500; '>
            <div>
                <label><?php echo $labelNewPassword; ?> : </label>
            </div>
            <div>
                <input id='password'type='text' name='password'>
            </div>
        </div>
        <div>
            <div>
                <label style='margin-top : 2vh; font-weight : 500;'><?php echo $labelNewPassword2; ?> : </label>
            </div>
            <div>
                <div>
                    <input id='password2'type='text' name='password2'></input>
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
                $password = $_POST["password"];
               
                /*$pdo = new PDO('mysql:host=localhost;dbname=projet', "root", "");*/
                $pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_53ae102770f6a82', "ba3595a923b6d7", "75287824");
                $statement = $pdo->prepare('UPDATE users SET  password = :password WHERE id = :id');
                $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
                $statement->bindValue(":password", password_hash(htmlspecialchars($password), PASSWORD_BCRYPT));
                $statement->bindValue(":id", $id);
                if($statement->execute()){

                    $users = $statement->fetch();
                    $user->setPassword($_POST['password']);
                    $_SESSION['password'] = $user->getPassword();
                    $validate = true;


                    
                        
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
<?php if ($validate === true){ 
  echo 'setTimeout(function (){window.location = "profile.php" ; alert('.$passwordChanged.')}, 200)';} 
?>

 

</script>
