<?php
session_start();
include "../handleLanguage/lang.php";
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online - Quiz Capitales</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,..." />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../Style/style.css">   
	</head>
	<body>
        <?php
        require_once '../header.php';
        ?>
        <div class="guess-number">
            <div class="container d-flex justify-content-center">
                <div class="box mt-4 p-3">  
                    <h1 id="message" class="text-center">
                        <?php echo $JNrule;?>
                    </h1>
                    <div id="reveal" class="text-center mt-3">
                    </div>
                    <div class="text-center mt-4 mb-2">
                        <?php echo $callToSuggestion?>
                    </div>
                    <div class="guess d-flex justify-content-center my-2">
                        <input type="number"  id="guess">
                        <button id="validate" class="btn btn-primary"><?php echo $valid?></button>
                        <a href="https://games-online.herokuapp.com/GuessingGame/jeuNumber.php"><button id="restart" class="btn btn-primary" hidden><?php echo $restart ?></button></a>
                        <a href="https://games-online.herokuapp.com/index.php"><button  hidden><?php echo $redirectToMenu ?></button></a>
                    </div>
                    <div class='mt-3'>
                        <div id="attempts" ><?php echo $attempts ?> : 0</div>
                        <div id="record"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(()=>{
                let reveal = document.getElementById('reveal')
                let guess = document.getElementById('guess');
                let valid = document.getElementById('validate')
                let restart = document.getElementById('restart')
                let menu = document.getElementById('menu')
                let attempts = document.getElementById('attempts')
                let recordDisplay = document.getElementById('record')
                let i= 0;
                
                <?php
                if(isset($_SESSION['user'])){
                    echo 'let record ='.$_SESSION["record_guess"].';';
                } else {
                    echo 'let record = false;';
                }
                ?>

                let number = Math.floor(Math.random() * 1000) + 1;

                if(record && record > 0){   
                    recordDisplay.innerText = "<?php echo $highScore ?>: "+record;
                }
            

                function newRecord(newRecord){
                    $.ajax({
                        url : 'recordGuess.php',
                        type : 'POST',
                        data:{
                            new_record: newRecord,
                        },
                        success : function(response, code_html, statut){
                            alert (response)
                        },
                        error : function(resultat, statut, erreur){
                            alert ('<?php echo $errorRecording ?>')
                        }
                    });
                }

                function wrong() {
                    if(parseInt(guess.value) > number){
                        reveal.innerHTML = "<div class='wrong' >"+'<?php echo $higherReveal?>'+"</div>"
                    } else {
                        reveal.innerHTML = "<div class='wrong' >"+'<?php echo $lowerReveal?>'+"</div>"
                    }
                }
                function right (){
                    reveal.innerHTML = '<?php echo $numberFound ?>'+ number+'<?php echo $numberFound2 ?>'+i+'<?php echo $numberFound3 ?>';
                    validate.hidden = true;
                    guess.hidden = true; 
                    menu.hidden = false;
                    restart.hidden = false;
                }
        
                valid.addEventListener('click', () =>{
                    if(guess.value.length > 0){
                        i++
                        attempts.innerText = "<?php echo $attempts ?> : "+i;
                        if(parseInt(guess.value) === number){
                            right()
                            if(record !== false){
                                if(record === 0 || i < record){
                                    newRecord(i)
                                } 
                            }
                        }else{
                            wrong()
                        }
                    } 
               })     
            })
        </script>
    </body>
</html> 