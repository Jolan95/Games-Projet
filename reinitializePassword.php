<!DOCTYPE html>
<?php
 include "handleLanguage/lang.php";
 $successRequest = 0;
 $token = $_GET['token'] ;
 include "handleRequest/passwordReset-verif.php";

?>
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
		<?php require_once 'header.php'; ?>
        <div class="container">
            <div class="box-white">
                <h2><?php echo $changePasswordTitle?></h2>
                <form id="formulaire"  method='post'>
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
                </form>
            </div>
        </div>    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>

        </script>
    </body>
</html>    
