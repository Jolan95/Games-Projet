
<?php
session_start();
$success = 0;
$error = 0;
$style="Style/style.css";
require 'Class/user.php';
require 'handleRequest/form-verif.php';
?>
    <style>
        body {
            background-color: #282c34 ;
        }
        .div-form{
            background-color: white;
        border : 2px solid black;
        width: 35vw;
        min-width : 350px;
        padding : 3vh;
        margin-top : 3.2vh;
        justify-content:  center;
        border-radius: 12px;
        min-width : 300px;
    }
    .item-form{
        margin : 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size : 17px;
        }
        p{
            font-size : 17px;
        }
        .error{
            color : red;
            font-size : 15px;
        }
        .success{
            background-color: lightgreen;
            text-align: center;
        }
        
        </style>
<body>
    <div class="container ">
        <div hidden class='div-form' style="color : green; font-size : 1.4rem" id='handleGoodResult'>
            <?php echo $successConnexion ?>
            <p><a href="https://games-online.herokuapp.com"><?php echo $redirectToMenu; ?></a></p>
        </div>
        <form method="post" action="form.php"  class="div-form" id="formulaire">
            <h2>Identification</h2>
            <div class="item-form">
            
            <div  hidden style="color : red" id="handleWrongResult"><?php echo $wrongPairing; ?></div>
            
            
            <div>    
            <label for="user"><?php echo $labelEmail ?></label>
            </div>
        <div>    
        <input type="email" id="user" name="user" value="" required/>
    </div>
    </div>
    <div class="item-form">
        <div>
        <label for="mdp"><?php echo $passwordLabel ?> </label>
        </div>
        <div>
        <input type="password" id="mdp" name="mdp" value="" required/>
        </div>
        </div>
        <p style="margin-bottom : 0" id="pd"><?php echo $noAccount ?>
        <a href="inscription.php"><?php echo $targetLink ?>
    </a> !</p>
    <p ><a class="password-link" href="https://games-online.herokuapp.com/formPassword.php"><?php echo $forgottenPassword; ?></a></p>
        <button type="submit" class="btn btn-primary" >Connexion</button>
</form>
    
    </body>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script >
    let success = <?php echo $success; ?>     
    let error = <?php echo $error; ?>

    
        if(success === 1){
        let form = document.getElementById('formulaire')
        form.hidden = true;
        let displaySuccessConnexion = document.getElementById('handleGoodResult');
        displaySuccessConnexion.hidden = false

            
        }
        if(error === 1){
        let displayWrongResult = document.getElementById('handleWrongResult')
        displayWrongResult.hidden = false;
        
    }
    </script>
    </html>