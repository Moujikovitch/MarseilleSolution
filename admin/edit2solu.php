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

$sql = 'SELECT * FROM solutions WHERE id='.$_GET["id"].'';
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
                          Page 2 - Solutions
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Modifier la solution '<?php echo $row['nom'] ?>'
                            </li>
                        </ol>
                    </div>
                    <p class="page-header">Modifier le contenu de la solution '<?php echo $row['nom'] ?>'.</p>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier la solution '<?php echo $row['nom'] ?>'</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='edit2solucheck.php'>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <h5>
                                  Logo de la solution (lien vers l'image):
                                </h5>
                                <input name="logos" id="logos" class='form-control' placeholder="exemple : http://www.monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['logos'],ENT_QUOTES); ?>">
                                <h5>
                                  Nom de la solution:
                                </h5>
                                <input name="nom" id="nom" class='form-control' placeholder="exemple : SIMPLonMARS" value="<?php echo htmlspecialchars($row['nom'],ENT_QUOTES); ?>">
                                <h5>
                                  Sous-titre de la solution:
                                </h5>
                                <input name="fonction" id="fonction" class='form-control' placeholder="exemple : Fabrique de codeur" value="<?php echo htmlspecialchars($row['fonction'],ENT_QUOTES); ?>">
                                <h5>
                                  Infographie de la solution(lien vers l'image, apparait via la modal):
                                </h5>
                                <input name="infogra" id="infogra" class='form-control' placeholder="exemple : http://www.monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['infogra'],ENT_QUOTES); ?>">
                                <a href="admin2solu.php">
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
                </body>
                </html>
