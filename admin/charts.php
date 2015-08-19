<!DOCTYPE html>
<html lang="en">

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
include '../../MarseilleSolutionDB/db.php';
$error = "";
// mise à jour du titre dans la bdd
if (isset($_POST['sauvegarder']) && $_POST['sauvegarder'] == "Sauvegarder"){
    $conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $newdescchef = $_POST['descchef'];
    $newtitrefiche1 = $_POST['titrefiche1'];
    $newtitrefiche2 = $_POST['titrefiche2'];
    $newtitrefiche3 = $_POST['titrefiche3'];
    $newlienfiche2 = $_POST['lienfiche2'];
    $newdescfiche1 = $_POST['descfiche1'];
    $newdescfiche2 = $_POST['descfiche2'];
    $sql = 'UPDATE reglages SET descchef = "'.$newdescchef.'", titrefiche1 = "'.$newtitrefiche1.'", titrefiche2 = "'.$newtitrefiche2.'", titrefiche3 = "'.$newtitrefiche3.'", lienfiche2 = "'.$newlienfiche2.'", descfiche1 = "'.$newdescfiche1.'", descfiche2 = "'.$newdescfiche2.'"';
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

$sql = "SELECT * FROM reglages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $descchef = $row['descchef'];
         $titrefiche1 = $row['titrefiche1'];
        $titrefiche2 = $row['titrefiche2'];
        $titrefiche3 = $row['titrefiche3'];
        $lienfiche2 = $row['lienfiche2'];
        $descfiche1 = $row['descfiche1'];
        $descfiche2 = $row['descfiche2'];
     }
} else {
     echo "0 results";
}

$conn->close();

?>  


<body>

    <div id="wrapper">

        <?php include 'nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                             
                <h1><?php if(isset($confirm)){
                    echo $confirm ;
                } ?></h1>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $_SESSION['name'] ; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $_SESSION["name"] ; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $_SESSION["name"] ; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["name"] ; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://localhost/pizzatomic/admin/profil.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                        </li>
                        <li>
                            <a href="http://localhost/pizzatomic/connection/inscription.php"><i class="fa fa-fw fa-edit"></i> Ajouter un compte</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Slider</a>
                    </li>
                    <li class="active">
                        <a href="charts.php"><i class="fa fa-fw fa-file"></i>Chef</a>
                    </li>
                    <li>
                        <a href="page0.php"><i class="fa fa-fw fa-file"></i>Comment ça marche?</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Events</a>
                    </li>
                    <li>
                        <a href="create.php"><i class="fa fa-fw fa-table"></i> Ajouter un event</a>
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
                          Modifier la partie : Le Chef
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Pizzatomic</a>
                            </li>
                            <li class="active">
                                 Chef
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
                                <h3 class="panel-title">Modifier le descriptif Le Chef!</h3>

                            </div>
                            <form method='post' action='charts.php'>
                    
                     <textarea name="descchef" id="descchef" rows="10" cols="80"><?php echo $descchef ; ?></textarea>
            <script>
                CKEDITOR.replace( 'descchef' );
            </script>
                    
             
                
   
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Morris Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Modifier la fiche 1</h2>
                        </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Titre de la fiche 1</h3>
                            </div>

                    
                         <form method='post' action='charts.php'>
                            <textarea name="titrefiche1" id="titrefiche1" rows="10" cols="80"><?php echo $titrefiche1 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'titrefiche1' );
            </script>
                    
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Titre de la fiche 3</h3>
                            </div>
                            
                                <div class="text-right">
                                    <form method='post' action='charts.php'>
                                     <textarea name="titrefiche3" id="titrefiche3" rows="10" cols="80"><?php echo $titrefiche3 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'titrefiche3' );
            </script>
                         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Descriptif de la fiche 1</h3>
                            </div>
                   <div class="text-right">
                    <form method='post' action='charts.php'>
                           <textarea name="descfiche1" id="descfiche1" rows="10" cols="80"><?php echo $descfiche1 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'descfiche1' );
            </script>
                    
                            </div>
                        </div>
                            
                    </div>
                     <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Modifier la fiche 2</h2>
                        </div>
                </div>
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Titre de la fiche 2</h3>
                            </div>
                            <form method='post' action='index.php'>
                            <textarea name="titrefiche2" id="titrefiche2" rows="10" cols="80"><?php echo $titrefiche2 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'titrefiche2' );
            </script>
                    
                            <div class="panel-body">
                                
                                <div class="text-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Lien de la fiche 2</h3>
                            </div>
                            <form method='post' action='index.php'>
                            <textarea name="lienfiche2" id="lienfiche2" rows="10" cols="80"><?php echo $lienfiche2 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'lienfiche2' );
            </script>
                    
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                   </div>
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Descriptif de la fiche 2</h3>
                            </div>
                            <form method='post' action='index.php'>
                            <textarea name="descfiche2" id="descfiche2" rows="10" cols="80"><?php echo $descfiche2 ; ?></textarea>
            <script>
                CKEDITOR.replace( 'descfiche2' );
            </script>
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
