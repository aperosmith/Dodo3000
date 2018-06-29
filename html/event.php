<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Document</title>
</head>

<body class="homepage is-preload">
<br>
<br>
<?php
	include('db.php');
	$checkDate = date('Y-m-j');
	for ($dayDateArray = 0; $dayDateArray < 50 ; $dayDateArray++) {
	$checkDate =  date('Y-m-j',strToTime('-'.$dayDateArray.' day'));


		$req = 'SELECT `id` FROM `event` WHERE `event`.`date`="'.$checkDate.'"';
		$tab= array();
		if($recup = $bdd->query($req)){

			while($id = $recup->fetch()){
				$i = $id->id;
				array_push($tab, $i) ; // ici 2 //
				$i++;
			}
			echo '<h1 class="text-center">'.$checkDate.'</h1><br>
					<table class="table table-striped">
					  <tr>
					    <th class="text-center" scope="col">Num Event</th>
					    <th class="text-center" scope="col">Debut</th>
					    <th class="text-center" scope="col">Fin</th>
					    <th class="text-center" scope="col">Durée</th>
					  </tr>';

			for ($x=0; $x < count($tab) ; $x++) {
				$reqDebut = 'SELECT `debut` FROM `event` WHERE `event`.`id` ="'.$tab[$x].'"';
				$reqDuree = 'SELECT `duree` FROM `event` WHERE `event`.`id` ="'.$tab[$x].'"';
				$reqFin = 'SELECT `fin` FROM `event` WHERE `event`.`id` ="'.$tab[$x].'"';
					$debut = $bdd->query($reqDebut)->fetch()->debut;
					$duree = $bdd->query($reqDuree)->fetch()->duree;
					$fin = $bdd->query($reqFin)->fetch()->fin;
				echo "<tr><td>".$tab[$x]."</td><td>".$debut."</td><td>".$fin."</td><td>".$duree."</td></tr>";
			}
			echo "</table><br><br><br><br>";
		}

	}
?>
  </thead>


</table>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>
