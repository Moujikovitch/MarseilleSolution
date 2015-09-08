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
    $sql = 'UPDATE solutions SET logos = "'.$_POST['logos'].'", nom = "'.$_POST['nom'].'", fonction = "'.$_POST['fonction'].'", infogra = "'.$_POST['infogra'].'"  WHERE id="'.$_POST['id'].'"';
    if ($conn->query($sql) === TRUE) {
      $confirm= "<script>alert('Modification(s) effectuée(s) !".$_POST['id']."');
      window.location.href='admin2solu.php'
      </script> ";
    } else {
      $confirm= "<script>alert('Erreur, contactez nous.');
      window.location.href='admin2solu.php'</script>";
    }
      $conn->close();
    }
    echo $confirm;
?>
