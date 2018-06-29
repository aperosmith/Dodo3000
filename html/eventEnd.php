<?php 
	include('db.php'); 
	$clock = date("H:i:s");// 17:16:18 NNOOWWW
	$date = date('Y-m-j');

	// get last newest id in the table// 
		$req = "SELECT * FROM `event` ORDER BY `event`.`id` DESC";
	$IdEvent = $bdd->query($req)->fetch()->id; /* dernier ID(event) insert dans la table */
		$req = 'SELECT `debut` FROM `event` WHERE `event`.`id` ="'.$IdEvent.'"';
	$EventBeg = $bdd->query($req)->fetch()->debut; /* temp startEvent*/

	$diff = diff($clock,$EventBeg); /*  check db.php  // make diff between 2 format 02:05:27 (min) */ 

	$reqUpdate ="UPDATE `event` SET `fin` = '".$clock."', `duree` = '".$diff."' WHERE `event`.`id` = ".$IdEvent.";";
		if ($update = $bdd->query($reqUpdate)) 
		{echo "UPDATED";}


		// UPDATE ENDTIME && DUREE WITH DIFFERENCE // 
	//DECLARE LA DIFF ET CREE DUREE // 
	// SI DUREE < 5sec  //
	//*
	/*$req = 'DELETE FROM `event` WHERE `event`.`id` = "'.$IdEvent.'"';
		*/
/*
	$req = 'INSERT INTO event (idEnfant,debut,fin,duree,type,date)
	    VALUES ("'.$Pi["enfant"]["id"].'", "'.$clock.'","","","1","'.$date.'")';
	    if ($insertUsr = $bdd->query($req)) {
	    	echo "eventStart";
	    }
	  	*/
?>



	
