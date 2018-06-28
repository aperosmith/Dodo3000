<?php 
	include('db.php'); 
	$clock = date("H:i:s");// 17:16:18
	$date = date('Y-m-j');
 /* dernier ID(event) insert dans la table */

	$req = 'INSERT INTO event (idEnfant,debut,fin,duree,type,date)
	    VALUES ("'.$Pi["enfant"]["id"].'", "'.$clock.'","","","1","'.$date.'")';
	    if ($insertUsr = $bdd->query($req)) {
	    	echo "eventStart";
	    }
?>

