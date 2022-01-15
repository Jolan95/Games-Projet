<?php
$expire = 365*24*3600;
if(isset($_GET['language'])){
    if($_GET["language"] === "english"){

        $_COOKIE['lang'] = "en";
 
        
    }else{

        $_COOKIE['lang'] = "fr";

    } 

    
}
$style = "style.css";
require_once 'header.php';
?>
    <style>
        .div-form{
        border : 2px solid black;
        width: 35vw;
        min-width : 250px;
        padding : 3vh;
        margin-top : 3.2vh;
        justify-content:  center;
        border-radius: 12px;
        background-color: white;
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
        input[type=checkbox] {
  visibility: hidden;
}


        
        </style>
</head>
<body style="background-color: #282c34;">

    
    <?php  
    function isGoodLanguage($value){
    if($_COOKIE["lang"] === $value){
        echo "checked";
    }
    }
    ?>

<div class="container ">
<?php

    ?>
    <form method="get" action="settings.php" class="div-form">
        <h2>Settings</h2>
    <div class='item-form'>

    <div>  
        <label for="language">Language :</label>
        <div>
            <input type="radio" id="language" name="language" value="english" <?php isGoodLanguage("en") ?> />
            <label >Anglais</label>
            
        </div>
        
        <input type="radio" id="language" name="language" value="french" <?php isGoodLanguage("fr") ?> />
        <label >Français</label>

    </div>

    <div class='item-form'>

      <button type="submit" id='submit' class="btn btn-primary">Enregister </button>


    </form>
  </body>
</html>