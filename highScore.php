<?php
$style = "games.css";
require_once 'header.php';


?>
<body>
    </div>
 

<div style="width: 100%" class="container-fluid">

    <div  style="padding : 2vh;"class="d-flex align-items-center  justify-content-around flex-row row row-cols-2">

  <?php 

 
$game = [
    ["name" => $diceGame, "image" => "photoDé.jpg", "link" => "https://games-online.herokuapp.com/DiceGame/jeu.php", "record" => $_SESSION['record_dice']],
    ["name" => $capitalesQuiz." (10)", "image" => "jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/QuizCap/capital.php", "record" => $_SESSION['record_Ecap']."/10"],
    ["name" => $capitalesQuiz." (50)", "image" => "jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/QuizCap/capital.php", "record" => $_SESSION['record_Mcap']."/50"],
    ["name" => $capitalesQuiz." (".$full.")", "image" => "jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/QuizCap/capital.php", "record" => $_SESSION['record_Hcap']."/197"],
    ["name" => "Guessing Number", "image" => "guess.jpg", "link" => "https://games-online.herokuapp.com/jeuNumber.php", "record" => $_SESSION['record_guess']],
    ["name" => "Flappy Bird", "image" => "Flappy.jpg", "link" => "https://games-online.herokuapp.com/FlappyBird", "record" => $_SESSION['record_flappy']],
];

    foreach($game as $value){
        echo  '<div class="col-10 col-sm-5 box item" ><a  href='.$value["link"].'>
        <img class="games-card" src='.$value["image"].' alt="5 Terre" style="width:100%"></a>
        <div class="text">
        <h3>'.$value['name'].'</h3>
        <p>'.$highScore.' : '.$value["record"].'</p>
        </div></div>';
        }
        
        ?>

    </div>
    </div>


  
    

</body>