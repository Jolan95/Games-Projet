<?php

if (isset($_POST['user']) && isset($_POST['mdp'])){
     $mdp = htmlspecialchars($_POST['mdp']);
     $user = htmlspecialchars($_POST['user']);
     $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
     $statement = $pdo->prepare('SELECT * FROM users WHERE email = :user');
     $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
     $statement->bindValue(':user', $user);
     if($statement->execute()) {
         $users = $statement->fetch();
         if($users !== false && password_verify($mdp, $users->getPassword())) {
             $success = 1;

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
            $_SESSION['email'] = $users->getEmail();
            $_SESSION['class_user'] = $users;

            
            } else {
                $error = 0;
            }
         }else{
             $error = 0;
         };

     }