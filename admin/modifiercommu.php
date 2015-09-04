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

    $newimage = $_POST['image'];
    $newnom = $_POST['nom'];
    $newfonction = $_POST['fonction'];
    $newdescription = $_POST['description'];
    $sql = 'UPDATE communautes SET image = "'.$newimage.'", nom = "'.$newnom.'", fonction = "'.$newfonction.'", description = "'.$newdescription.'"';
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

$sql = "SELECT * FROM communautes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $image = $row['image'];
         $nom = $row['nom'];
        $fonction = $row['fonction'];
        $description = $row['description'];
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
                          Modifier la partie : Communauté
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solution</a>
                            </li>
                            <li class="active">
                                 Communauté
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier l'image </h3>

                            </div>
                            <form method='post' action='charts.php'>

                     <textarea name="image" id="image" rows="10" cols="80"><?php echo $image ; ?></textarea>
            <script>
                replace( 'image' );
            </script>




                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Morris Charts -->
                <div class="row">

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier Nom/Prénom</h3>
                            </div>


                         <form method='post' action='charts.php'>
                            <textarea name="nom" id="nom" rows="10" cols="80"><?php echo $nom ; ?></textarea>
            <script>
                replace( 'nom' );
            </script>

                        </div>
                    </div>
                </div>
                     <!-- /.row -->

                <!-- Morris Charts -->
                <div class="row">

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier description</h3>
                            </div>


                         <form method='post' action='charts.php'>
                            <textarea name="description" id="description" rows="10" cols="80"><?php echo $description ; ?></textarea>
            <script>
                replace( 'description' );
            </script>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier Fonction</h3>
                            </div>

                                <div class="text-right">
                                    <form method='post' action='charts.php'>
                                     <textarea name="fonction" id="fonction" rows="10" cols="80"><?php echo $fonction ; ?></textarea>
            <script>
                replace( 'fonction' );
            </script>



             </div>


                    </div>
                              <input type = 'submit' name='sauvegarder' value="Sauvegarder">
                </form>
                </div>
                <!-- /.row -->
            </div>

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
