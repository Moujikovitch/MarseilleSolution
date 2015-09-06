<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db.php';
$error = "";
//SQLI POUR TEMOIGNAGE
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newimage = $_POST['image'];
    $newnom = $_POST['nom'];
    $newfonction = $_POST['fonction'];
    $newdescription = $_POST['description'];
    $sql = "INSERT INTO communautes(id, image, nom, fonction, description) VALUES('','".$newimage."', '".$newnom."', '".$newfonction."', '".$newdescription."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout de témoignage validé !";
    } else {
    $confirm= "Erreur dans la mise à jour, contactez nous";
}

    $conn->close();
}
//SQLI POUR PARTENAIRE
if (isset($_POST['sauvegarderpartner']) && $_POST['sauvegarderpartner'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newlogo = $_POST['logo'];
    $newpartner = $_POST['partner'];
    $newlien = $_POST['lien'];
    $sql = "INSERT INTO partners(id, logo, partner, lien) VALUES('','".$newlogo."', '".$newpartner."', '".$newlien."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout de partenaire validé !";
    } else {
    $confirm= "Erreur dans la mise à jour, contactez nous.";
}

    $conn->close();
}

//SQLI POUR EQUIPIER
if (isset($_POST['sauvegarderequip']) && $_POST['sauvegarderequip'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newphoto = $_POST['photo'];
    $newnomeq = $_POST['nomeq'];
    $newposte = $_POST['poste'];
    $newbiographie = $_POST['biographie'];
    $sql = "INSERT INTO equipes(id, photo, nomeq, poste, biographie) VALUES('','".$newphoto."', '".$newnomeq."', '".$newposte."', '".$newbiographie."')";

    if ($conn->query($sql) === TRUE) {
    $confirm= "Ajout d'équipier validé !";
    } else {
    $confirm= "Erreur dans la mise à jour, contactez nous.";
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
                          Page 5 - Communautée
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin5commu.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Ajouter un témoignagne, partenaire, membre d'équipe
                            </li>
                        </ol>
                    </div>
                </div>
<!-- Ajouter un témoignage -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter une personne dans la catégorie "Marseille Solutions vu par"</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='admin5commu.php'>

                                <p class="catform">
                                  Image de portrait (lien vers l'image) :
                                </p>
                                <input class="form-control" name="image" id="image" placeholder="exemple : http://monhostimage.com/monimage.jpg">

                                <p class="catform">
                                  Nom :
                                </p>
                                <input class="form-control" name="nom" id="nom" placeholder="exemple : Modeste Petrovitch Moussorgsky">

                                <p class="catform">
                                  Fonction/profession/titre :
                                </p>
                                <input class="form-control" name="fonction" id="fonction" placeholder="exemple : Dresseur de chameaux">

                                <p class="catform">
                                  Témoignage :
                                </p>
                                <textarea class="form-control" type="text" name="description" id="description" rows="10" placeholder="exemple : J'ai toujours su que Marseille Solutions sauverait la citée phocéenne de ses plus grands maux et je suis persuadé que la terre et bientôt la galaxie entière leur seront accorderont la reconnaissance qu'ils méritent."></textarea>
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
                            <h3 class="panel-title">Modifier ou supprimer un témoignage.</h3>
                        </div>
                        <div class="panel-body apercutable">
                          <p class="catform">
                            Liste des témoignages présents dans la base de donnée :
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
                            $sql = 'SELECT * FROM communautes';
                            $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'communautes'");
                            while($row = $result->fetch_assoc()) {
                              $confirmsuppr = '"Confirmer la suppression ?"';
                              $id = $row['id'];
                              $nom = $row['nom'];
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
                                        <a href='supprtem.php?id={$id}' onclick='return confirm(".$confirmsuppr.")'>
                                          <span class='line9b glyphicon glyphicon-remove'>
                                          </span>
                                        </a>
                                        <a href='edit5commua.php?id={$id}'>
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
                <!-- Ajouter un partenaire -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Ajouter un partenaire dans la catégorie "Nos partenaires"</h3>
                                            </div>
                                            <div class="panel-body">
                                              <form method='post' action='admin5commu.php'>

                                                <p class="catform">
                                                  Logo du partenaire (lien vers l'image) :
                                                </p>
                                                <input class="form-control" name="logo" id="logo" placeholder="exemple : http://monhostimage.com/monimage.jpg">

                                                <p class="catform">
                                                  Nom du partenaire :
                                                </p>
                                                <input class="form-control" name="partner" id="partner" placeholder="exemple : Modeste Petrovitch Moussorgsky">

                                                <p class="catform">
                                                  Lien vers le site :
                                                </p>
                                                <input class="form-control" name="lien" id="lien" placeholder="exemple : http://www.mon-partenaire.com">
                                                <div class="row">
                                                <div class="col-lg-2 col-md-offset-9 valide">
                                                  <input class='btn btn-warning' type ='submit' name='sauvegarderpartner' value="Sauvegarder">
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Modifier ou supprimer un partenaire.</h3>
                                        </div>
                                        <div class="panel-body apercutable">
                                          <p class="catform">
                                            Liste des partenaire présents dans la base de donnée :
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
                                            $sql = 'SELECT * FROM partners';
                                            $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'partners'");
                                            while($row = $result->fetch_assoc()) {
                                              $confirmsuppr = '"Confirmer la suppression ?"';
                                              $id = $row['id'];
                                              $partner = $row['partner'];
                                              echo "<tr>
                                                      <td>
                                                        <p class='line9'>
                                                          ".$id."
                                                        </p>
                                                      </td>
                                                      <td>
                                                        <p class='line9'>
                                                          ".substr($partner,0,25)."
                                                        </p>
                                                      </td>
                                                      <td>
                                                        <a href='supprpart.php?id={$id}' onclick='return confirm(".$confirmsuppr.")'>
                                                          <span class='line9b glyphicon glyphicon-remove'>
                                                          </span>
                                                        </a>
                                                        <a href='edit5commub.php?id={$id}'>
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
                              <!-- Ajouter un équipier -->
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <div class="panel panel-green">
                                                          <div class="panel-heading">
                                                              <h3 class="panel-title">Ajouter une personne dans la catégorie "L'équipe"</h3>
                                                          </div>
                                                          <div class="panel-body">
                                                            <form method='post' action='admin5commu.php'>

                                                              <p class="catform">
                                                                Image de portrait (lien vers l'image) :
                                                              </p>
                                                              <input class="form-control" name="photo" id="photo" placeholder="exemple : http://monhostimage.com/monimage.jpg">

                                                              <p class="catform">
                                                                Nom de l'équipier :
                                                              </p>
                                                              <input class="form-control" name="nomeq" id="nomeq" placeholder="exemple : Gaston Lagaffe">

                                                              <p class="catform">
                                                                Poste chez Marseille Solutions :
                                                              </p>
                                                              <input class="form-control" name="poste" id="poste" placeholder="exemple : Dresseur de mouette">

                                                              <p class="catform">
                                                                Biographie :
                                                              </p>
                                                              <textarea class="form-control" type="text" name="biographie" id="biographie" rows="10" placeholder="exemple : Dans ma petite enfance, ne pas avoir mon goûté à 16h pile était une immense frustration, alors j'ai decidé de me mettre à la gouache pour me calmer et c'est comme ça que je suis devenu graphiste."></textarea>
                                                              <div class="row">
                                                              <div class="col-lg-2 col-md-offset-9 valide">
                                                                <input class='btn btn-warning' type ='submit' name='sauvegarderequip' value="Sauvegarder">
                                                              </div>
                                                            </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="panel panel-green">
                                                      <div class="panel-heading">
                                                          <h3 class="panel-title">Modifier ou supprimer un équipier.</h3>
                                                      </div>
                                                      <div class="panel-body apercutable">
                                                        <p class="catform">
                                                          Liste des équipiers présents dans la base de donnée :
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
                                                          $sql = 'SELECT * FROM equipes';
                                                          $result = $conn->query($sql) or die("Erreur SQL dans la récupération des données depuis la table 'equipes'");
                                                          while($row = $result->fetch_assoc()) {
                                                            $confirmsuppr = '"Confirmer la suppression ?"';
                                                            $id = $row['id'];
                                                            $nomeq = $row['nomeq'];
                                                            echo "<tr>
                                                                    <td>
                                                                      <p class='line9'>
                                                                        ".$id."
                                                                      </p>
                                                                    </td>
                                                                    <td>
                                                                      <p class='line9'>
                                                                        ".substr($nomeq,0,25)."
                                                                      </p>
                                                                    </td>
                                                                    <td>
                                                                      <a href='suppreq.php?id={$id}' onclick='return confirm(".$confirmsuppr.")'>
                                                                        <span class='line9b glyphicon glyphicon-remove'>
                                                                        </span>
                                                                      </a>
                                                                      <a href='edit5commuc.php?id={$id}'>
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
                              <?php
                              if ($confirm != "")
                              {
                                echo "<script>alert('".$confirm."');</script>" ;
                              }
                               ?>
</body>

</html>
