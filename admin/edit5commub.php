<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>
<?php include("menugaucheadminheader.php"); ?>
<?php
include '../../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM partners WHERE id='.$_GET["id"].'';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  Page 5 - Communautée
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin5commu.php">Marseille Solutions</a>
                    </li>
                    <li class="active">
                      Modifier le partenaire '<?php echo $row['partner'] ?>'
                    </li>
                </ol>
            </div>
        </div>
<!-- Ajouter un témoignage -->
        <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <h3 class="panel-title">Modifier le partenaire '<?php echo $row['partner'] ?>'</h3>
                  </div>
                  <div class="panel-body">
                    <form method='post' action='edit5commubcheck.php'>
                      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                      <p class="catform">
                        Logo du partenaire (lien vers l'image) :
                      </p>
                      <input class="form-control" name="logo" id="logo" placeholder="exemple : http://monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['logo'],ENT_QUOTES); ?>">

                      <p class="catform">
                        Nom du partenaire :
                      </p>
                      <input class="form-control" name="partner" id="partner" placeholder="exemple : Modeste Petrovitch Moussorgsky" value="<?php echo htmlspecialchars($row['partner'],ENT_QUOTES); ?>">

                      <p class="catform">
                        Lien vers le site :
                      </p>
                      <input class="form-control" name="lien" id="lien" placeholder="exemple : http://www.mon-partenaire.com" value="<?php echo htmlspecialchars($row['lien'],ENT_QUOTES); ?>">
                      <div class="row">
                        <a href="admin5commu.php">
                        <div class="col-lg-2 col-md-offset-6 valide">
                          <input class='btn btn-danger' name='annuler' value="Annuler">
                        </div>
                      </a>
                        <div class="col-lg-2 col-md-offset-1 valide">
                          <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
  </body>
  </html>
