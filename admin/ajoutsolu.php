<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db.php';

$error = "";

//SQLI POUR SOLUTIONS
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newlogos = $_POST['logos'];
    $newnom = $_POST['nom'];
    $newfonction = $_POST['fonction'];
    $newinfogra = $_POST['infogra'];
    $sql = "INSERT INTO solutions(id, logos, nom, fonction, infogra) VALUES('','".$newlogo."', '".$newnom."', '".$newfonction."', '".$newinfogra."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout de témoignage validé !";
    } else {
    $confirm= "Erreur dans la mise à jour, contactez nous";
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
                          Page 2 - Solutions
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Ajouter une solution
                            </li>
                        </ol>
                    </div>
                    <p class="page-header">Ajouter une solution à la page "Solutions". Elles apparaitront sous forme de fiches cliquables, qui ouvriront une infographie en fenêtre modale.</p>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter une solution à la page "Solutions".</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='ajoutsolu.php'>
                                <h5>
                                  Logo de la solution (lien vers l'image):
                                </h5>
                                <input name="logos" id="logos" class='form-control' placeholder="exemple : http://www.monhostimage.com/monimage.jpg">
                                <h5>
                                  Nom de la solution:
                                </h5>
                                <input name="nom" id="nom" class='form-control' placeholder="exemple : SIMPLonMARS">
                                <h5>
                                  Sous-titre de la solution:
                                </h5>
                                <input name="fonction" id="fonction" class='form-control' placeholder="exemple : Fabrique de codeur">
                                <h5>
                                  Infographie de la solution(lien vers l'image, apparait via la modal):
                                </h5>
                                <input name="infogra" id="infogra" class='form-control' placeholder="exemple : http://www.monhostimage.com/monimage.jpg">
                                <div class="col-lg-2 col-md-offset-9 valide">
                                  <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier ou supprimer une solution.</h3>
                            </div>
                            <div class="panel-body apercutable">
                              <table class='table-striped table-bordered'>
                                <th>
                                  <td>
                                    Nom
                                  </td>
                                  <td>
                                    Supprimer
                                  </td>
                                </th>
                              <?php
                                $conn = new mysqli($serveur, $user, $mdp, $mabase);
                                $sql = 'SELECT * FROM solutions';
                                $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'solutions'");
                                while($row = $result->fetch_assoc()) {
                                  $id = $row['id'];
                                  $logos = $row['logos'];
                                  $nom = $row['nom'];
                                  $fonction = $row['fonction'];
                                  $infogra = $row['infogra'];
                                  echo "<tr>
                                          <td>
                                            <p class='line9'>
                                              ".$id."
                                            </p>
                                          </td>
                                          <td>
                                            <p class='line9'>
                                              ".substr($nom,0,25)."
                                            </p>
                                          </td>
                                          <td>
                                            <a href='supprsolu.php?id={$id}'>
                                              <span class='line9b glyphicon glyphicon-remove'>
                                              </span>
                                            </a>
                                            <a href='modifsolu.php?id={$id}'>
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



                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
