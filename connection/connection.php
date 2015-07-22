<?php
$erreur ='';
//on test si au démarrage le formulaire a bien été submit
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion'){

  if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['password']) && !empty($_POST['password']))){
    include 'pdo.php';
    //on teste si une entrée de la base contient ce couple name/password
    $sql ='SELECT count(*) FROM admin WHERE name = "'.mysql_escape_string($_POST['name']).'" AND password = "'.mysql_escape_string(md5($_POST['password'])).'"';
    $requete = mysql_query($sql) or die('Erreur SQL, Désolé !<br>'.$sql.'<br>'.mysql_error());
    $data =mysql_fetch_array($requete);
    mysql_free_result($requete);
    mysql_close();

  if ($data[0] ==1){ 
    session_start();
    $_SESSION['name'] = $_POST['name'];
    header('Location: ../admin/index.php');
    exit();
  }
  else {
    $erreur = "Identifiant ou mot de passe incorrect";
  }
  
      }
  else {
    $erreur = "Au moins un champs est vide";
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
	<form action="connection.php" method="post">
  <h1>Se connecter</h1>
  <div class="inset">
  <p>
    <label for="name">Identifiant</label>
    <input name="name" id="name" type="text" value="">
  </p>
  <p>
    <label for="password">Mot de passe</label>
    <input name="password" id="password" type="password" value="">
  </p>
  </div>
  <p class="p-container">
    <input name="connexion" id="go" value="Connexion" type="submit">
  </p>
  </form>
  <p><?php echo $erreur ; ?></p>
</div>
</body>
</html>