<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db2.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {

$req = $mabase->prepare("INSERT INTO solutions(id, logos, nom, fonction, infogra) VALUES(:id, :logos, :nom, :fonction, :infogra)");
        $req->execute(array(
          "id" => "",
          "logos" => $_POST['logos'],
          "nom" => $_POST['nom'],
          "fonction" => $_POST['fonction'],
          "infogra" => $_POST['infogra'],
                    ));

        header('Location: solu.php');
        exit();
    }
?>
<?php include("menugaucheadminheader.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Ajouter une solution
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
                </div>
                <!-- /.row -->

                <!-- Flot Charts -->

                <!-- /.row -->





                        <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Logo</h3>
                            </div>

                    <form method='post' action='ajoutsolu.php'>
                            <textarea name="logos" id="logos" rows="10" cols="80"></textarea>
            <script>
                replace( 'logos' );
            </script>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nom</h3>
                            </div>
                                <textarea name="nom" id="nom" rows="10" cols="80"></textarea>
            <script>
                replace( 'nom' );
            </script>

                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Fonction</h3>
                            </div>
                                <textarea name="fonction" id="fonction" rows="10" cols="80"></textarea>
            <script>
                replace( 'fonction' );
            </script>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Infographie</h3>
                            </div>
                                <textarea name="infogra" id="infogra" rows="10" cols="80"></textarea>
            <script>
              replace( 'infogra' );
            </script>
                        </div>
                    </div>
                </div>

                <!-- /.row -->


            </div>

                    <input type = 'submit' name='sauvegarder' value="Sauvegarder">
                </form>

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
