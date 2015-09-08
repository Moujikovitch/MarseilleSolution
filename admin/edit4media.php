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

$sql = 'SELECT * FROM medias WHERE id='.$_GET["id"].'';
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
                  Page 4 - Media
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                    </li>
                    <li class="active">
                         Modifier article media '<?php echo $row['titre'] ?>'
                    </li>
                </ol>
                <p class="page-header">Modifier article media '<?php echo $row['titre'] ?>'</p>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-green">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter un article media à la liste</h3>
                </div>
                <div class="panel-body">
                  <form method='post' action='edit4mediacheck.php'>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                      <p class="catform">
                        Photo (lien vers l'image) :
                      </p>
                      <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg" value="<?php echo htmlspecialchars($row['photo'],ENT_QUOTES); ?>">
                      <p class="catform">
                        Titre de l'article media :
                      </p>
                      <input class="form-control" name="titre" id="titre" placeholder="exemple : Publication chez 20 minutes" value="<?php echo htmlspecialchars($row['titre'],ENT_QUOTES); ?>">
                      <p class="catform">
                        Texte de l'article :
                      </p>
                      <textarea class="form-control" type="text" name="texte" id="texte" rows="10" placeholder="exemple : Nous avons été sévèrement critiqué dans cet article ! C'est INADMISSIBLE !" ><?php echo htmlspecialchars($row['texte'],ENT_QUOTES); ?></textarea>
                      <p class="catform">
                        Date de publication (affichée sous le titre) :
                      </p>
                      <input class="form-control" name="dates" id="dates" placeholder="exemple : 2015-12-24" value="<?php echo htmlspecialchars($row['dates'],ENT_QUOTES); ?>">
                      <div class="row">
                        <a href="admin4media.php">
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
