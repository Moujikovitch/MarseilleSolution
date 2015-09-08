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

$sql = 'SELECT * FROM equipes WHERE id='.$_GET["id"].'';
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
                      Modifier l'équipier '<?php echo $row['nomeq'] ?>'
                    </li>
                </ol>
            </div>
        </div>
<!-- Ajouter un témoignage -->
        <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <h3 class="panel-title">Modifier l'équipier'<?php echo $row['nomeq'] ?>'</h3>
                  </div>
                  <div class="panel-body">
                    <div class="panel-body">
                      <form method='post' action='edit5commuccheck.php'>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                        <p class="catform">
                          Image de portrait (lien vers l'image) :
                        </p>
                        <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['photo'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Nom de l'équipier :
                        </p>
                        <input class="form-control" name="nomeq" id="nomeq" placeholder="exemple : Gaston Lagaffe" value="<?php echo htmlspecialchars($row['nomeq'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Poste chez Marseille Solutions :
                        </p>
                        <input class="form-control" name="poste" id="poste" placeholder="exemple : Dresseur de mouette" value="<?php echo htmlspecialchars($row['poste'],ENT_QUOTES); ?>">

                        <p class="catform">
                          Biographie :
                        </p>
                        <textarea class="form-control" type="text" name="biographie" id="biographie" rows="10" placeholder="exemple : Dans ma petite enfance, ne pas avoir mon goûté à 16h pile était une immense frustration, alors j'ai decidé de me mettre à la gouache pour me calmer et c'est comme ça que je suis devenu graphiste."><?php echo htmlspecialchars($row['biographie'],ENT_QUOTES); ?></textarea>
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
