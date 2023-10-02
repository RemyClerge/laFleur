
<?php
    session_start();
    require_once 'models/gestionBdd.php' ;
    $categories=getCategories();
?>
    <body>
    <div class="conteneur">
    <header>
        <h1> La Fleur</h1>
        <h3>Fleurs d'ornements pour jardins</h3>
        
    </header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
        </ul>
        <hr>
        <p> Nos produits</p>
        <ul>
        <?php

            foreach ($categories as $categories) {
                $lib = $categories['cat_libelle'];
                $lien = "lesproduits.php?cat=".$categories['cat_code']."&lib=".$lib;
        ?>
            <li><a href="<?php echo $lien ; ?>"><?php echo $lib; ?></a></li>
        <?php }  ?>
        <hr>
        <?php
        if(isset($_SESSION['utilisateur'])){
            echo '<a href="deconnection.php">Se déconnecter </a><br>';
        }
        else{
            echo '<a href="inscription.php">S\'inscrire</a><br>';
            echo '<a href="connection.php">Connection</a>';
        }
        
        

        echo "<hr>";
        if(isset($_SESSION['utilisateur'])){
            echo $_SESSION['utilisateur'];
        
        }
        ?>

        </ul>
    </nav>
