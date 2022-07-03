<?php
use SendGrid\Mail\Mail;
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