<?php
$style="style.css";
include_once '../header.php';
include 'Class/user.php';
?>
<style>
    html{
    font-size: 1vw;
}
body{
    background-color: #282c34;

}
img{
    height : 10rem;
    width : 18rem;
}
.logo{
    display : flex;
    flex-direction: row;
    align-items: center;
    font-size : 1.3rem;


}


.question{
    display : flex;
    justify-content: center;
    
}
h2 {
    color: whitesmoke;
    font-size: 3.4rem;
}
h3{
    margin-top : 13vh;
   align-self: end;
   font-size : 4rem;
   position: absolute;
   right : 2rem;
   top : 1rem;
   text-shadow: none;

}
#question{
    justify-self: center;
}
.boxs {
    height: 100%;    
}

button {
    border: 1px black solid;
    border-radius : 6px;
    box-shadow : 1px 1px;
    height : 2em;
    width : 35rem;
    margin-left : 9.3rem;
    margin-top: 2rem;
    font-size : 300%;
    border : none;
    
    
}
.button-container{
    display: flex;
}

.validation {
    height : 0.6em;
    width : 0.4;
    margin-left : 10rem;
    margin-top: 5%;
    font-size : 3rem;
    color : blue;
}
.good{
    border : 6px solid green;
}
.wrong {
    border : 6px solid red;
}
.start-container{
    display: flex;
    justify-content: center;

}
.start{
    justify-content: center;
    border-radius: 180px;
    height : 19rem;
    width : 19rem;
    margin : inherit;
    transition-duration: 0.3s;
    transition-delay: 0.05s;
    margin : 3rem;
}
.start:hover{
    height : 20rem;
    width: 20rem;
}
.easy{
    background: url("mape.jpg");
    background-size: cover;
    background-position: 35%;
    background-size: 200%;
}
.med{
    background : url("medium.jpg");
    background-size: cover;
    background-position: 30%;
    background-size: 200%;
    color : white
}
.hard{
    background : url("hard.jpg");
    background-size: cover;
    background-position: 35%;
    background-size: 230%;

}
.flag{
height : 2.7rem;
width : 5rem;

}
.class-wrong{
    color : rgb(97, 1, 1);
    text-shadow: inherit;
    font-size: 3.6rem;
}
.class-right{
   text-shadow: inherit;
color : rgb(1, 97, 1);
font-size: 3.6rem;
}
.class-right{
   text-shadow: inherit;
color : rgb(1, 97, 1);
font-size: 3.6rem;
}
.recording{
    text-shadow: none;
    color : rgb(1, 97, 1);
    font-size : 1.5rem;
    font-weight: 800;
}

@media (max-width : 650px) {
    .box{
        background-color : whitesmoke;
        height : 18rem;
        width : 70vw;
        margin-top : 3vh;

    }
}



</style>    
 <div class="logo">
     
 <input type=hidden id="recordE"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Ecap'];}?>>
 <input type=hidden id="recordM"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Mcap'];}?>>
 <input type=hidden id="recordH"  value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['record_Hcap'];}?>>
        
        <!--<img src="R.jpg" alt="logoQuiz"></img>-->
        <em id="record" class="recording"></em>
    </div>
    
    <div class="question">
        <h2 id="question"><?php echo $worldCapitals ?></h2>
    </div>
    <div class="boxs" id="container-boxes">
        <button type="button" class="box" id="box1"></button>
        <button type="button" class="box" id="box2"></button>
        <button type="button" class="box" id="box3"></button>
        <button type="button" class="box" id="box4"></button>
    </div>
    <div class="start-container">
        
        <button type="button"class="start easy" id="first">10 <?php echo $countries ?></button>
        <button type="button"class="start med" id="second">50  <?php echo $countries ?></button>
        <button type="button"class="start hard" id="third">198  <?php echo $countries ?></button>
        <h3 id='counter' style="position : relative;font-size : 2.4rem;text-shadow: none; font-weight : 200" ></h3>
    </div>
    
    <script type="text/javascript" src="countries.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script >
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
let counter = document.getElementById('counter')
let displayRecord = document.getElementById('record')
let recordE = document.getElementById('recordE').value
let recordM = document.getElementById('recordM').value
let recordH = document.getElementById('recordH').value
let record

container.hidden = true;
/**declaration de variables */
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
let i =0;

function redirectToMenu(){
	window.location.replace("https://games-online.herokuapp.com/index.php");
}
function restart(){
	window.location.replace("https://games-online.herokuapp.com/QuizCap/capital.php");

}


function hiddingCircles(){
    circles.forEach(element => element.hidden = true)
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
            counter.textContent = '';
            secondQuiz.hidden = false;
			secondQuiz.outerHTML = '<button type="button"class="start hard" id="second" onclick="restart()">'+'<?php echo $restart ?>'+'</button>'
			thirdQuiz.hidden = false;
			thirdQuiz.outerHTML = '<button type="button"class="start med" id="third" onclick="redirectToMenu()">'+'<?php echo $redirectToMenu ?>'+'</button>';
            boxes.forEach(boxe => boxe.remove());
            if (limitQuiz === point){
                question.classList.add('class-right')
                question.textContent = '<?php echo $revealAllGood ?>'+" !!!";
            } else if(limitQuiz / point <= 2) {
                question.classList.add('class-right')
                question.textContent = '<?php echo $revealScoreCap ?>'+ point +'<?php echo $revealScoreCap2 ?>' + limitQuiz + '!';
                
            } else if (point < 2){
                question.textContent = '<?php echo $revealScoreCap ?>'+ point + '<?php echo $revealScoreCap2 ?>'  + limitQuiz + '!';
                question.classList.add('class-wrong');
            }    else {
                question.textContent = '<?php echo $revealScoreCap ?>'+ point + '<?php echo $revealScoreCap2 ?>' + limitQuiz + '!';
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
        e.target.hidden = true;
        container.hidden = false;
        boxes.forEach(element => element.hidden = false);
        question.hidden = false
        
        
        selectAnswers();
    })
)

boxes.forEach(element => element.addEventListener('click', (e)=>{ 
    if(setted){    
        /*Si bonne réponse sélectionnée. */
        
                if(e.target.textContent === countries[picked]["capital"]) {
                    e.target.classList.add("good")
                    setted= false; 
                    point++; 
                    i++;
                    verifCompteur(i) 
                   
                    
                    /*Si Mauvaise réponse séléctionnée */            
                } else {
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