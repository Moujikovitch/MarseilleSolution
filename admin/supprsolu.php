<?php include("menuadminheader.php"); ?>
<?php include("menugaucheadminheader.php"); ?>
<div id="page-wrapper">

      <div class="row">
          <div class="col-lg-12">
<?php
require '../../MarseilleSolutionDB/db.php';
$conn = new mysqli($serveur, $user, $mdp, $mabase);
$sql = 'DELETE FROM solutions WHERE id = '.$_GET["id"].'' ;
if ($conn->query($sql) === TRUE) {
  echo $_GET["id"]." a bien été supprimé.";
} else {
  echo $_GET["id"]." merdoit.";
}
$conn->close();
?>

</div>
</div>
</div>
</body>
</html>
