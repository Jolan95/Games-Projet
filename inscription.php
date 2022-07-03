<?php
session_start();
require_once 'sendgrid-php.php';
use SendGrid\Mail\Mail;
$success = 0;
$error = 0;
?>

<?php
if(!empty($_POST) ){

    if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        /** Si tous les champs sont remplis */
        if( isset($_POST["password"]) && strlen($_POST["name"]) > 1 && strlen($_POST["firstname"]) > 1 && isset($_POST["passwordBis"]) ){
            if(strlen($_POST["pseudo"]) > 2){
                if ($_POST["password"] === $_POST["passwordBis"] && strlen($_POST["password"]) > 7){    
                    $name = htmlspecialchars($_POST['name']);   
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
                    $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
                    
                    $statement = $pdo->prepare('SELECT * FROM Users WHERE pseudo = :pseudo');
                    $statement2 = $pdo->prepare('SELECT * FROM Users WHERE email = :email');
                    $statement->bindValue(':pseudo', $pseudo);
                    $statement2->bindValue(':email', $_POST["email"]);
        
                    if($statement->execute() && $statement2->execute()) {
                        /** verifie le pseudo n'est pas déja utilisé */
                        if($statement->fetch(PDO::FETCH_ASSOC) || $statement2->fetch(PDO::FETCH_ASSOC)){

                            if($statement2->fetch(PDO::FETCH_ASSOC)){
                                $error = 6;
                            } else {
                                $error = 3;
                            }
                        } else{
                            $adding = $pdo->prepare("INSERT INTO users VALUES (UUID(), :pseudo, :name, :firstname, :password, NOW(), 0, 0, 0, 0, 0, 0, :email, NULL)");
                            $adding->bindValue(':pseudo', $pseudo);
                            $adding->bindValue(':name', $name);
                            $adding->bindValue(':firstname', $firstname);
                            $adding->bindValue(':password', $password);
                            $adding->bindValue(':email', $email);
                            if($adding->execute()){
                                $success = 1;
                            $sendTo = $email;
                            $content = "<div style='margin : 10%'>Bienvenue ".$firstname." ".$name.", votre compte a été créé avec succès ! Nous sommes heureux de vous compter parmi la communauté JGames-Online.<p>Vous pouvez désormais consulter vos records et comparer vos records avec les autres membres des JGames-Online.</p><div style='margin-top : 30px, font-size : 5px'><a href='https://games-online.herokuapp.com/'>Website</a></div></div>";
                            $email = new Mail();
                            $email->setFrom("JGames-Online@hotmail.com");
                            $email->setSubject("Création compte JGames-online");
                            $email->addTo($sendTo);
                            $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                            $email->addContent(
                                "text/html", $content);
                            
                            $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
                            try {
                                $response = $sendgrid->send($email);
                            } catch (Exception $e) {
                                echo 'Caught exception: '.  $e->getMessage(). "\n";
                            }
                            
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
        };
    }else{
    $error = 5;
    }
}

?>
<html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir nos différents jeux et venez défier les autres utilisateurs !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/carousel/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/carousel/owl.theme.default.min.css">
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	<body>
		<?php require_once 'header.php'; ?>
		<div class="container pt-3">
            <div class="box-white">

                <form method="post">
                    <h2>Inscription</h2>
                 <?php
                  switch ($error) {
                    case 1:
                        echo '<p class="error">'.$fullFilled.'</p>';
                        break;
                    case 2:
                        echo '<p class="error">'.$passwordNotPairing.'</p>';
                        echo '<p class="error">'.$passwordTooShort.'</p>';
                        break;
                    case 3:
                        echo '<p class="error">'.$pseudoExist.'</p>'; 
                        break;
                    case 4:
                        echo '<p class="error">'.$pseudoTooShort.'</p>';   
                        break;
                    case 5:
                        echo '<p class="error">'.$wrongFormatMail.'</p>';   
                        break;
                    case 6:
                        echo '<p class="error">'.$existMail.'</p>';   
                        break;
                    default : 
                    echo '';
                    break;
                }
                ?>
                <div>  
                    <label for="pseudo">Pseudo :</label>
                </div>
                <div> 
                    <input type="text" id="pseudo" name="pseudo" value="" required/>
                </div>
                <div>
                    <label for="email">E-mail :</label>
                 </div>
                <div>
                    <input type="email" id="email" name="email" value="" required/>
                </div>
                <div> 
                    <p class="error" id="firstnameVerif"></p>   
                    <label for="firstname"><?php echo $firstnameLabel ?> :</label>
                </div>
                <div>    
                    <input type="text" id="firstname" name="firstname" value="" required/>
                </div>
                <div>
                    <label for="name"><?php echo $lastnameLabel ?> : </label>
                </div>
                <div>
                    <input type="text" id="name" name="name" value="" required/>
                </div>
                <div>
                    <label for="password"><?php echo $passwordLabel ?> : </label>
                </div>
                <div>
                <input type="password" id="password" name="password" value="" required/>
                </div>
                <div>
                    <label for="passwordBis"><?php echo $passwordLabel2 ?>: </label>
                </div>
                <div>
                    <input type="password" id="passwordBis" name="passwordBis" value="" required/>
                </div>
                <p><?php echo $alreadyConnected ?><a href="https://games-online.herokuapp.com/form.php"><?php echo $targetLink ?></a> !</p>
                  <button type="submit" id='submit' class="btn btn-primary"><?php echo LOGIN ?></button>
            </form>    
        </div>
        <script>
            let success = <?php echo $success; ?>;
            let error = <?php echo $error; ?>;
            
            
            if(success === 1){
                setTimeout(()=> {
                    alert("<?php echo $successCreationAccount ?>");
                    window.location.replace("https://games-online.herokuapp.com/form.php");
                },400)
                
            }
            console.log('ERROR / '+error)
            
        </script>
    </body>
</html>