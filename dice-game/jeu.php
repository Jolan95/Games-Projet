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
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir notre liste de jeux !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- <link rel="stylesheet" type="text/css" href="jeuDice.css"> -->
		<link rel="stylesheet" type="text/css" href="../Style/style.css">
	</head>
	<body>
        <?php require_once '../header.php'; ?>
        <input type=hidden id="record" value=<?php if(isset($_SESSION['record_dice'])){ echo $_SESSION['record_dice']; }?>>
        <div class="row justify-content-center">
            <h4 class="col-2 justify-self-center"> <em><?php if(isset($_SESSION['record_dice'])){ echo $highScoreWin.' : +'.$_SESSION['record_dice']; }?></em></h4>
        </div>
        <div class="row">
            <div class="col-5 text-center">
               <h2 ><?php echo $player1 ?>   
               <svg id="p1"xmlns="http://www.w3.org/2000/svg" width="3vh" fill="currentColor" style="color : red" class=" bi bi-circle-fill align-self-center" viewBox="0 0 16 16"  ><circle cx="8" cy="8" r="8"/></svg></h2>
            </div>
            
            <div class=" offset-2 col-5 text-center">
                <h2 style="color : white">
                    <span id="textp"><?php echo $player2 ?> </span>
                    <svg id="p2"   xmlns="http://www.w3.org/2000/svg" width="3vh" fill="currentColor"  style="color : red" class="bi bi-circle-fill align-self-center" viewBox="0 0 16 16" ><circle cx="8" cy="8" r="8"/></svg>
                </h2>
            </div>
        </div>

        <div class="row">
            <div id="score1" class="col-5 col-ms-4  score text-center align-self-center sized">
            </div>

            <div class="col-2 col-ms-4 light text-center dice " id='dice'>  
            </div>
                        
            <div id="score2" class="col-5  col-ms-4 score text-center align-self-center sized">0</div>
            </div>
        
            <div class="row " style="height : 40vh">
                <div id="current1" class="col-5  text-center align-self-center ">
                    <div class="text-center boxcurr"style="background-color : lightblue; height : 17vh; width : 20vw">
                        <div>
                            <?php echo $current ?>
                        </div>
                        <div id="scoreCurr1" class="numCurr" style="color : white">
                    </div>
                </div>
            </div>
            <div class="butt  col-2  text-center align-self-center">
                <div>
                    <button id="roll">
                        <svg style="color : green;  "xmlns="http://www.w3.org/2000/svg" width="5vh" height="5vh" fill="currentColor" class="svgw bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                        </svg>
                        <?php echo $throwDice ?>
                    </button>
                </div>
                <div>    
                    <button type="button" id="hold"style="margin-top : 3vh">
                        <svg style="color : red;  margin-bottom : 1.5vh" xmlns="http://www.w3.org/2000/svg"  width="5vh" height="5vh" fill="currentColor" class=" svgw bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        <?php echo $hold ?>
                    </button>
                </div>
            </div>
            <div id="current2" class="col-5  just align-self-center">
                <div  class="text-center  boxcurr"style="background-color : lightpink; height : 17vh; width : 20vw">
                    <div>
                        <?php echo $current ?>
                    </div>
                    <div id="scoreCurr2" class="numCurr" style="color : white">
                    </div>
                </div>
            </div>  
        </div>               
    </div>               
                

                

 

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script >
            $(document).ready(function(){  
    let dice = document.getElementById('dice');


    
    dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-6 red de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
    
    let tour = 0
    reset()
    
    function reset(){
        score1 = 0;
        score2 = 0;
        scorecurr1 = 0
        scorecurr2 = 0
        tour = 0;
    }
    let stay = true
    
    
    
    function displayingNewScore(){
        $("#score1").text(score1)
        $("#score2").text(score2)
        
        $('#scoreCurr2').text(scorecurr2)
        $('#scoreCurr1').text(scorecurr1)
    }
    let recor = document.getElementById('record').value
    let record = parseInt(recor)


    function end() {
        if(score1 >= 100){
            let ecart = score1 - score2;

            if(ecart > record){

                $.ajax({
                    url : 'records.php',
                    type : 'POST',
                    data:{
                        new_record: ecart,
                      },
                    success : function(response, code_html, statut){
                     alert (response)
                     location.reload();
                    },
                    error : function(resultat, statut, erreur){
                        alert ('<?php echo $errorRecording ?>')
                    }
                    });

            } else {
                alert (`<?php echo $win ?> : ${score1} <?php echo $resultDice ?> ${score2} `)
            }
            
      
       
       
            
        } else {
            alert (`<?php echo $lose ?> : ${score2} <?php echo $resultDice ?> ${score1} `)
            
        }
        reset()
        $("#score1").text(score1)
        $("#score2").text(score2)            
        $('#scoreCurr2').text(scorecurr2)
            $('#scoreCurr1').text(scorecurr1)
       
     }
        
        function redrond(){
            
            if(tour % 2 === 0) {
                $('#p1').show()
                $('#p2').hide()
            } else {
            $('#p2').show()
            $("#p1").hide()
        }
    }
    function iaStop(limit) {
        let random = Math.random() * (limit - 1)
        if (random < 1.4){
            score2 += scorecurr2 
            stay = false
            scorecurr2 = 0;
            displayingNewScore()
            tour++
            redrond()
            return stay
        }
        }
    
    function quit(){
        stay = false
        scorecurr2 = 0;
        displayingNewScore()
        tour++
        redrond()
    }
    function lancéDéVirtuel(){
        
        stay = true
        while(stay){
            var dice = Math.floor(Math.random() * (7 - 1) + 1);
            displayDice(dice)
            setTimeout(displayingNewScore(), 1500)
            if(dice === 6){
            quit()
            
            } else if(scorecurr2 > 6){
           
                if(scorecurr2 < 6){
                    iaStop(10);
                } else if (scorecurr2 < 11){
                    iaStop(7);
                } else if (scorecurr2 < 14){
                    iaStop(5);
                } else if (scorecurr2 < 19){
                    iaStop(3)
                } else if (scorecurr2 < 21){
                    iaStop(2)
                } else {
                  iaStop(1.8);
                }
                
                if(!stay){
                    score2 += scorecurr2
                
                }else {
                 
                    scorecurr2 += dice;
                    redrond();
                }

            }else{

            scorecurr2 += dice;
            redrond();
                if(score2 + scorecurr2 >= 100){
                score2 += scorecurr2
                quit()
                end()
                }
            }
        } 
        $("#textp").text('<?php echo $player2 ?>')  
        if(score2 >= 100){
            end()
        }      
    }
    
    $("#roll").click(() => {
        if(tour % 2 === 0){
        var dice = Math.floor(Math.random() * (7 - 1) + 1);
        displayDice(dice);
        redrond()
            scorecurr1 += dice;
            if(dice === 6){
                tour++;
                scorecurr1 = 0;
                scorecurr2 = 0
                redrond()
                $("#one").css('color','red')
                $('#six').css('color','red')
                $('#five').css('color','red')
                $('#four').css('color','red')
                $('#two').css('color','red')
                $('#three').css('color','red')
                $("#seven").css('color','red')

                $("#textp").text('<?php echo $iaIsPlaying ?>')
                setTimeout(lancéDéVirtuel, 1000)
            } else{
            $("#one").css('color','black')
            $('#six').css('color','black')
            $('#five').css('color','black')
            $('#four').css('color','black')
            $('#two').css('color','black')
            $('#three').css('color','black')
            $("#seven").css('color','black')
            
            $('#scoreCurr1').text(scorecurr1)
            $("#scoreCurr2").text(scorecurr2)
        }
    }
    })
    redrond();



        

        $("#hold").click(() => {
            if(tour % 2 === 0){
                
            score1 += scorecurr1
            score2 += scorecurr2
            $("#score1").text(score1)
            $("#score2").text(score2)
            if(score1 >= 100 || score2 >= 100){
                
                end()
                
            } else {

                tour++
            }
            redrond()
            
            scorecurr1 = 0;
            scorecurr2 = 0;
           displayingNewScore()

 
        }
        $("#textp").text('<?php echo $iaIsPlaying ?>')
        setTimeout(lancéDéVirtuel, 1000)
            
        })


    /**$("#new").click(function(){
        reset()
        $("#score1").text(score1)
        $("#score2").text(score2)

        
        $('#scoreCurr2').text(scorecurr2)
        $('#scoreCurr1').text(scorecurr1)
        tour = 0
    })*/
    function displayDice(threw){
        
        switch(threw) {
            case 1 : 
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-1 white de" viewBox="0 0 16 16"><circle cx="8" cy="8" r="1.5"/><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/></svg>'
            break;
            case 2 : 
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-2 white de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
        break;
            case 3 :
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-3 white de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
        break;
            case 4 : 
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-4 white de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
         break;
            case 5 : 
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-5 white de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
         break;
            case 6 : 
            dice.innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dice-6 red de" viewBox="0 0 16 16"><path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/><path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>'
         break; 
}
} 
displayingNewScore() 



})
        </script>
</body>
</html>