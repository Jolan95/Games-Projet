<?php
require_once('sendgrid-php.php');
use SendGrid\Mail\Mail;

if (isset($_POST['mail'])){

    $mail = htmlspecialchars($_POST['mail']);
    $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
    $statement = $pdo->prepare('SELECT email FROM users WHERE email = :mail');
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    $statement->bindValue(':mail', $mail);
    if($statement->execute()) {
        $users = $statement->fetch();
        if($users !== false ) {
            $success = 1;
            $bytes = random_bytes(50);
            $bytes = bin2hex($bytes);
            $statement2 = $pdo->prepare('UPDATE users SET token = :token WHERE email = :mail');
            $statement2->setFetchMode(PDO::FETCH_CLASS, 'User');
            $statement2->bindValue(':mail', $mail);
            $statement2->bindValue(':token', $bytes);
            if($statement2->execute()){
                $sendTo = $mail;
                $content = "<div style='margin : 10%'>Cliquez sur le lien ci dessous afin de réinitaliser votre mot de passe : <p><a href='https://games-online.herokuapp.com/passwordReset.php/?token=".$bytes."'>Réinitialiser mon mot de passe</a>.</p>";
                $email = new Mail();
                $email->setFrom("JGames-Online@hotmail.com");
                $email->setSubject("Réinitialisation mot de passe");
                $email->addTo($sendTo);
                $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                $email->addContent(
                "text/html", $content);
                $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
                try {
                    $response = $sendgrid->send($email);;
                } catch (Exception $e) {
                    echo 'Caught exception: '.  $e->getMessage(). "\n";
                }
            }
        } else {
            $error = 1;
        }
    }else{
        $error = 1;    
    };
}
