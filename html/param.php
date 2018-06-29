<?php
include('db.php');
$config = array();
$contact = array();
$enfant = array();
$configIndex = array("ip", "volume", "longeurSon", "etat",);
$contactIndex = array("nom", "prenom", "adresse", "telephone", "mail",);
$enfantIndex = array("id", "nom", "prenom",);
$Pi = array('config' => $config, 'contact' => $contact, 'enfant' => $enfant);
$PiIndex = array('config' => $configIndex, 'contact' => $contactIndex, 'enfant' => $enfantIndex,);

$i = 0;
$o = 0;

foreach ($PiIndex as $order => $index) {

    foreach ($index as $key => $value) {

        $req = 'SELECT `' . $value . '` FROM `' . $order . '`;';
        $reqResult = $bdd->query($req);
        $CHECK = $reqResult->fetch();
        $Pi[$order][$index[$o]] = $CHECK->$value;
        $o++;
    }
    $i++;
    $o = 0;
}


if (isset($_POST['son'])) {
    $son = addslashes($_POST['son']);
    $reqUpdate = 'UPDATE `config` SET `volume` = "' . $son . '" WHERE `config`.`ip` ="127.0.0.0" ;';
    if ($update = $bdd->query($reqUpdate)) {
        echo "SEND";
    }
}
if (isset($_POST['durée'])) {
    $durée = addslashes($_POST['durée']);
    $reqUpdate = 'UPDATE `config` SET `durée` = "' . $durée . '" WHERE `config`.`ip` ="127.0.0.0" ;';
    if ($update = $bdd->query($reqUpdate)) {
        echo "SEND";
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
  <!--<link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style2.css">

  <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
  <!--  heure -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Bienvenue</title>
</head>
<body>
<section id="header">
  <div class="container">
    <div>
      <div style="position: absolute; top: 5px; left: 5px;"><a href="index.php"><input type="button" value="Menu"></a></div>
    </div>

  <section class="title_param">
    <div class="container">
      <br>
      <br>
      <h1 class="title_params text-center">Paramétrage du sons <i class="fa fa-music"></i></h1>
    </div>
  </section>

  <div class="text-center">
    <p class="lead">le son est actuel est à <?php echo $Pi['config']['volume'] ;?> sur une échelle de 0 à 1 :</p>
    <form method="post" action="param.php">
      <p class="lead">Song Set On <?php echo $Pi['config']['volume'] ?> 0 to 1 :</p>
      <input type="text" name="son" <?php echo("placeholder='" . $Pi['config']['volume'] . "'"); ?> >
      <br><br>
      <p class="lead">Time Set On <?php echo $Pi['config']['longeurSon'] ?> in sec :</p>
      <div class="form-label-group">
        <input type="text" name="longSon" <?php echo("placeholder='" . $Pi['config']['longeurSon'] . "'"); ?> />
      </div>
      <br><br>
      <a href="param.php"><input type="submit" name="submit" value="Enregistrement"></a>
    </form>


  </div>





<?php include 'script.php';?>
</body>
</html>