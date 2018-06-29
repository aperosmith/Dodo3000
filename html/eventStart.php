<?php 
	include('db.php'); 
	$clock = date("H:i:s");// 17:16:18
	$date = date('Y-m-j');


		$req = "SELECT * FROM `event` ORDER BY `event`.`id` DESC";
	$IdEvent = $bdd->query($req)->fetch()->id;
		$req = 'SELECT `fin` FROM `event` WHERE `event`.`id` ="'.$IdEvent.'"';
	$eventFin = $bdd->query($req)->fetch()->fin;

	$diff = diffCompare($clock,$eventFin); 
	if ($diff > 100 || $diff  === 0) {
		$req = 'INSERT INTO event (idEnfant,debut,fin,duree,type,date)
		    VALUES ("'.$Pi["enfant"]["id"].'", "'.$clock.'","","","1","'.$date.'")';
		    if ($insertUsr = $bdd->query($req)) {
		    	echo "eventStart";
		    }
	}else{echo "eventAddToOldOne";}


 /* dernier ID(event) insert dans la table */

/*

	 */
?>

