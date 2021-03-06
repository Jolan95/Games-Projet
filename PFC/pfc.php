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
				<h1 class="text-center"><?php echo $rpc ?></h1>
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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>		<script>
			$(document).ready(()=>{
    			let score1 = 0
		    	let score2 = 0
		  		function win(){
		  		      score1++;
		  		      $("h2").text(<?php  echo $won ?>+" !!!")
		  		      $("#choix1").css('border', '5px solid green')
		  		      $("#choix2").css('border', '5px solid red')
		  		      $('h2').css('color', 'green')
		  		}
		  	function tied(){
		  	      $("h2").text(<?php echo $tied ?>+" !")
		  	      $("#choix1").css('border', '5px solid yellow')
		  	      $("#choix2").css('border', '5px solid yellow')
		  	      $('h2').css('color', 'darkyellow')
		  	}
		  	function lose(){
		  	      score2++
		  	      $("#choix1").css('border', '5px solid red')
		  	      $("#choix2").css('border', '5px solid green')
		  	      $("h2").text(<?php echo $lost ?>+" !")
		  	      $('h2').css('color', 'red')
		  	} 
		  	function displayScore(){
		  	    $('#score1').text(score1)
		  	    $('#score2').text(score2);
		  	    $('#choix1').text("")
		  	    $('#choix2').text("")
		  	}
		  	function getRandom(){
		  	      return Math.floor(Math.random()* 3)
		  	}
		  	$('button').click(function(){
		  	    let ia = getRandom();
		  	    $("#choix1").removeClass('pierre')
		  	    $("#choix1").removeClass('ciseaux')
		  	    $("#choix1").removeClass('papier')
		  	    $('#choix1').addClass($(this).attr("id"));
		  	    let choix = $(this).attr("id");
		  	    switch(ia){
		  	          case 0:
		  	            $("#choix2").removeClass('pierre')
		  	            $("#choix2").removeClass('ciseaux')
		  	            $("#choix2").removeClass('papier')
		  	            $("#choix2").addClass('pierre');
		  	        break;
		  	          case 1 : 
		  	              $("#choix2").removeClass('pierre')
		  	              $("#choix2").removeClass('ciseaux')
		  	              $("#choix2").removeClass('papier')
		  	              $("#choix2").addClass('papier');
		  	          break;
		  	          case 2 : 
		  	              $("#choix2").removeClass('pierre')
		  	              $("#choix2").removeClass('ciseaux')
		  	              $("#choix2").removeClass('papier')
		  	              $("#choix2").addClass('ciseaux');
		  	          break;
		  	    }
		  	    if(choix === "pierre" && ia === 0){
		  	          tied()
		  	    }
		  	    if(choix === "papier" && ia === 0){
		  	          win()
		  	    }
		  	    if(choix === "ciseaux" && ia === 0){
		  	          lose()
		  	    }
		  	    if(choix === "pierre" && ia === 1){
		  	          lose()
		  	    }
		  	    if(choix === "papier" && ia === 1){
		  	          tied()
		  	    }
		  	    if(choix === "ciseaux" && ia === 1){
		  	          win()
		  	    }
		  	    if(choix === "pierre" && ia === 2){
		  	          win()
		  	    }
		  	    if(choix === "papier" && ia === 2){
		  	          lose()
		  	    }
		  	    if(choix === "ciseaux" && ia === 2){
		  	          tied()
		  	    }
		  	    displayScore()
		  	})
			})
		</script>
	</body>
</html>