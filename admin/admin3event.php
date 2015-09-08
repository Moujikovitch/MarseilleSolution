<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db.php';

$error = "";

//SQLI POUR EVENTS
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newphoto = $_POST['photo'];
    $newtitre = $_POST['titre'];
    $newtexte = $_POST['texte'];
    $newdates = $_POST['dates'];
    $newdatemanu = $_POST['datemanu'];
    $sql = "INSERT INTO events(id, photo, titre, texte, dates, datemanu) VALUES('','".$newphoto."', '".$newtitre."', '".$newtexte."', '".$newdates."', '".$newdatemanu."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout d'évenement validé !";
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
                          Page 3 - Evénement
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Ajouter article événement
                            </li>
                        </ol>
                        <p class="page-header">Ajouter un événement à la liste, modifier les événements présents. La date numérique sert au classement des événements par date. Le programme ne vérifie pas le contenu du champ, si le format AAAA-MM-JJ n'est pas respecté, il ne sera pas reconnu et produira un bug.<br>La date manuscrite sert, quant à elle, de titre à l'article événement.</p>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter un événement à la liste</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='admin3event.php'>
                                  <p class="catform">
                                    Date manuscrite (apparaitra en haut de l'article) :
                                  </p>
                                  <input class="form-control" name="datemanu" id="datemanu" placeholder="exemple : L'an de grâce douze cent quatre-vingts-quatorze.">
                                  <p class="catform">
                                    Photo (lien vers l'image) :
                                  </p>
                                  <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg">
                                  <p class="catform">
                                    Titre de l'événement :
                                  </p>
                                  <input class="form-control" name="titre" id="titre" placeholder="exemple : Partie de pétanque.">
                                  <p class="catform">
                                    Texte de l'article :
                                  </p>
                                  <textarea class="form-control" type="text" name="texte" id="texte" rows="10" placeholder="exemple : On ignore souvent les bienfaits d'une partie de pétanque, notamment ceux du pastis qui est un élément incontournable de ce rituel."></textarea>
                                  <p class="catform">
                                    Date numérique  : Attention ! format à respecter impérativement : AAAA-MM-JJ :
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
                            <h3 class="panel-title">Modifier ou supprimer un événement.</h3>
                        </div>
                        <div class="panel-body apercutable">
                          <p class="catform">
                            Liste des articles événements présents dans la base de donnée :
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
                            $sql = 'SELECT * FROM events';
                            $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'events'");
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
                                        <a href='supprevent.php?id={$id}' onclick='return confirm(".$confirmsuppr.")'>
                                          <span class='line9b glyphicon glyphicon-remove'>
                                          </span>
                                        </a>
                                        <a href='edit3event.php?id={$id}'>
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
                <!-- /.row -->
            </div>
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
