<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>
<?php include("menugaucheadminheader.php"); ?>
<div id="page-wrapper">
  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
            Page 2 - Solutions
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
              </li>
              <li class="active">
                   Supprimer une solution
              </li>
          </ol>
      </div>
      <div class="col-lg-12">
      <p class="page-header">Rapport de suppression de l'élément.</p>
      </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
<?php
require '../../MarseilleSolutionDB/db.php';
$conn = new mysqli($serveur, $user, $mdp, $mabase);
$sql = 'DELETE FROM solutions WHERE id = '.$_GET["id"].'' ;
if ($conn->query($sql) === TRUE) {
  echo "L'élément ".$_GET["id"]." a bien été supprimé.";
} else {
  echo "La suppression de l'élément ".$_GET["id"]." a rencontré un problème, contactez nous.";
}
$conn->close();
?>
    </div>
  </div>
<div class="row">
  <div class="col-lg-12">
    <a href="admin2solu.php"><input type="submit" class="btn btn-primary" value="Retourner au menu"></a>
  </div>
</div>
</div>
</body>
</html>
