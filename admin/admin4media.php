<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>

<?php
require '../../MarseilleSolutionDB/db.php';

$error = "";

//SQLI POUR EVENTS
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newtitre = $_POST['titre'];
    $newdates = $_POST['dates'];
    $newtexte = $_POST['texte'];
    $newphoto = $_POST['photo'];
    $sql = "INSERT INTO medias(id, photo, titre, texte, dates) VALUES('','".$newphoto."', '".$newtitre."', '".$newtexte."', '".$newdates."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout d'article media validé !";
    } else {
    $confirm= "Erreur dans la mise à jour, contactez nous. ";
}

    $conn->close();
}
?>
<?php include("menugaucheadminheader.php"); ?>

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
                                 Ajouter, modifier, supprimer un article media.
                            </li>
                        </ol>
                        <p class="page-header">Ajouter un article media à la liste, modifier ou supprimer les articles présents. Les articles seront classés par ordre d'ajout. La date ne les influence pas</p>
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
                              <form method='post' action='admin4media.php'>
                                  <p class="catform">
                                    Photo (lien vers l'image) :
                                  </p>
                                  <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg">
                                  <p class="catform">
                                    Titre de l'article media :
                                  </p>
                                  <input class="form-control" name="titre" id="titre" placeholder="exemple : Publication chez 20 minutes">
                                  <p class="catform">
                                    Texte de l'article :
                                  </p>
                                  <textarea class="form-control" type="text" name="texte" id="texte" rows="10" placeholder="exemple : Nous avons été sévèrement critiqué dans cet article ! C'est INADMISSIBLE !"></textarea>
                                  <p class="catform">
                                    Date de publication (affichée sous le titre) :
                                  </p>
                                  <input class="form-control" name="dates" id="dates" placeholder="exemple : 2015-12-24">
                                  <div class="row">
                                  <div class="col-lg-2 col-md-offset-9 valide">
                                    <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                                  </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h3 class="panel-title">Modifier ou supprimer un article media.</h3>
                        </div>
                        <div class="panel-body apercutable">
                          <p class="catform">
                            Liste des articles media présents dans la base de donnée :
                          </p>
                          <table class='table-striped table-bordered'>
                            <th>
                              <td>
                                Nom
                              </td>
                              <td>
                                Suppr/Modif
                              </td>
                            </th>
                          <?php
                            $conn = new mysqli($serveur, $user, $mdp, $mabase);
                            $sql = 'SELECT * FROM medias';
                            $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'media'");
                            while($row = $result->fetch_assoc()) {
                              $confirmsuppr = '"Confirmer la suppression ?"';
                              $id = $row['id'];
                              $titre = $row['titre'];
                              echo "<tr>
                                      <td>
                                        <p class='line9'>
                                          ".$id."
                                        </p>
                                      </td>
                                      <td>
                                        <p class='line9'>
                                          ".substr($titre,0,25)."
                                        </p>
                                      </td>
                                      <td>
                                        <a href='supprmedia.php?id={$id}' onclick='return confirm(".$confirmsuppr.")'>
                                          <span class='line9b glyphicon glyphicon-remove'>
                                          </span>
                                        </a>
                                        <a href='edit4media.php?id={$id}'>
                                          <span class='line9b glyphicon glyphicon-pencil'>
                                          </span>
                                        </a>
                                      </td>
                                    </tr>";
                            }
                            $conn->close();
                           ?>
                         </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <?php
        if ($confirm != "")
        {
          echo "<script>alert('".$confirm."');</script>" ;
        }
        ?>

</body>
</html>
