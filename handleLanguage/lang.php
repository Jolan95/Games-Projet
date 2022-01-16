<?php
//On vérifie si le cookie existe déjà
if(isset($_COOKIE['lang'])) {
 
        //Si oui, on créer une variable $lang avec pour valeur celle du cookie.
    $lang = $_COOKIE['lang'];
 
}else {
    // si le cookie n'existe pas on tente de reconnaitre la langue par défaut du navigateur utilisé
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
}
$expire = 365*24*3600;

setcookie("lang", $lang, time() + $expire);
switch($lang) {
    //Si lang=fr on inclut le fichier de langue française
    case 'fr':
        include('lang-fr.php');
    break;
    //Si lang=en on inclut le fichier de langue anglaise
    case 'en' :
        include('lang-en.php');
    break;
    default :
    include('lang-en.php');
    break;

}
