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

$sql = 'SELECT * FROM events WHERE id='.$_GET["id"].'';
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
                  Page 3 - Evénement
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                    </li>
                    <li class="active">
                         Modifier article événement '<?php echo $row['titre'] ?>'
                    </li>
                </ol>
                <p class="page-header">Modifier article événement '<?php echo $row['titre'] ?>'</p>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modifier article événement '<?php echo $row['titre'] ?>'</h3>
                    </div>
                    <div class="panel-body">
                      <form method='post' action='edit3eventcheck.php'>
                          <p class="catform">
                            Date manuscrite (apparaitra en haut de l'article) :
                          </p>
                          <input class="form-control" name="datemanu" id="datemanu" placeholder="exemple : L'an de grâce douze cent quatre-vingts-quatorze." value="<?php echo htmlspecialchars($row['datemanu'],ENT_QUOTES); ?>">
                          <p class="catform">
                            Photo (lien vers l'image) :
                          </p>
                          <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['photo'],ENT_QUOTES); ?>">
                          <p class="catform">
                            Titre de l'événement :
                          </p>
                          <input class="form-control" name="titre" id="titre" placeholder="exemple : Partie de pétanque." value="<?php echo htmlspecialchars($row['titre'],ENT_QUOTES); ?>">
                          <p class="catform">
                            Texte de l'article :
                          </p>
                          <textarea class="form-control" type="text" name="texte" id="texte" rows="10" placeholder="exemple : On ignore souvent les bienfaits d'une partie de pétanque, notamment ceux du pastis qui est un élément incontournable de ce rituel."><?php echo htmlspecialchars($row['texte'],ENT_QUOTES); ?></textarea>
                          <p class="catform">
                            Date numérique  : Attention ! format à respecter impérativement : AAAA-MM-JJ :
                          </p>
                          <input class="form-control" name="dates" id="dates" placeholder="exemple : 2015-12-24" value="<?php echo htmlspecialchars($row['dates'],ENT_QUOTES); ?>">
                          <div class="row">
                            <a href="admin3event.php">
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
  </div>
</body>
</html>
