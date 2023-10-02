
<?php
    include 'header.php' ;
    require_once 'menu.php' ;
    
    $messageVerif = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $pdo = getConnection();
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $email =$_POST['email'];
        $adresse =$_POST['adresse'];
        $motDePasse = password_hash($_POST['MDP'], PASSWORD_BCRYPT);
        $verifPassword = $_POST['verifMDP'];
        if(!password_verify($verifPassword, $motDePasse)){
            $messageVerif=  "les deux mots de passe sont différents";
        }
        else{
            getUtilisateur($nom, $prenom, $email, $adresse, $motDePasse);
            echo "Inscription terminer";
        }
    }


?>

    <main class="page">
    <form action="inscription.php" method="post" >
        <!--nom-->
        <label for="nom"><p> Votre Nom: </p></label>
        <input type="text" id="nom" name="nom" required>
        <!--prenom-->
        <label for="prenom"><p> Votre Prenom: </p></label>
        <input type="text" id="prenom" name="prenom" required>
        <!--email-->
        <label for="email"><p> Votre email: </p></label>
        <input type="email" id="email" name="email" required>
        <!--adresse-->
        <label for="adresse"><p> Votre adresse: </p></label>
        <input type="text" id="adresse" name="adresse" required>
        <!--MDP-->
        <label for="MDP"><p> Mots de passe: </p></label>
        <input type="password" id="MDP" name="MDP" required>
        <!--confirmationMDP-->
        <label for="MDP"><p> Confirmation du Mots de passe: </p></label>
        <input type="password" id="verifMDP" name="verifMDP" required><br>
        <?php echo $messageVerif ?>
        <br>
        <input type="submit" value="Envoyer">
</form>
    </main>

<?php


include 'piedpage.php' ;
?>