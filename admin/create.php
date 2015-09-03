<?php include("menuadminheader.php"); ?>

<?php
include '../../MarseilleSolutionDB/db2.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {

$req = $mabase->prepare("INSERT INTO events(id, photo, titre, texte, dates) VALUES(:id, :photo, :titre, :texte, :dates)");
        $req->execute(array(
          "id" => "",
          "photo" => $_POST['photo'],
          "titre" => $_POST['titre'],
          "texte" => $_POST['texte'],
          "dates" => $_POST['dates'],
                    ));

        header('Location: create.php');
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
                          Ajouter un événement
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Ajouter un événement
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
                                <h3 class="panel-title">Photo</h3>
                            </div>

                    <form method='post' action='create.php'>
                            <textarea name="photo" id="photo" rows="10" cols="80"></textarea>
            <script>
                replace( 'photo' );
            </script>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Titre</h3>
                            </div>

                                <div class="text-right">
                                     <textarea name="titre" id="titre" rows="10" cols="80"></textarea>
            <script>
                replace( 'titre' );
            </script>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Texte</h3>
                            </div>
                   <div class="text-right">

                           <textarea name="texte" id="texte" rows="10" cols="80"></textarea>
            <script>
                replace( 'texte' );
            </script>

                            </div>
                        </div>
                            <textarea name="dates" id="dates" rows="10" cols="80"></textarea>
            <script>
                replace( 'dates' );
            </script>
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
