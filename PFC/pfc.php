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
	    <link rel="stylesheet" href="../Style/style.css">
	</head>
	<body>
  		<?php include_once '../header.php'; ?>
		<h1 class="col-12 text-center"style="color : white"><?php echo $rpc ?></h1>
    	<div class="row scores justify-content-around">
        	<div class=" col-2 score score2">
            	<div class="row align-items-center justify-content-center">
                	<div id="score1" class=" col-6 align-self-center text-center">
                    0
                	</div>
            	</div>
        	</div>
        	<div style="padding-top : 4vh" class="col-8 text-center align-self-center">
        	    <h2 id="sentences" class="color : white"><?php echo $makeYourChoice ?> </h2>
        	</div>
        	<div class=" col-2 score1 score">
        	    <div class="row justify-content-center">
        	        <div id="score2" class="col-6 text-center">
        	            0
        	        </div>
        	    </div>
        	</div>	
		</div>
		<div class="row">
			<div class="col ">

			</div>
			<div id="choix1"class="col-4 col-sm-3 choices">
				?
			</div>
			<div class="col ">
			</div>
			<div id="choix2" class=" col-4 col-sm-3 choices">
				    ?
			</div>
			<div class="col  ">
			</div>
    	</div>
    	<div class="row justify-content-around">
            <button id="pierre" type="button" class="col-3 col-sm-2 pierre" >
            </button>
            <button id="papier" type="button btn" class="col-3 col-sm-2 papier" >
            </button>
            <button id="ciseaux" type="button btn btn-success" class="col-3 col-sm-2 ciseaux" >
            </button>
 
    	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script >
    $(document).ready(()=>{
  		let score1 = 0
  		let score2 = 0
		function win(){
		  	score1++
		  	$("h2").text(<?php  echo $won ?>+" !!!")
		  	$("#choix1").css('border', '1vh solid green')
		  	$("#choix2").css('border', '1vh solid red')
		  	$('h2').css('color', 'green')
		}
		function tied(){
		  	$("h2").text(<?php echo $tied ?>+" !")
		  	$("#choix1").css('border', '1vh solid yellow')
		  	$("#choix2").css('border', '1vh solid yellow')
		  	$('h2').css('color', 'darkyellow')
		}
		function lose(){
		  	score2++
		  	$("#choix1").css('border', '1vh solid red')
		  	$("#choix2").css('border', '1vh solid green')
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
			console.group(score1)
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