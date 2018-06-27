<?php include('db.php');

$req = 'INSERT INTO enfant (nom, prenom)
		VALUES ("caca", "cucu")';
		$insertUsr = $bdd->query($req); 
?>