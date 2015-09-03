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
    $sql = 'UPDATE ccmarche SET photo = "'.$newphoto.'", photo2 = "'.$newphoto2.'", titre = "'.$newtitre.'"';
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
                          Modifier la page : Comment ça marche ?
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                Comment ça marche ?
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier l'infographie</h3>

                            </div>
                            <form method='post' action='page0.php'>

                     <textarea name="photo2" id="photo2" rows="10" cols="80"><?php echo $photo2 ; ?></textarea>
            <script>
                replace( 'photo2' );
            </script>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier la photo 2</h3>

                            </div>
                            <form method='post' action='page0.php'>

                     <textarea name="photo" id="photo" rows="10" cols="80"><?php echo $photo ; ?></textarea>
            <script>
                replace( 'photo' );
            </script>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier le titre</h3>

                            </div>
                            <form method='post' action='page0.php'>

                     <textarea name="titre" id="titre" rows="10" cols="80"><?php echo $titre ; ?></textarea>
            <script>
                replace( 'titre' );
            </script>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                    <input type = 'submit' name='sauvegarder' value="Sauvegarder">
                </form>
                            <div class="panel-body">

                                <div class="text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
