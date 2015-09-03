<?php include("menuadminheader.php"); ?>

<?php

include '../../MarseilleSolutionDB/db2.php';

 if(isset($_POST['delete']) && $_POST['delete'] == 'Supprimer'){
    $req = $mabase->prepare("DELETE FROM medias WHERE id= :id");
    $req->execute(array(
        'id' => $_POST['id']
        ));
    header('Location: media.php');
    exit();
  }

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
     $newtitre = $_POST['titre'];
      $newtexte = $_POST['texte'];
       $newdates = $_POST['dates'];
    $sql = 'UPDATE medias SET photo = "'.$newphoto.'","'.$newtitre.'","'.$newtexte.'","'.$newdates.'"';
    if ($conn->query($sql) === TRUE) {
    $confirm= "Modifications effectuées!";
} else {
    $confirm= "Erreur dans la mise à jour " . $conn->error;
}

    $conn->close();
    }

// Recuperation du titre dans la bdd
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Erreur de connection: " . $conn->connect_error);
}

$sql = "SELECT * FROM medias";
//WHERE id=".$_GET['id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $titre = $row['titre'];
         $texte = $row['texte'];
         $dates = $row['dates'];
         $id = $row['id'];

     }
} else {
     echo "0 results";
}

$conn->close();

?>

<?php include("menugaucheadminheader.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Modifier la partie : Medias
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                Medias
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">1- Modifier le texte<br>2- Sauvegarder</h2>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier la photo</h3>

                            </div>
                            <form method='post' action='tables.php'>

                     <textarea name="photo" id="photo" rows="10" cols="80"><?php echo $photo ; ?></textarea>
            <script>
               replace( 'photo' );
            </script>

              <h3 class="panel-title">Modifier le titre</h3>
                    <textarea name="titre" id="titre" rows="10" cols="80"><?php echo $titre ; ?></textarea>
            <script>
                 CKEDITOR.replace( 'titre' );
            </script>

            <h3 class="panel-title">Modifier le texte</h3>
            <textarea name="texte" id="texte" rows="10" cols="80"><?php echo $texte ; ?></textarea>
            <script>
                 CKEDITOR.replace( 'texte' );
            </script>

            <h3 class="panel-title">Modifier la date</h3>
            <textarea name="dates" id="dates" rows="10" cols="80"><?php echo $dates ; ?></textarea>
            <script>
                replace( 'dates' );
            </script>




                        </div>
                    </div>
                </div>
                <!-- /.row -->

                    <input type="hidden" name="id" value="<?php echo $id ; ?>">
                    <input type = 'submit' name='sauvegarder' value="Sauvegarder">
                    <input type="submit"  name="delete" value="Supprimer" class="btn btn-primary">

                </form>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
