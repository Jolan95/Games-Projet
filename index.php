<?php
$style="Style/style.css";
include 'header.php';


?>
<style>
  .login{
    background-color:	#6B8E23
  }
  .logout{
    background-color: rgb(160, 160,100);
    outline : none;
      text-decoration : none;
  }
    .unloged{
      outline : none;
      text-decoration : none;
    }
    .loged{
      outline : none;
      text-decoration : none;
    }


.aside {
height : 12.7vh;
border-bottom-right-radius: 3vh;
border-top-right-radius: 3vh;
width : 100%;
min-height : 60px; 


}
.selected:hover{
  color : white;
}

  </style>
<body style="background-color:   #282c34; ">



<div  class="row asides">
  <div class="col-4" style="padding-left : 0">
  <a href="https://games-online.herokuapp.com/games.php"><button class=" aside selected"> <svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="bi bi-joystick side" viewBox="0 0 16 16">
      <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
      <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
    </svg><span><?php echo GAMES ; ?></span></button></a>
    <!--<button class="bg-primary border aside selected"><svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="bi bi-collection-fill side" viewBox="0 0 16 16">
      <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
    </svg>Catégories</button>-->
  <?php 
  if(isset($_SESSION['user'])){
    echo '    <a href="https://games-online.herokuapp.com/highScore.php"><button class="  aside selected"> <svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="side bi bi-trophy" viewBox="0 0 16 16">
    <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
  </svg><span>'.$highScore.'</span></button></a>';
  }else{
  echo '<button onclick="notConnected()" class=" aside selected"><svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="side bi bi-trophy" viewBox="0 0 16 16">
  <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
</svg><span>'.$highScores.'</span></button>';
  }
  ?>
  <a href="https://games-online.herokuapp.com/ranking/Ranking.php"><button  class="  aside selected"><svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class=" side bi bi-card-list" viewBox="0 0 16 16">
      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
      <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
    </svg><span><?php echo RANKING ; ?></span></button></a>
    <button onclick="comingSoon()" class=" aside selected">
      <svg xmlns="http://www.w3.org/2000/svg"width="4vh" height="4vh" fill="currentColor" class=" side bi bi-diagram-3" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
    </svg><span><?php echo  $tournament ?></span></button>
  <a href="https://games-online.herokuapp.com/settings.php"><button class="  aside selected"> <svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="bi bi-question-circle side" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg><span><?php echo $settings ?></span></button></a>
<?php
    if(isset($_SESSION["user"])){
      echo"<a href='https://games-online.herokuapp.com/profile.php'>";
    }else{
      echo"<a href='https://games-online.herokuapp.com/form.php'>";
  }?>
    <button onclick="logout()" class="aside login selected <?php if(isset($_SESSION["user"])){echo"logout";}else{echo "login";}?>"  > 
    <svg xmlns="http://www.w3.org/2000/svg" width="4vh" height="4vh" fill="currentColor" class="side bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg><span>
        <?php if(!isset($_SESSION["user"])){
          echo LOGIN;
        }else { 
          echo $profile;
        }
          ?> 
          </span>
         </button>
        </a>
      </div>


      
      
<div class="col-7 col-sm-8" style="margin-left : 0">
  <div class="container">
    <div class="row" style="padding-left : 0">
      <div class="col-10 col-xl-12" >
        <div style="width : 60vw;" class="bg-dark tit" style=" color : white; height : 2vh; font-size : 2rem ">
          #1 <?php echo $trends; ?>
        </div>
      </div>
    </div>
    <div class="row">
      
      <div style=" padding-bottom: 3vh" class="col-12">
        <a href="https://games-online.herokuapp.com/DiceGame/jeu.php"><img class="une" src="Img/photoDé.jpg" alt="#1 Tendance"></a>
        
      </div>
    </div>
    
    <div class="row" style="height : 30vh">
      
      
      
      
      <div  class="col-12 col-md-6 "  >

        <a href="https://games-online.herokuapp.com/GuessingGame/jeuNumber.php"><img class="pfc " id="third-box" src="Img/guess.jpg" alt="#1 Tendance"></a>
      </div>
      <div class="col-12 col-md-6" id='container-second-box'>
          <a href="https://games-online.herokuapp.com/QuizCap/capital.php"><img class="pfc" id='second-box' src="Img/jeuxCap.jpg" alt="#1 Tendance"></a>
      </div>
      
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  function comingSoon(){
    alert('<?php echo $tournaments; ?>')
  }
  function notConnected(){
    alert('<?php echo $notConnected; ?>')
  }
  box3 = document.getElementById("third-box")
  box2 = document.getElementById('second-box')
  containerBox = document.getElementById('container-second-box')
  function resizeWindow(){
    if(window.innerWidth > 880){
    for (let e of document.getElementsByTagName("span")) { e.hidden = false; }
    for (let e of document.getElementsByClassName("svg")) {e.style.height = 16; e.style.width = 16}
  } else {
    for (let e of document.getElementsByTagName("span")) { e.hidden = true; }
    for (let e of document.getElementsByClassName("svg")) {e.style.height = 26; e.style.width = 26}
  }
  if(window.innerWidth < 768){
    containerBox.style.width = "60vw;"
    box2.style.width = "60vw";
    box3.hidden = true;
  }else {
    containerBox.style.width = "28vw;"
    box2.style.width = "28vw";
    box3.hidden = false;
  }
  }
resizeWindow();
  window.addEventListener("resize", function(){
  resizeWindow()

  })
      </script>




</body>
</html>