<?php
$success = 0;
$error = 0;
$style="Style/style.css";
include 'header.php';
require 'Class/user.php';
require 'handleRequest/formPassword-verif.php';


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
        <div hidden class='div-form' style="color : green; font-size : 1rem" id='handleGoodResult'>
            <?php echo $emailReceived ?>
        </div>
        <form method="post" action="formPassword.php"  class="div-form" id="formulaire">
            <h2><?php echo $resetPassword; ?></h2>
            <div class="item-form">
            
            <div  hidden style="color : red" id="handleWrongResult"><?php echo $EmailnotMatching; ?></div>
            
            
            <div>    
            <label for="user"><?php echo $labelEmail ?></label>
            </div>
        <div>    
        <input type="email" id="user" name="mail" value="" required/>
    </div>
    </div>

        <p style="margin-bottom : 10px, font-size : 0.8rem" id="pd"><?php echo $sentenceReset; ?></p>

        <button type="submit" class="btn btn-primary" ><?php echo $sendMail; ?></button>
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
