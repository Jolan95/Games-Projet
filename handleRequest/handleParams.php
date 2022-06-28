<?php
    if(isset($_GET['language'])){
            if($_GET["language"] === "english"){
        
                $_COOKIE['lang'] = "en";
                
            }else{
                $_COOKIE['lang'] = "fr";
        
            }        
        }
        function isGoodLanguage($value){
            if($_COOKIE["lang"] === $value){
                echo "checked";
            }
        }