<?php
session_start();
require_once 'sendgrid-php.php';
include "handleLanguage/lang.php";
require_once "handleRequest/inscription-verif.php";
$success = 0;
$error = 0;
?>

<?php


?>
<html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir nos différents jeux et venez défier les autres utilisateurs !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/carousel/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/carousel/owl.theme.default.min.css">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
		<?php require_once 'header.php'; ?>
		<div class="container mt-4">
            <div class="box-white">

                <form method="post">
                    <h2>Inscription</h2>
                 <?php
                  switch ($error) {
                    case 1:
                        echo '<div class="red">'.$fullFilled.'</p>';
                        break;
                    case 2:
                        echo '<div class="red">'.$passwordNotPairing.'</div>';
                        echo '<div class="red">'.$passwordTooShort.'</div>';
                        break;
                    case 3:
                        echo '<div class="red">'.$pseudoExist.'</div>'; 
                        break;
                    case 4:
                        echo '<div class="red">'.$pseudoTooShort.'</div>';   
                        break;
                    case 5:
                        echo '<div class="red">'.$wrongFormatMail.'</div>';   
                        break;
                    case 6:
                        echo '<div class="red">'.$existMail.'</div>';   
                        break;
                    default : 
                    echo '';
                    break;
                }
                ?>
                <div>  
                    <label for="pseudo">Pseudo :</label>
                </div>
                <div> 
                    <input type="text" id="pseudo" name="pseudo" value="" required/>
                </div>
                <div>
                    <label for="email">E-mail :</label>
                 </div>
                <div>
                    <input type="email" id="email" name="email" value="" required/>
                </div>
                <div> 
                    <label for="firstname"><?php echo $firstnameLabel ?> :</label>
                </div>
                <div>    
                    <input type="text" id="firstname" name="firstname" value="" required/>
                </div>
                <div>
                    <label for="name"><?php echo $lastnameLabel ?> : </label>
                </div>
                <div>
                    <input type="text" id="name" name="name" value="" required/>
                </div>
                <div>
                    <label for="password"><?php echo $passwordLabel ?> : </label>
                </div>
                <div>
                <input type="password" id="password" name="password" value="" required/>
                </div>
                <div>
                    <label for="passwordBis"><?php echo $passwordLabel2 ?>: </label>
                </div>
                <div>
                    <input type="password" id="passwordBis" name="passwordBis" value="" required/>
                </div>
                <div class="pt-2">
                    <?php echo $alreadyConnected ?><a href="https://games-online.herokuapp.com/form.php"><?php echo $targetLink ?></a> !
                </div>
                <button type="submit" id='submit' class="btn btn-primary"><?php echo LOGIN ?></button>
            </form>    
        </div>
        <script>
            let success = <?php echo $success; ?>;
            let error = <?php echo $error; ?>;
            
            
            if(success === 1){
                setTimeout(()=> {
                    alert("<?php echo $successCreationAccount ?>");
                    window.location.replace("https://games-online.herokuapp.com/form.php");
                },400)
                
            }
            console.log('ERROR / '+error)
            
        </script>
    </body>
</html>