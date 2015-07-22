<?php
$erreur ='';
//on teste si l'internaute a submit le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription'){
  //on teste l'existence de nos variables et on teste aussi si elles ne sont pas vides
if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['firstname']) && !empty($_POST['firstname'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['password_confirm']) && !empty($_POST['password_confirm']))){     # code...
  //on teste les deux mots de passe
  if ($_POST['password'] != $_POST['password_confirm']){
    $erreur = "Attention ! Les deux mots de passe sont différents.";
  }
  else{
    include 'pdo.php';
    //on recherche si ce login est déjà utilisé par un autre admin
    $sql= 'SELECT count(*) From admin WHERE email="'.mysql_escape_string($_POST['email']).'"';
    $requete = mysql_query($sql) or die('Désolé, erreur SQL mon gars!<br>'.$sql.'<br>'.mysql_error());
    $data = mysql_fetch_array($requete);
    if ($data[0] == 0){
    $sql ='INSERT INTO admin VALUES ("","'.mysql_escape_string($_POST['name']).'","'.mysql_escape_string($_POST['firstname']).'","'.mysql_escape_string($_POST['email']).'","'.mysql_escape_string(md5($_POST['password'])).'")';
    mysql_query($sql) or die('Désolé, erreur SQL mon gars!<br>'.$sql."<br>".mysql_error());
  
    }
    else{
    $erreur ='Un admin existe déjà avec cet email';


    }
  }
}
else{
$erreur = "Au moins un des champs est vide";

}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<!--Css-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Js-->
</head>
<body>
	<?php include 'navbar.php' ; ?>

<div class="container" style="margin-top:100px;">
	<form action="inscription.php" method="post">
  <h1>Créer Votre Compte</h1>
  <div class="inset">
  <p>
    <label for="name">Nom/Pseudo</label>
    <input name="name" id="name" type="text" value="">
  </p>
  <p>
    <label for="firstname">Prenom</label>
    <input name="firstname" id="firstname" type="text" value="">
  </p>
  <p>
    <label for="email">Email</label>
    <input name="email" id="email" type="text" value="">
  </p>
  <p>
    <label for="password">Password</label>
    <input name="password" id="password" type="password" value="">
  </p>
  <p>
    <label for="password_confirm">Password Confirm</label>
    <input name="password_confirm" id="password_confirm" type="password" value="">
  </p>

  </div>
  <p class="p-container">
    <input name="inscription" id="go" value="Inscription" type="submit">
  </p>
  <p id="errormsg"><?php echo $erreur ; ?></p>
</form>
</div
</body>
</html>