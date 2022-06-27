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
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Découvrez le classement individuel par jeux !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
		<?php require_once 'header.php'; ?>
        <div class="ranking">
            <div class="container">
                <div class="row">
	
        <h1>
            <?php
             if(isset($_GET['record'])){
                switch($_GET['record']){
                case 'record_Ecap' : 
                echo $capitales." /10";
                break;
                case 'record_Mcap' : 
                echo $capitales." /50";
                break;
                case 'record_Hcap' : 
                echo $capitalesFull;
                break;
                case 'record_Guess' : 
                echo 'Guessing Number';
                break;
                case 'record_flappy' : 
                echo 'Flappy Bird';
                break;
                default : 
                echo $diceGame;
                }
            } else {
                echo $diceGame;
            }
            ?>
       </h1>
        
        <form method="GET">
            <label style="font-weight: 700; color : white" for="record-select">Classement : </label>
            <select   name="record" id="record-select">
                <option value="record_dice"><?php echo $diceGame; ?></option>
                <option value="record_Ecap"><?php echo $capitales."/10"; ?> </option>
                <option value="record_Mcap"><?php echo $capitales." /50 "; ?></option>
                <option value="record_Hcap"><?php echo $capitalesFull; ?></option>
                <option value="record_Guess">Guessing Number </option>
                <option value="record_flappy">Flappy Bird</option>

            </select>  
        </form> 
    </div>
    <table   id="customers">
        <tr class="legend">
            <th><?php echo $rank ?></th>
            <th>Pseudo</th>
            <th><?php echo $highScore ?></th> 
        </tr>
    <?php

function getRecordDesc($game){
    $i=0;
    $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
    $statement = $pdo->prepare('SELECT pseudo, '.$game.' FROM users WHERE '.$game.' > 0 ORDER BY '.$game.' DESC  LIMIT 0, 15'); 
/**$statement->bindValue(':game', $game);*/
if ($statement->execute()) {

    while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
        $i++;
        if($i === 1){
            echo '<tr style=" background-color: goldenrod; opacity : 0.8;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else if ($i === 2){
            echo '<tr style=" background-color: silver; opacity : 0.8;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else if ($i === 3){
            echo '<tr style=" background-color: burlywood; opacity : 0.8;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else {

            echo '<tr><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        }
    }
    
}else {
    echo "erreur fatale";
}
}
function getRecordAsc($game){
    $i=0;

   /* $pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_53ae102770f6a82', "ba3595a923b6d7", "75287824");*/
   $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);

$statement = $pdo->prepare('SELECT pseudo, '.$game.' FROM users WHERE '.$game.' > 0 ORDER BY '.$game.' ASC  LIMIT 0, 15'); 
/**$statement->bindValue(':game', $game);*/
if ($statement->execute()) {

    while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
        $i++;
        if($i === 1){
            echo '<tr style=" background-color: goldenrod;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else if ($i === 2){
            echo '<tr style=" background-color: silver;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else if ($i === 3){
            echo '<tr style=" background-color: burlywood;"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        } else {

            echo '<tr><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
        }
    }
    
}else {
    echo "erreur fatale";
}
}
$game="record_dice";
if(!isset($_GET['record'])){
    getRecordDesc('record_dice');
} else {
    if($_GET['record'] === 'record_Guess'){
    getRecordAsc($_GET['record']);
    }else{
    getRecordDesc($_GET['record']);
    }
}


    
    ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        console.log("Hello World")
         $(document).ready(function(){  
        $("#record-select").change(()=>{
        
        let record = $('#record-select').val()
        $("form").submit();
        })
         })

    </script>
</body>
</html>
