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
            <div class="box-white mt-5">
                <form method="get" action="settings.php">
                    <h2>Settings</h2> 
                    <label for="language" class="mt-2">Language :</label>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>