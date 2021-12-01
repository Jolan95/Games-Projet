<?php 
$style="style.css";
include 'header.php';

?>

    <style>
        .div-form{
        border : 2px solid black;
        width: 35vw;
        padding : 3vh;
        margin-top : 10vh;
        justify-content:  center;
        border-radius: 12px;
        min-width: 300px;
        }
        .item-form{
        margin : 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size : 22px;
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
        @media screen and (max-width : 1100px) {
            .div-form {
                width : 60vw
            }
        }

    </style>
 
 
</head>
<body>
<?php
$error = false;
$success = false;

if (isset($_POST['mdp']) && isset($_POST['user'])) {
  $mdp = $_POST['mdp'];
  $user = $_POST['user'];
  $pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_53ae102770f6a82', "ba3595a923b6d7", "75287824");
      require_once 'User.php';

      $statement = $pdo->prepare('SELECT * FROM users WHERE pseudo = :user');
      $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
      $statement->bindValue(':user', $user);
      if ($statement->execute()) {

          $users = $statement->fetch();
          if ($users !== false && password_verify($mdp, $users->getPassword())) {
              $error = 0;
              $success = true;
              $login = true; 
              $_SESSION['user'] = $users->getPseudo();
              $_SESSION['firstname'] = $users->getFirstname();
              $_SESSION['name'] = $users->getName();
              $_SESSION['id'] = $users->getId();
              $_SESSION['createdAt'] = $users->getCreatedAt();
              $_SESSION['record_dice'] = $users->getRecordDice();
              $_SESSION['record_Hcap'] = $users->getRecordHcap();
              $_SESSION['record_Mcap'] = $users->getRecordMcap();
              $_SESSION['record_Ecap'] = $users->getRecordEcap();
              $_SESSION['record_guess'] = $users->getRecordGuess();
              $_SESSION['record_flappy'] = $users->getRecordFlappy();
              $_SESSION['class_user'] = $users;
              }
               }else {
              $error = 1;
            }
        }
       
?>

<div class="container ">
    <?php
    if($success){
        echo '<div class="col-12 success"> <p>'. $_SESSION['user'].', '.$successConnexion.' </p></div>';
    }
    ?>
    <form method="post" class="div-form">
    <?php
    if(!$success){
        echo '<h2>Identification</h2>';
    }else {
        echo '<h2>'.$welcome.' '.$_SESSION['user'].' ! </h2>';
    }

        if ($error === 1){
            echo '<p class="error">' .$wrongPairing.'</p>';
        }
        if(!$success){
       echo
            '<div class="item-form">
            <div>    
            <label for="user">'.$usernameLabel.'</label>
            </div>
        <div>    
        <input type="text" id="user" name="user" value="" />
    </div>
    </div>
    <div class="item-form">
        <div>
        <label for="mdp">'.$passwordLabel.'</label>
        </div>
        <div>
        <input type="text" id="mdp" name="mdp" value="" />
        </div>
        </div>
        <p id="pd">'.$noAccount. '<a href="inscription.php">'.$targetLink.'</a> !</p>
        <button type="submit" class="btn btn-primary" >Connexion</button>';
        
        
    } else {
       echo "<a href='home.php'>Retour à l'accueil</a>" ;
    }
    
    ?>
    
    </form>
    </body>
    </html>
    