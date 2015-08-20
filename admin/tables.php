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

include '../../MarseilleSolutionDB/db2.php';

 if(isset($_POST['delete']) && $_POST['delete'] == 'Supprimer'){
    $req = $mabase->prepare("DELETE FROM events WHERE id= :id");
    $req->execute(array(
        'id' => $_POST['id']
        ));
    header('Location: tables.php');
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
    $sql = 'UPDATE events SET photo = "'.$newphoto.'","'.$newtitre.'","'.$newtexte.'","'.$newdates.'"';
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

$sql = "SELECT * FROM events";
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

</body>

</html>

<body>

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
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-file"></i> Chef</a>
                    </li>
                     <li>
                        <a href="page0.php"><i class="fa fa-fw fa-file"></i> Comment ça marche?</a>
                    </li>
                    <li class="active">
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
                           Modifier la partie : Evénements
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Marseille Solutions</a>
                            </li>
                            <li class="active">
                                Events
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
