<?php
session_start();
include "../handleLanguage/lang.php";
include 'Class/user.php';
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
        <div class="capitals mb-4">
            <div class="container">
                <div class="logo d-flex align-items-center">
                    <input type=hidden id="recordE"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Ecap'];}?>>
                    <input type=hidden id="recordM"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Mcap'];}?>>
                    <input type=hidden id="recordH"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Hcap'];}?>>
                </div>
                <div id="record" class="recording">
                </div>
                <div class="question mb-4 text-center">
                    <h1 id="question"><?php echo $worldCapitals ?></h1>
                </div>
                <div class="row d-none" id="container-boxes">
                    <div class="p-2 col-md-6 col-12 wrapper-box">
                        <button type="button" class="box box-hover" id="box1"></button>
                    </div>
                    <div class="p-2 col-md-6 col-12 wrapper-box">
                        <button type="button" class="box box-hover" id="box2"></button>
                    </div>
                    <div class="p-2 col-md-6 col-12 wrapper-box">
                        <button type="button" class="box box-hover" id="box3"></button>
                    </div>
                    <div class="p-2 col-md-6 col-12 wrapper-box">
                        <button type="button" class="box box-hover" id="box4"></button>
                    </div>
                </div>
                <div class="row mt-4" id="wrapper-circles">
                    <div class="col-lg-4 col-12 full-center wrapper-circle" >
                        <button type="button"class="start easy" id="first">10 <?php echo $countries ?></button>
                    </div>
                    <div class="col-lg-4 col-12 full-center wrapper-circle" id="circle-center" >
                        <button type="button" class="start med" id="second">50  <?php echo $countries ?></button>
                    </div>
                    <div class="col-lg-4 col-12 full-center wrapper-circle" >
                        <button type="button"class="start hard" id="third">198  <?php echo $countries ?></button>
                    </div>
                    <div id='counter'></div>
                </div> 
            </div>      
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="countries.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            /**declaration de variables */
            var box1 = document.getElementById("box1")
            var box2 = document.getElementById("box2")
            var box3 = document.getElementById("box3")
            var box4 = document.getElementById("box4")
            let boxes = [box1, box2, box3, box4];
            let question = document.getElementById("question")
            let result = document.getElementById('result');
            let firstQuiz = document.getElementById('first');
            let secondQuiz = document.getElementById('second');
            let thirdQuiz = document.getElementById('third');
            let circles = [firstQuiz, secondQuiz, thirdQuiz];
            let container = document.getElementById('container-boxes')
            let circlesWrapper = document.getElementById('wrapper-circles')
            let circleCenter = document.getElementById('circle-center')
            let counter = document.getElementById('counter')
            let displayRecord = document.getElementById('record')
            let recordE = document.getElementById('recordE').value
            let recordM = document.getElementById('recordM').value
            let recordH = document.getElementById('recordH').value
            let record
            quiz=false;
            let choices = []
            let questionIndex = [];

            for (let u = 0; u <= (countries.length - 1); u++){
                questionIndex.push(u);
            }

            let setted = true;
            let point = 0
            let limitQuiz = countries.length;
            let picked
            let i=0;

            /**Function redirection */
            function redirectToMenu(){
            	window.location.replace("https://games-online.herokuapp.com/index.php");
            }
            function restart(){
            	window.location.replace("https://games-online.herokuapp.com/quiz-cap/capital.php");
            }

            function hiddingCircles(){

                circlesWrapper.classList.add("d-none");
            }

            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                  const j = Math.floor(Math.random() * (i + 1));
                  [array[i], array[j]] = [array[j], array[i]];
                }
            }

            shuffle(questionIndex);

            function selectAnswers(){
              picked = questionIndex[0];
              choices.push(picked);
              questionIndex.shift();
            
                for(let lim = 0; choices.length <= 3; lim++){
                let number = Math.floor(Math.random() * ([countries.length] - 1));
                
                    if (!choices.includes(number)){
                        choices.push(number);
                    } 
                }
                shuffle(choices)
                   question.innerHTML = '<?php echo $questionCapitale ?>' + countries[picked]["name"] + ' <img class="flag" src='+countries[picked]['flag']+'>' + "?";
                    for (let x = 0; x <= 3; x++) {
                        boxes[x].textContent = countries[choices[x]]["capital"];
                    }
                counter.textContent = i + '/' + limitQuiz
            }

            function removeClasses() {
                boxes.forEach(element => element.classList.remove("good"));
                boxes.forEach(element => element.classList.remove("wrong"));
            }

            function verifCompteur(compteur){
                if(compteur < limitQuiz){
                    setTimeout(function(){choices=[]; selectAnswers();  setted=true; removeClasses();}, 800);
                } else {
                    setTimeout(function(){
                        if(!!recordE || !!recordM || !!recordH){
                            if(point > record && limitQuiz === 10){
                                $.ajax({
                                    url : 'records_capitals.php',
                                    type : 'POST',
                                    data:{
                                        new_recordE: point,
                                    },
                                    success : function(response){
                                        alert (response)
                                    },
                                    error : function(resultat, statut, erreur){
                                        alert ('<?php echo $errorRecording ?>')
                                    }
                                });
                            } else if (point > record && limitQuiz === 50){
                                $.ajax({
                                    url : 'records_capitals.php',
                                    type : 'POST',
                                    data:{
                                        new_recordM: point,
                                    },
                                    success : function(response){
                                        alert (response)
                                    },
                                    error : function(resultat, statut, erreur){
                                        alert ('<?php echo $errorRecording ?>')
                                    }
                                });
                            } else if (point > record && limitQuiz === 198){
                                $.ajax({
                                    url : 'records_capitals.php',
                                    type : 'POST',
                                    data:{
                                        new_recordH: point,
                                    },
                                    success : function(response){
                                        alert (response)
                                    },
                                    error : function(resultat, statut, erreur){
                                        alert ('<?php echo $errorRecording ?>')
                                    }
                                });
                            }
                        }
                        container.classList.add("d-none");
                        circlesWrapper.classList.remove("d-none");
                        counter.textContent = '';
                        secondQuiz.classList.remove("d-none");
            			secondQuiz.outerHTML = '<button type="button"class="start hard" id="second" onclick="restart()">'+'<?php echo $restart ?>'+'</button>'
            			thirdQuiz.parentNode.classList.add("d-none");
            			firstQuiz.parentNode.classList.add("d-none");
                        circleCenter.classList.remove("col-lg-4")
                        boxes.forEach(boxe => boxe.remove());
                        if (limitQuiz === point){
                            question.classList.add('class-right')
                            question.textContent = '<?php echo $revealAllGood ?> '+" !!!";
                        } else if(limitQuiz / point <= 2) {
                            question.classList.add('class-right')
                            question.textContent = '<?php echo $revealScoreCap ?> '+ point +' <?php echo $revealScoreCap2 ?>' + limitQuiz + '!';

                        } else if (point < 2){
                            question.textContent = '<?php echo $revealScoreCap ?> '+ point + ' <?php echo $revealScoreCap2 ?>'  + limitQuiz + '!';
                            question.classList.add('class-wrong');
                        }    else {
                            question.textContent = '<?php echo $revealScoreCap ?> '+ point + '<?php echo $revealScoreCap2 ?>' + limitQuiz + '!';
                            question.classList.add('class-wrong');
                        }
                    }, 800);
                }
            }

            circles.forEach(element => element.addEventListener("click", (e)=>{
                if(e.target.getAttribute('id') === "first"){
                    limitQuiz = 10;
                    record = recordE
                    if(recordE){
                    displayRecord.innerText = '<?php echo $highScore ?>'+" : "+record+"/10"
                    }
                } else if (e.target.getAttribute('id') === 'second'){
                    limitQuiz = 50;
                    record = recordM
                    if(recordM){
                    displayRecord.innerText = '<?php echo $highScore ?>'+" : "+record+"/50"
                    }
                } else {
                        limitQuiz = 198
                        record = recordH
                        if(recordH){
                        displayRecord.innerText = '<?php echo $highScore ?>'+" : "+record+"/"+countries.length
                        }
                }
            
                hiddingCircles()
                i=0;
                quiz = true;
                e.target.classList.add("d-none")
                container.classList.remove("d-none");
                boxes.forEach(element => element.classList.remove("d-none"));
                question.classList.remove("d-none")
                selectAnswers();
                })
            )

            boxes.forEach(element => element.addEventListener('click', (e)=>{ 
                if(setted){    
                    if(e.target.textContent === countries[picked]["capital"]) {
                        /*Si bonne réponse sélectionnée. */
                        e.target.classList.add("good")
                        setted= false; 
                        point++; 
                        i++;
                        verifCompteur(i) 
                    } else {
                        /*Si Mauvaise réponse séléctionnée */            
                        e.target.classList.add('wrong')
                        for(let o = 0; o<= 3; o++){
                            if(boxes[o].textContent === countries[picked]['capital']){
                                boxes[o].classList.add('good');   
                            }
                        }
                        setted=false;
                        i++;
                        verifCompteur(i);
                    } 
                } 
                
            })) 

        </script>
    </body>
</html>    