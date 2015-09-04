<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {

$req = $mabase->prepare("INSERT INTO communautes(id, image, nom, fonction, description) VALUES(:id, :image, :nom, :fonction, :description)");
        $req->execute(array(
          "id" => "",
          "image" => $_POST['image'],
          "nom" => $_POST['nom'],
          "fonction" => $_POST['fonction'],
          "description" => $_POST['description'],
                    ));

        header('Location: ajoutcommu.php');
        exit();
    }

/*if (isset($_POST['sauvegarderpartner']) && $_POST['sauvegarderpartner'] == "Sauvegarder") {

$req = $mabase->prepare("INSERT INTO partners(id, logo, partner, lien) VALUES(:id, :logo, :partner, :lien)");
        $req->execute(array(
          "id" => "",
          "logo" => $_POST['logo'],
          "partner" => $_POST['partner'],
          "lien" => $_POST['lien'],
                    ));

          header('Location: ajoutcommu.php');
          exit();
    }*/

?>

<?php include("menugaucheadminheader.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Page 5 : Communautée
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
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
                              <form method='post' action='ajoutcommu.php'>

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
              </div>
                <!-- Ajouter un partenaire -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Ajouter un partenaire dans la catégorie "Nos partenaires"</h3>
                                            </div>
                                            <div class="panel-body">
                                              <form method='post' action='ajoutcommu.php'>

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
                              </div>
</body>

</html>
