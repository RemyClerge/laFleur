<?php
 include 'header.php' ;
 require_once 'menu.php' ;
 if(isset($_SESSION["utilisateur"])){
    echo '<meta http-equiv="refresh" content="3; URL=connection.php">';
    echo '<main class="page">';
    echo '  <br><h3>Merci de votre visite Bye Bye</h3>';
    echo '</main>';
    session_destroy();
 }else{
    header("Location: index.php");
 }
 include 'piedpage.php' ;
?>