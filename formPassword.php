<?php
require 'Class/user.php';
include "handleLanguage/lang.php"; 
$success = 0;
$error = 0;
require 'handleRequest/formPassword-verif.php';
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
        <?php
        require_once 'header.php';
        ?>
        <div class="container">
            <div class="box-white mt-4">
                <div hidden id='handleGoodResult'>
                    <?php echo $emailReceived ?>
                </div>
                <form method="post" action="formPassword.php"  class="div-form" id="formulaire">
                    <h1><?php echo $resetPassword; ?></h1>
                    <div  hidden  id="handleWrongResult">
                        <?php echo $EmailnotMatching; ?>
                    </div>
                    <div class="pt-1">    
                        <label for="user"><?php echo $labelEmail ?></label>
                    </div>
                    <div>    
                        <input type="email" id="user" name="mail" value="" required/>
                    </div>
                    <div class="small-text pt-2 pb-1">
                        <?php echo $sentenceReset; ?>
                    </div>
                    <button type="submit" class="btn btn-primary" ><?php echo $sendMail; ?></button>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script >
            let success = <?php echo $success; ?>     
            let error = <?php echo $error; ?>
            if(success === 1){
                let form = document.getElementById('formulaire')
                form.hidden = true;
                let displaySuccessConnexion = document.getElementById('handleGoodResult');
                displaySuccessConnexion.hidden = false
            }
            if(error === 1){
                let displayWrongResult = document.getElementById('handleWrongResult')
                displayWrongResult.hidden = false;
            }
        </script>
    </body>
 </html>