<?php
session_start();
include "handleLanguage/lang.php";
include "Class/user";
$successRequest = 0;
$token = $_GET['token'] ;
include "handleRequest/passwordReset-verif.php";
if(!$token){
    echo "Impossible d'accéder à cette page, une erreur est survenu!";
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,..." />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
        <div class="container d-flex justify-content-center mt-4">
            <div>
                <h2><?php echo $changePasswordTitle?></h2>
                <form id="formulaire"  method='post' class="d-flex justify-content-center mb-4">
                    <div>
                        <div>
                            <label><?php echo $labelNewPassword; ?> : </label>
                        </div>
                        <div>
                            <input id='password'type='password' name='password'>
                        </div>
                        <div>
                            <label ><?php echo $labelNewPassword2; ?> : </label>
                        </div>
                        <div>
                            <input id='password2' type='password' name='password2'></input>
                        </div>
                        <button type='button' id='newPassword' class='btn btn-success'><?php echo $valid ?></button>
                    </div>
                </form>
            </div>
        </div>    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
