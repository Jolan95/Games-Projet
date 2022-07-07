<!DOCTYPE html>
<?php
session_start();
include "../handleLanguage/lang.php";    
?>
<html lang="fr">
	<head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
	    <meta charset="UTF-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title><?php echo $rpc ?></title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
		<link rel="stylesheet" type="text/css" href="../Style/style.css">
	</head>
	<body>
		<?php include_once '../header.php'; ?>
		<div class="pfc">
			<div class="container-fluid">
				<h1 class="text-center"style="color : white"><?php echo $rpc ?></h1>
				<div class="scores d-flex justify-content-between">
        			<div class="score2 score full-center">
            	    	<div id="score1" class="text-center">
            	    	   0
            	    	</div>
					</div>
					<div>
						<h2 id="sentences"><?php echo $makeYourChoice ?> </h2>
					</div>
       				<div class="score1 score full-center">
        			    <div id="score2" class="text-center">
        			        0
        			    </div>
        			</div>
				</div>	
	
				<div class="row my-3">
					<div id="choix1"class="col-4 col-sm-3 offset-1 offset-sm-2 choices">
						?
					</div>
					<div id="choix2" class=" col-4 col-sm-3 offset-2 offset-sm-2 choices">
						?
					</div>
				</div>
				<div class=" mt-4 d-flex justify-content-between justify-content-sm-around">
					<button id="pierre" type="button" class=" pierre" >
					</button>
					<button id="papier" type="button " class=" papier" >
					</button>
					<button id="ciseaux" type="button " class=" ciseaux" >
					</button>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/games.js"></script>
    	
	</body>
</html>