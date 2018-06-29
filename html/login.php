<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Inscription ou Connexion</title>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/groot.jpg" />
</head>

<body>
	  <?php include('db.php'); ?>
    <?php
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'])) {
        $nom = addslashes($_POST['nom']);
        $prenom = addslashes($_POST['prenom']);
        $mail = addslashes($_POST['mail']);
        $telephone = addslashes($_POST['telephone']);
        $req = 'INSERT INTO contact (nom, prenom, mail, telephone)
                VALUES ("' . $nom . '", "' . $prenom . '", "' . $mail . '","' . $telephone . '")';
        if ($insertUsr = $bdd->query($req)) {
           echo "Inscription faite pour vous";
        }
        else
        {

        }

    } else if (isset($_POST['prenom'], $_POST['nom'])) {
        $nom = addslashes($_POST['nom']);
        $prenom = addslashes($_POST['prenom']);
        $req = 'INSERT INTO enfant (nom, prenom)
		            VALUES ("' . $nom . '", "' . $prenom . '")';
    if ($insertUsr = $bdd->query($req)) {
           echo "Inscription faite pour votre bébé";
        }
        else
        {

        }	
    }
    ?>
  <div class="cotn_principal">
<div class="cont_centrar">
    <div style="position: absolute; top: 5px; left: 5px;"><a href="index.html"><input type="button" class="btn_login" value="Accueil"/></a></div>
  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>Bébé</h2>  
  <p>Cliquez-ici pour ajouter bébé.</p> 
  <button class="btn_login" onclick="cambiar_login()">INSCRIPTION BÉBÉ</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">

  <h2>Parents</h2>
  <p>Cliquez-ici pour vous inscrire.</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">INSCRIPTION PARENTS</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="images/picc.jpg" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="images/pic01.jpg" alt="" />
       </div>
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
   <form action="login.php" method="POST">
<input type="text" name="nom" placeholder="Nom" />
<input type="text" name="prenom" placeholder="Prénom" />
<input class="btn_login" type="submit" name="sub" value="INSCRIPTION">
</form>
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
<form action="login.php" method="POST">
<input type="text" name="nom" placeholder="Nom" />
<input type="text" name="prenom" placeholder="Prénom" />
<input type="text" name="mail" placeholder="Email" />
<input type="text" name="telephone" placeholder="Téléphone" />
<input class="btn_login" type="submit" name="sub" value="INSCRIPTION">
</form>
  </div>
    </div>
  </div>
 </div>
</div>
    <script  src="assets/js/index.js"></script>
</body>

</html>