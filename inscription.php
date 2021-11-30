<?php
$style="style.css";
include 'header.php'
?>
    <style>
        .div-form{
        border : 2px solid black;
        width: 35vw;
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
</head>
<body>
<?php
$success = 0;
$popup = false;
$error = 0;
if(!empty($_POST) ){
    /** Si tous les champs sont remplis */
    if( isset($_POST["password"]) && strlen($_POST["name"]) > 1 && strlen($_POST["firstname"]) > 1 && isset($_POST["passwordBis"])){
    if(strlen($_POST["pseudo"]) > 2){
    if ($_POST["password"] === $_POST["passwordBis"] && strlen($_POST["password"]) > 7){    
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $name = htmlspecialchars($_POST['name']);   
        $firstname = htmlspecialchars($_POST['firstname']);
        /**$email = htmlspecialchars($_POST['email']);*/
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
        $pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
        
        $statement = $pdo->prepare('SELECT * FROM Users WHERE pseudo = :pseudo');
        /**$statement2 = $pdo->prepare('SELECT * FROM Users WHERE email = :email');*/
        $statement->bindValue(':pseudo', $_POST["pseudo"]);
        /**$statement2->bindValue(':email', $_POST["email"]);*/
        
        if($statement->execute()) {
            /** verifie le pseudo n'est pas déja utilisé */
            if($statement->fetch(PDO::FETCH_ASSOC)){
                $error = 3;
            } else{
                $adding = $pdo->prepare("INSERT INTO users VALUES (UUID(), :pseudo, :name, :firstname, :password, NOW(), 0, 0, 0, 0, 0, 0)");
                $adding->bindValue(':pseudo', $pseudo);
                $adding->bindValue(':name', $name);
                $adding->bindValue(':firstname', $firstname);
                $adding->bindValue(':password', $password);
                if($adding->execute()){
                $success = 1;
                }
            } 
        } else {
            $error = 3;
        }
     
    } else {
        $error = 2;
    } 
}else{
    $error = 4;
}
    }else {
        $error = 1;
    }
}

?>
    

<div class="container ">

    <form method="post" class="div-form">
        <h2>Inscription</h2>
    <div class='item-form'>
        <?php if($error === 1){
         echo '<p class="error">'.$fullFilled.'</p>';
        } else if($error === 2){
        echo '<p class="error">'.$passwordNotPairing.'</p>';
        echo '<p class="error">'.$passwordTooShort.'</p>';
        }else if ($error === 3){
            echo '<p class="error">'.$pseudoExist.'</p>';   
        } else if ($error === 4) {
            echo '<p class="error">'.$pseudoTooShort.'</p>';   
            
        }
        ?>
    <div>  

        <label for="pseudo">Pseudo :</label>
    </div>
    <div> 
    <input type="text" id="pseudo" name="pseudo" value="" />
</div>
    </div>
    <div class='item-form'>
    <div> 
    <p class="error" id="firstnameVerif"></p>   
        <label for="firstname"><?php echo $firstnameLabel ?> :</label>
    </div>
    <div>    
    <input type="text" id="firstname" name="firstname" value="" />
</div>
    </div>
<div class='item-form'>
    <div>
    <label for="name"><?php echo $lastnameLabel ?> : </label>
</div>
<div>
<input type="text" id="name" name="name" value="" />
</div>
</div>

<!--<div class='item-form'>
    <div>
    <label for="email">Adresse E-mail :</label>
</div>
<div>
<input type="email" id="email" name="email" value="" />
</div>
</div> -->
<div class='item-form'>

    <div>
    <label for="password"><?php echo $passwordLabel ?> : </label>
</div>
<div>
<input type="password" id="password" name="password" value="" />
</div>

    </div>
<div class='item-form'>

    <div>
    <label for="passwordBis"><?php echo $passwordLabel2 ?>: </label>
</div>
<div>
<input type="password" id="passwordBis" name="passwordBis" value="" />
</div>

    </div>
 


    <p><?php echo $alreadyConnected ?><a href="form.php"><?php echo $targetLink ?></a> !</p>
      <button type="submit" id='submit' class="btn btn-primary"><?php echo LOGIN ?></button>

    </form>
  </body>
  <script>
      let redirect = <?php echo "$success"; ?>

      if(redirect === 1){
          alert(<?php echo "$successCreationAccount" ?>)
          window.location = 'http://localhost/projet-jeux/form.php';
          
      }
      
  </script>
</html>