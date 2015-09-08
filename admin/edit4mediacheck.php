<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>
<?php include("menugaucheadminheader.php"); ?>
<?php
include '../../MarseilleSolutionDB/db.php';
$error = "";
// mise à jour du titre dans la bdd
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = 'UPDATE medias SET photo = "'.$_POST['photo'].'", titre = "'.$_POST['titre'].'", texte = "'.$_POST['texte'].'", dates = "'.$_POST['dates'].'"  WHERE id="'.$_POST['id'].'"';
    if ($conn->query($sql) === TRUE) {
      $confirm= "<script>alert('Modification(s) effectuée(s) !".$_POST['id']."');
      window.location.href='admin4media.php'
      </script> ";
    } else {
      $confirm= "<script>alert('Erreur, contactez nous.');
      window.location.href='admin3media.php'</script>";
    }
      $conn->close();
    }
    echo $confirm;
?>
