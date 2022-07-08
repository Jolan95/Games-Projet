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
				<div class="mt-1 mb-2">
				    Email : <span class="bold"><?php echo $_SESSION['email']?></span>
				</div>
				<div class="mt-3">
					<div>
						<button  onclick="deconnexion()"  type="button" class="btn btn-warning"><?php echo $deconnexion ?></button>
					</div>
					<div class="my-3">
						<button type="button" data-toggle="modal" data-target="#infos" class="btn btn-success"><?php echo $managePassword ?></button>
						<!-- Modal to modify password -->
						<div class="modal" id="infos">
						  	<div class="modal-dialog">
								<div class="modal-content">
								  	<div class="modal-header">
										<h2 class="modal-title">Modifier le mot de passe</h2>
										<button type="button" class="close" data-dismiss="modal">
										  X
										</button>            
								  	</div>
									<form id="formulaire">	  
								  		<div class="modal-body">
									  		<div>
            								    <label><?php echo $labelNewPassword; ?> : </label>
											</div>
											<div>
												<input id='password' type='password' name='password'>
											</div>
											<div>
            									<label><?php echo $labelNewPassword2; ?> : </label>
											</div>    
											<div>
												<input id='password2' type='password' name='password2'></input>
											</div>
										</div>	
								  		<div class="modal-footer">
											<button type="button" id='newPassword' class="btn btn-success"><?php echo $valid ?></button>
										</div>
									</form>	
								</div>
						  	</div>
						</div>
					</div>
					<div>
						<button onclick="deletingAccount()" type="button" class="btn btn-danger"><?php echo $deletingAccount ?></button>
					</div>
				</div>
			</div>
		</div>	
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
			$("#newPassword").click(()=>{
        		let password = $("#password").val()
        		let password2 = $("#password2").val()
        		if(password.length > 7 && password2.length >7){
        		    if(password === password2){
        		        let data = password
        		        var request = new XMLHttpRequest();
        		        var formData = new FormData();
						formData.append("password", data);
        				request.onreadystatechange = function() {
        		  			if (this.readyState == 4 && this.status == 200) {
								$('#infos').modal('hide')
								alert(this.response);
        					}
        				};
        				request.open("POST", "handleRequest/ChangePassword-verif.php", true);
        				request.send(formData);
				    }else{
				        alert(<?php echo $errorChangePassword ?>)
				    }
				} else {
				    alert(<?php echo $errorChangePassword2 ?>)
				}
			})
    	</script>
    </body>
</html>
