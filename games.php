<?php
$style = "games.css";
include 'header.php';

?>
<style>
.box{
    min-height : 320px;
    max-height : 500px;
}
</style>
<body>
</div>


<div style="width: 100%" class="container-fluid">

    <div  style="padding : 2vh;"class="d-flex align-items-center  justify-content-around flex-row row row-cols-2">

  <?php  

$game = [
    ["name" => $diceGame , "image" => "photoDé.jpg", "link" => "https://games-online.herokuapp.com/DiceGame/jeu.php", "description" => $D_diceGame],
    ["name" => $capitalesQuiz, "image" => "jeuxCap.jpg", "link" => "https://games-online.herokuapp.com/QuizCap/capital.php", "description" => $D_capitalesQuiz],
    ["name" => "Guessing Number", "image" => "guess.jpg", "link" => "https://games-online.herokuapp.com/jeuNumber.php", "description" => $D_guessingNumber],
    ["name" => "Flappy Bird", "image" => "Flappy.jpg", "link" => "https://games-online.herokuapp.com/FlappyBird/", "description" => $D_flappyBird],
    ["name" => $stoneLeafScissors, "image" => "pfc.jpg", "link" => "https://games-online.herokuapp.com/PFC/pfc.php", "description" => $D_stoneLeafScissors],
];

    foreach($game as $value){
        echo 
        '<div class="col-10 col-md-5 box item" ><a  href='.$value["link"].'>
        <img class="games-card" src='.$value["image"].' style="width:100%"></a>
        <div class="text">
        <h3>'.$value['name'].'</h3>
        <p>'.$value["description"].'</p>
        </div></div>';
        }
        
        ?>

    </div>
    </div>


  
    

</body>