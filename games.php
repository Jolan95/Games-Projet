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
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir notre liste de jeux !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
		<?php require_once 'header.php'; ?>
        <div class="games">
            <h1 class="text-center"><?php $titleGames ?></h1>
            <div class="container">
                <div class="row" id="games">
                </div>
            </div>    
        </div>
        
        <script type="text/javascript" src="./js/pfc.js"></script>    
    </body>
</html>