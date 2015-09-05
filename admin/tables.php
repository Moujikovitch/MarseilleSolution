<?php include("menuadminheader.php"); ?>

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
  <?php include("menugaucheadminheader.php"); ?>


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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier la photo</h3>

                            </div>
                            <form method='post' action='tables.php'>

                     <textarea name="photo" id="photo" rows="10" cols="80"><?php echo $photo ; ?></textarea>


              <h3 class="panel-title">Modifier le titre</h3>
                    <textarea name="titre" id="titre" rows="10" cols="80"><?php echo $titre ; ?></textarea>


            <h3 class="panel-title">Modifier le texte</h3>
            <textarea name="texte" id="texte" rows="10" cols="80"><?php echo $texte ; ?></textarea>


            <h3 class="panel-title">Modifier la date</h3>
            <textarea name="dates" id="dates" rows="10" cols="80"><?php echo $dates ; ?></textarea>





                        </div>
                    </div>
                </div>
                <!-- /.row -->

                    <input type="hidden" name="id" value="<?php echo $id ; ?>">
                    <input type = 'submit' name='sauvegarder' value="Sauvegarder">
                    <input type="submit"  name="delete" value="Supprimer" class="btn btn-primary">

                </form>


        </div>

      </div>


</body>

</html>
