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

$sql = 'SELECT * FROM communautes WHERE id='.$_GET["id"].'';
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
                      Modifier le témoignage de '<?php echo $row['nom'] ?>'
                    </li>
                </ol>
            </div>
        </div>
<!-- Ajouter un témoignage -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modifier le témoignage de '<?php echo $row['nom'] ?>'</h3>
                    </div>
                    <div class="panel-body">
                      <form method='post' action='edit5commuacheck.php'>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                        <p class="catform">
                          Image de portrait (lien vers l'image) :
                        </p>
                        <input class="form-control" name="image" id="image" placeholder="exemple : http://monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['image'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Nom :
                        </p>
                        <input class="form-control" name="nom" id="nom" placeholder="exemple : Modeste Petrovitch Moussorgsky" value="<?php echo htmlspecialchars($row['nom'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Fonction/profession/titre :
                        </p>
                        <input class="form-control" name="fonction" id="fonction" placeholder="exemple : Dresseur de chameaux" value="<?php echo htmlspecialchars($row['fonction'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Témoignage :
                        </p>
                        <textarea class="form-control" type="text" name="description" id="description" rows="10" placeholder="exemple : J'ai toujours su que Marseille Solutions sauverait la citée phocéenne de ses plus grands maux et je suis persuadé que la terre et bientôt la galaxie entière leur seront accorderont la reconnaissance qu'ils méritent."><?php echo htmlspecialchars($row['description'],ENT_QUOTES); ?></textarea>
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
