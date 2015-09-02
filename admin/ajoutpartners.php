<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon panel administrateur</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <script src="ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
include '../../MarseilleSolutionDB/db2.php';

$error = "";

if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder") {
  
$req = $mabase->prepare("INSERT INTO partners(id, image, nom, fonction, description) VALUES(:id, :image, :nom, :fonction, :description)");
        $req->execute(array(
          "id" => "",
          "image" => $_POST['image'],
          "nom" => $_POST['nom'],
          "fonction" => $_POST['fonction'],
          "description" => $_POST['description'],
                    ));

        header('Location: ajoutpartners.php');
        exit();
    }
?>
<body>

    <div id="wrapper">

        <?php include 'nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
            
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




    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Panel Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav"> 
                <li>
                    <a href="http://localhost/MarseilleSolution"><i class="fa fa-eye"></i> Voir le site</a>
                </li>             
                <li>
                    <a><i class="fa fa-user"></i> <?php echo $_SESSION["name"] ; ?></a>
                </li>  
                <li>
                    <a href="http://localhost/MarseilleSolution/connection/inscription.php"><i class="fa fa-fw fa-edit"></i> Ajouter un compte</a>
                </li>
                <li>
                    <a href="http://localhost/MarseilleSolution/deconnexion.php"><i class="fa fa-power-off"></i> Déconnexion</a>
                </li>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Slider</a>
                    </li>
                    <li >
                        <a href="charts.php"><i class="fa fa-fw fa-file"></i> Communauté</a>
                    </li>
                    <li>
                        <a href="ajoutcommu.php"><i class="fa fa-fw fa-table"></i> Ajouter un membre de la communauté</a>
                    </li>
                    <li class="active">
                        <a href="ajoutpartners.php"><i class="fa fa-fw fa-table"></i> Ajouter un partenaire</a>
                    </li>
                    <li>
                        <a href="ajoutequipes.php"><i class="fa fa-fw fa-table"></i> Ajouter un membre de l'équipe</a>
                    </li>
                    <li>
                        <a href="page0.php"><i class="fa fa-fw fa-file"></i> Comment ça marche?</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Events</a>
                    </li>
                    <li>
                        <a href="create.php"><i class="fa fa-fw fa-table"></i> Ajouter un event</a>
                    </li>
                    <li>
                        <a href="media.php"><i class="fa fa-fw fa-table"></i> Medias</a>
                    </li> 
                    <li>
                        <a href="ajoutmedia.php"><i class="fa fa-fw fa-table"></i> Ajouter un media</a>
                    </li>
                    <li>
                        <a href="ajoutsolu.php"><i class="fa fa-fw fa-table"></i> Ajouter une solution</a>
                    </li>
                   
                                       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Ajouter un partenaire dans la communauté
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                 Ajouter un partenaire
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
                                <h3 class="panel-title">Image</h3>
                            </div>

                    <form method='post' action='ajoutpartners.php'>
                            <textarea name="image" id="image" rows="10" cols="80"></textarea>
            <script>
                replace( 'image' );
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
                CKEDITOR.replace( 'nom' );
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
                CKEDITOR.replace( 'fonction' );
            </script>
                    
                        </div>
                    </div>
                </div>

                <div class="row">   
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Description</h3>
                            </div>
                                <textarea name="description" id="description" rows="10" cols="80"></textarea>
            <script>
                CKEDITOR.replace( 'description' );
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
