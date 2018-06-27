


<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
  <!--<link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="boostrap.min.css">
  <link rel="stylesheet" href="style.css">

  <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
<!--  heure -->
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
  <title>Bienvenue</title>
</head>
<body>


<br>
<br>
<br>
<main role="main">


  <section class="jumbotron text-center">

    <div class="clock">
      <div id="ejs_heure"></div>

    </div>


  </section>



  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="img/baby1.png"
                 alt="Card image cap">
            <div class="card-body">
              <h1 class="title_box1">Resumées des nuits</h1>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="img/baby2.png"
                 alt="Card image cap">
            <div class="card-body">
              <h1 class="title_box2">Nouveaux Bébé <br>New Parent</h1>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="img/baby3.png"
                 alt="Card image cap">
            <div class="card-body">
              <h1 class="title_box3">Configuration sons et autre</h1>

            </div>
          </div>
        </div>

    </div>
  </div>

</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<SCRIPT LANGUAGE="JavaScript">
  /*
  Source :  http://www.editeurjavascript.com
   Adaptation : http://www.outils-web.com
  */
  function HeureCheckEJS()
  {
    krucial = new Date;
    heure = krucial.getHours();
    min = krucial.getMinutes();
    sec = krucial.getSeconds();
    jour = krucial.getDate();
    mois = krucial.getMonth()+1;
    annee = krucial.getFullYear();
    if (sec < 10)
      sec0 = "0";
    else
      sec0 = "";
    if (min < 10)
      min0 = "0";
    else
      min0 = "";
    if (heure < 10)
      heure0 = "0";
    else
      heure0 = "";
    DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
    which = DinaHeure
    if (document.getElementById){
      document.getElementById("ejs_heure").innerHTML=which;
    }
    setTimeout("HeureCheckEJS()", 1000)
  }
  window.onload = HeureCheckEJS;
</SCRIPT>
</body>
</html>