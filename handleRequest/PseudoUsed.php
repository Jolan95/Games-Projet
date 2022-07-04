<?php
            $pdo = new PDO($_ENV["CLEARDB_DATABASE_DSN"], $_ENV["CLEARDB_DATABASE_USERNAME"], $_ENV["CLEARDB_DATABASE_PASSWORD"]);
            $statement = $pdo->prepare('SELECT pseudo, '.$game.' FROM users WHERE '.$game.' > 0 ORDER BY '.$game.' ASC  LIMIT 0, 15'); 
            if ($statement->execute()) {
            
                while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $i++;
                    if($i === 1){
                        echo '<tr class="gold"><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
                    } else {
                    
                        echo '<tr><td>'.$i.'</td><td>'.$user['pseudo'].'</td><td>'.$user[$game].'</td></tr>';
                    }
                }

            }else {
                echo "erreur fatale";
            }
?>