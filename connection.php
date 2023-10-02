<?php
    include 'header.php' ;
    require_once 'menu.php' ;
    
    $messageConfirm  = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $pdo = getConnection();
        $email =$_POST['email'];
        $motDePasse = $_POST['MDP'];
        $resultat = getConnect($email, $motDePasse);
        
        if(empty($email) || empty($motDePasse)){
            echo "c\'est vide";
        }
        else {
            $resultat=getConnect($email, $motDePasse);
            if($resultat == null){
                echo "<br>";
                echo " Compte inexistant ";
            }
            else{
                if(password_verify($motDePasse, $resultat['motDePasse'])){
                    $nom = $resultat['nom'];
                    $messageConfirm = " bon retour " .$nom. " j'espère que vous passerez un bon moment";
                    $_SESSION['utilisateur'] = $nom." " .$resultat['prenom'];
                    echo '<meta http-equiv="refresh" content="1; URL=index.php">';

                }
                else{
                    $messageConfirm = "mot de passe incorrect";
                }
                
            }
        }
    }


?>

    <main class="page">
    <form action="connection.php" method="post" >
        <!--email-->
        <label for="email"><p> Votre email: </p></label>
        <input type="email" id="email" name="email" required>
        <!--MDP-->
        <label for="MDP"><p> Mots de passe: </p></label>
        <input type="password" id="MDP" name="MDP" required><br>
        <input type="submit" value="se connecter">
        <br>
        <?php echo $messageConfirm ?>
        <br>

</form>
    </main>

<?php


include 'piedpage.php' ;
?>