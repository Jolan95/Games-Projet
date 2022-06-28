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
        <div class="container settings">
            <div class="box-settings mt-5">
                <form method="get" action="settings.php" class="div-form">
                    <h2>Settings</h2> 
                    <label for="language">Language :</label>
                    <div>
                        <input type="radio" id="language" name="language" value="english" <?php isGoodLanguage("en") ?> />
                        <label >Anglais</label>
                    </div>
                    <div>
                        <input type="radio" id="language" name="language" value="french" <?php isGoodLanguage("fr") ?> />
                        <label >Français</label>
                    </div>
                    <button type="submit" id='submit' class="btn btn-primary">Enregister </button>
                </form>
            </div>       
        </div>         
<?php
$expire = 365*24*3600;
if(isset($_GET['language'])){
    if($_GET["language"] === "english"){

        $_COOKIE['lang'] = "en";
 
        
    }else{

        $_COOKIE['lang'] = "fr";

    } 

    
}

?>
    <!-- <style>
        .div-form{
        border : 2px solid black;
        width: 35vw;
        min-width : 250px;
        padding : 3vh;
        margin-top : 3.2vh;
        justify-content:  center;
        border-radius: 12px;
        background-color: white;
    }
    .item-form{
        margin : 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size : 17px;
        }
        p{
            font-size : 17px;
        }
        .error{
            color : red;
            font-size : 15px;
        }
        .success{
            background-color: lightgreen;
            text-align: center;
        }
        input[type=checkbox] {
  visibility: hidden;
}
</style> -->

        
        

    
    <?php  
    function isGoodLanguage($value){
    if($_COOKIE["lang"] === $value){
        echo "checked";
    }
    }
    ?>


  </body>
</html>