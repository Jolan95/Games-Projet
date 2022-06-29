<!DOCTYPE html>
<?php 
session_start();
$expire = 365*24*3600;
if(isset($_GET['language'])){
    if($_GET["language"] == "english"){
        $_COOKIE['lang'] = "en"; 
    }else{
        $_COOKIE['lang'] = "fr";
    }
}   
function isGoodLanguage($value){
    if($_COOKIE["lang"] === $value){
        echo "checked";
    }
}  
include "handleLanguage/lang.php"; 
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
        <?php
        require_once 'header.php';
        ?>
        <div class="container settings">
            <div class="box-white mt-4">
                <form method="get" action="settings.php">
                    <h2>Settings</h2> 
                    <label for="language" class="mt-4">Language :</label>
                    <div>
                        <input type="radio" id="language" name="language" value="english" <?php isGoodLanguage("en") ?> />
                        <label >Anglais</label>
                    </div>
                    <div>
                        <input type="radio" id="language" name="language" value="french" <?php isGoodLanguage("fr") ?> />
                        <label >Français</label>
                    </div>
                    <button type="submit" id='submit' class="btn btn-primary mt-2">Enregister </button>
                </form>
            </div>       
        </div>      
    </body>
</html>