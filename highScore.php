<!DOCTYPE html>
<?php 
session_start();
include "handleLanguage/lang.php";
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
        <div class="container high-score">
            <div class="row">
                <?php 
                $game = [
                    ["name" => $diceGame, "image" => "Img/photoDé.jpg", "link" => "https://games-online.herokuapp.com/dice-game/jeu.php", "record" => $_SESSION['record_dice']],
                    ["name" => $capitalesQuiz." (10)", "image" => "Img/jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/quiz-cap/capital.php", "record" => $_SESSION['record_Ecap']."/10"],
                    ["name" => $capitalesQuiz." (50)", "image" => "Img/jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/quiz-cap/capital.php", "record" => $_SESSION['record_Mcap']."/50"],
                    ["name" => $capitalesQuiz." (".$full.")", "image" => "Img/jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/quiz-cap/capital.php", "record" => $_SESSION['record_Hcap']."/197"],
                    ["name" => "Guessing Number", "image" => "Img/guess.jpg", "link" => "https://games-online.herokuapp.com/guessing-game/jeuNumber.php", "record" => $_SESSION['record_guess']],
                    ["name" => "Flappy Bird", "image" => "Img/Flappy.jpg", "link" => "https://games-online.herokuapp.com/flappy-bird/flappy.php", "record" => $_SESSION['record_flappy']],
                ];
                foreach($game as $value){
                    echo  
                    '<div class="box-game col-12 col-sm-8 offset-sm-2 offset-lg-0 col-lg-6" ><a  href='.$value["link"].'>
                    <img src='.$value["image"].'></a>
                    <div class="text">
                    <h2>'.$value['name'].'</h2>
                    <p>'.$highScore.' : '.$value["record"].'</p>
                    </div></div>';
                }
                ?>
            </div>
        </div>
    </body>    
</html>

  
    

</body>