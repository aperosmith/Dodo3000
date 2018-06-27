<?php

    /* DEBUT D'INITIALISATION DE LA CONNEXION DB */
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=berceuse', "root", ""); 
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    }
    catch(PDOException $e)
    {
        echo "Impossible de se connecter";
        die(); 
    }

$req = 'INSERT INTO enfant (nom, prenom)
        VALUES ("caca", "cucu")';
        $insertUsr = $bdd->query($req); 
?>
