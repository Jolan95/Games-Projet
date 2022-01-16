<?php
$style="Style/style.css";
include 'header.php';

?>
<body style="background-color: #282c34;">
<div class="row">
<div class="col-12 col-md-7">
    
</div>
</div>
<div class="profile-box" id="circle-initials" style=" display : flex ; justify-content : center; align-items : center; background-color : #282c34; position: absolute;  left: 46vw;  top: 22vh; width : 8vw; height : 8vw; border : 3px  solid #282c34 ;border-radius : 90px;">
<p style="color : white; font-size :4vw"><?php echo strtoupper(substr($_SESSION['firstname'],0,1)).'.'.strtoupper(substr($_SESSION['name'],0,1));?></p>
</div>
<div  id="content"style = "background-color : white;border-radius : 20px;border : 3px solid #282c34; margin-left : 25vw; width: 50vw; margin-top : 8vh;padding-top : 8vw; padding-left : 2vw; background-color : white">
<div id="profile">
<div style="border-bottom : 2vh" >
    <h2><?php echo $_SESSION['user']?></h2>
</div>  
<div style="margin-top : 1.4vw">
    <p style><?php echo $firstnameLabel ?> : <span  style="font-weight : bold"><?php echo $_SESSION['firstname']?></span></p>
    <p><?php echo $lastnameLabel ?> : <span  style="font-weight : bold"><?php echo $_SESSION['name']?></span></p>
    <p><?php echo $creationAccount ?>  : <span  style="font-weight : bold"><?php echo $_SESSION['createdAt']?></span></p>
    <p>Email : <span  style="font-weight : bold"><?php echo $_SESSION['email']?></span></p>
    <div>
    <button  onclick="deconnexion()" style="width : 120px; margin-bottom : 3vh" type="button" class="btn btn-warning"><?php echo $deconnexion ?></button>
    </div>
<p><a href="https://games-online.herokuapp.com/changePassword.php"><button onclick="managingPassword()" type="button" class="btn btn-success"><?php echo $managePassword ?></button></a></p>
</div> 
<div>
  <button onclick="deletingAccount()" type="button" class="btn btn-danger" style="width : 120px; margin-bottom : 3vh" ><?php echo $deletingAccount ?></button>


</div>
</div>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
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
      let circle = document.getElementById("circle-initials")

      function responsiveWindow(){
    if(window.innerWidth < 1000 ||  window.innerHeight < 500){
      circle.hidden = true
    } else {
      circle.hidden = false
    }
  }
responsiveWindow();
  window.addEventListener("resize", function(){
  responsiveWindow()

  })     



    </script>
    </body>

