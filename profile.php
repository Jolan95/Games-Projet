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
		<title>J-Games Online - mon profil</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir nos différents jeux et venez défier les autres utilisateurs !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/carousel/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/carousel/owl.theme.default.min.css">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
		<?php include "header.php"; ?>
		<div class="container profile">
			<div class="box-white mt-5">
				<h1><?php echo $_SESSION['user']?></h1>
				<div class="mt-2">
					<?php echo $firstnameLabel ?> : <span class="bold"><?php echo $_SESSION['firstname']?></span>
				</div>
				<div class="my-1">
					<?php echo $lastnameLabel ?> : <span class="bold"><?php echo $_SESSION['name']?></span>
				</div>
				<div>
					<?php echo $creationAccount ?> : <span class="bold"><?php echo $_SESSION['createdAt']?></span>
				</div>
				<div class="my-1">
				    Email : <span class="bold"><?php echo $_SESSION['email']?></span>
				</div>
				<div class="mt-3">
					<div>
						<button  onclick="deconnexion()"  type="button" class="btn btn-warning"><?php echo $deconnexion ?></button>
					</div>
					<div class="my-3">
						<a href="https://games-online.herokuapp.com/changePassword.php"><button oncl class="btn btn-success"><?php echo $managePassword ?></button></a>
					</div>
					<div>
						<button onclick="deletingAccount()" type="button" class="btn btn-danger"  ><?php echo $deletingAccount ?></button>
					</div>
				</div>
			</div>
		</div>	
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script> 
    		function deletingAccount() {
    		  	if(confirm('<?php echo $agreementToDelete ?>')){
    		    	var request = new XMLHttpRequest();
    		    	request.onreadystatechange = function() {
    		    	  	if (this.readyState == 4 && this.status == 200) {
    		      			if(this.responseText === 'ok'){
    		      			    alert('<?php echo $deleted ?>');
    		      			    window.location.replace("https://games-online.herokuapp.com/index.php");
    		      			}
    		      		}
    		    	};
    		    	request.open("GET", "handleRequest/delete.php", true);
    		    	request.send();
    		  	}
			}
    		function deconnexion() {
    		  	if(confirm('<?php echo $agreementToLogout; ?>')){
    		    	var request = new XMLHttpRequest();
    		    	request.onreadystatechange = function() {
    		      		if (this.readyState == 4 && this.status == 200) {
    		        	  	alert('<?php echo $confirmationDeleted ?>');
    		        	  	window.location.replace("https://games-online.herokuapp.com/index.php");
    		      		}
    		    	};
    		    	request.open("GET", "handleRequest/deconnexion.php", true);
    		    	request.send();
    		  	}
    		  }
    	</script>
    </body>
</html>
