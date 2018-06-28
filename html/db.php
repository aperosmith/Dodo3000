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
	/* FIN D'INITIALISATION DE LA CONNEXION DB */
	$config = array();
	$contact = array();
	$enfant = array();
	$event = array();

	$configIndex = array("ip","volume","longeurSon","etat");
	$contactIndex = array("nom","prenom","telephone","mail",);
	$enfantIndex = array("id","nom","prenom",);
	$eventIndex = array("id","idEnfant","debut","fin","duree","type","date",);
	$Pi = array('config'=>$config,'contact'=>$contact,'enfant'=>$enfant,'event'=>$event);
	$PiIndex = array(
		'config' => $configIndex,
		'contact' => $contactIndex,
		'enfant' => $enfantIndex,
		'event' => $eventIndex,
	);
	$i = 0;$o = 0;

	foreach ($PiIndex as $order => $index) {
		
		foreach ($index as $key => $value) {

		$req ='SELECT `'.$value.'` FROM `'.$order.'`';

		$reqResult = $bdd->query($req);
		$CHECK = $reqResult->fetch();
		$Pi[$order][$index[$o]] = $CHECK->$value;

		$o++;
		}
	$i++;
	$o = 0;
	}
	
	function chk($num){
		if(strlen($num) === 1){
			$num = "0".$num;
			return $num;
		}else{
			return $num;
		}
	}

	function diff($now,$begin){
		$saveNow = $now;
		$saveBegin = $begin;
		$now = DateTime::createFromFormat('H:i:s', $now);
		$begin = DateTime::createFromFormat('H:i:s', $begin);
		$diff  	= date_diff( $now, $begin);
		$diffH = $diff->h;
		$diffI = $diff->i;
		$diffS = $diff->s;
		$diff = chk($diffH).':'.chk($diffI).':'.chk($diffS);
		$now = $saveNow;
		$begin = $saveBegin;
		return $diff;
	}
	function diffCompare($now,$begin){
		$saveNow = $now;
		$saveBegin = $begin;
		$now = DateTime::createFromFormat('H:i:s', $now);
		$begin = DateTime::createFromFormat('H:i:s', $begin);
		$diff  	= date_diff( $now, $begin);
		$diffH = $diff->h;
		$diffI = $diff->i;
		$diffS = $diff->s;
		$diff = chk($diffH).chk($diffI).chk($diffS);
		$now = $saveNow;
		$begin = $saveBegin;
		return $diff;
	}

?>