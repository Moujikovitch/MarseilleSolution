<?php include ("checksession.php");?>
<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db.php';
$error = "";
// mise à jour du titre dans la bdd
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newphoto = $_POST['photo'];
    $newphoto2 = $_POST['photo2'];
    $newtitre = $_POST['titre'];
    $sql = 'UPDATE ccmarche SET photo = "'.$newphoto.'", titre = "'.htmlspecialchars($newtitre,ENT_QUOTES).'", photo2 = "'.$newphoto2.'"';
    if ($conn->query($sql) === TRUE) {
    $confirm= "<script>alert('Modification(s) effectuée(s) !');</script>";
} else {
    $confirm= "<script>alert('Erreur, signalez nous l'erreur en copiant ce texte :".$conn->error."');</script>";
}

    $conn->close();
    }

// Recuperation du titre dans la bdd
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Erreur de connection: " . $conn->connect_error);
}

$sql = "SELECT * FROM ccmarche";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $photo2 = $row['photo2'];
         $titre = $row['titre'];
     }
} else {
     echo "0 results";
}

$conn->close();

?>


<body>
  <?php include("menugaucheadminheader.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Page 1 - Comment ça Marche ?
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                Modifier les deux infographies et le texte de la page 1 - Comment ça marche ?
                            </li>
                        </ol>
                    </div>
                </div>
                <p class="page-header">Modifier les infographie et le textes du slider de la page "Comment ça marche ?". (modifier un élément remplacera l'ancien dans la base de donnée)</br> L'aperçu des images peut être déformé, mais cela n'affectera pas l'apparence finale de l'élément.</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier les éléments</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='admin1comment.php'>
                                <h5>
                                  Infographie 1 (lien vers l'image):
                                </h5>
                                  <?php echo "<input class='form-control' name='photo' id='photo' value='".$photo."'>"; ?>
                                <h5>
                                  Texte central :
                                </h5>
                                  <?php echo "<input class='form-control' name='titre' id='titre' value='".$titre."'>"; ?>
                                <h5>
                                  Infographie 2 (lien vers l'image):
                                </h5>
                                  <?php echo "<input class='form-control' name='photo2' id='photo2' value='".$photo2."'>"; ?>
                              <div class="col-lg-2 col-md-offset-9 valide">
                                    <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                              </div>
                              </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contenu Actuel :</h3>
                            </div>
                            <div class="panel-body">
                              <div class="col-lg-4">
                                <?php echo "<img class='apercu2' src='".$photo."'></img>" ; ?>
                              </div>
                              <div class="col-lg-4">
                                <?php echo $titre ; ?>
                              </div>
                              <div class="col-lg-4">
                                <?php echo "<img class='apercu2' src='".$photo2."'></img>" ; ?>
                              </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>
