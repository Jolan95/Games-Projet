<?php
session_start();
require 'Class/user.php';
include "handleLanguage/lang.php"; 
$success = 0;
$error = 0;
require 'handleRequest/form-verif.php';
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
                <form method="post" action="form.php" id="formulaire">
                    <h2>Identification</h2>
                    <div>
                        <div  hidden  id="handleWrongResult"><?php echo $wrongPairing; ?></div>
                        <div>    
                            <label for="user"><?php echo $labelEmail ?></label>
                        </div>
                        <div>    
                            <input type="email" id="user" name="user" value="" required/>
                        </div>
                    </div>
                    <div class="item-form">
                        <div>
                            <label for="mdp"><?php echo $passwordLabel ?> </label>
                        </div>
                        <div>
                            <input type="password" id="mdp" name="mdp" value="" required/>
                        </div>
                    </div>
                    <div class="links pt-2">
                        <div>
                            <?php echo $noAccount ?><a href="inscription.php"><?php echo $targetLink ?></a>!
                        </div>
                        <div>
                        <a class="password-link" href="https://games-online.herokuapp.com/formPassword.php"><?php echo $forgottenPassword; ?></a></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit" >Connexion</button>
                </form>
            </div>    
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            let success = <?php echo $success; ?>;    
            let error = <?php echo $error; ?>;
            if(success === 1 ){
            document.location.href="https://games-online.herokuapp.com/";
            }
            if(error === 1){
            let displayWrongResult = document.getElementById('handleWrongResult')
            displayWrongResult.hidden = false;   
            }
        </script>
    </body>
</html>