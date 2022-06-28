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
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,..." />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
        <?php require_once 'header.php';
        var_dump($_COOKIE);
        ?>
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
        <?php function isGoodLanguage($value){
            if($_COOKIE["lang"] === $value){
                echo "checked";
            }
            if(isset($_GET['language'])){
                if($_GET["language"] === "english"){
            
                    $_COOKIE['lang'] = "en";
                    
                }else{
                    $_COOKIE['lang'] = "fr";
            
              
        } ?>
        <script>
            console.log(document.cookie)
        </script>       
    </body>
</html>