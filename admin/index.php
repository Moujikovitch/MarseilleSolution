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
    $newtitle = $_POST['title'];
    $newtel = $_POST['tel'];
    $newadresse = $_POST['adresse'];
    $newdescavis = $_POST['descavis'];
    $newdesccontact = $_POST['desccontact'];
    $sql = 'UPDATE reglages SET title = "'.$newtitle.'", tel = "'.$newtel.'", adresse = "'.$newadresse.'", descavis = "'.$newdescavis.'", desccontact = "'.$newdesccontact.'"';
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
         $title = $row['title'];
         $tel = $row['tel'];
         $adresse = $row['adresse'];
         $descavis = $row['descavis'];
        $desccontact = $row['desccontact'];

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
                <h1 class="page-header">
                          Modifier le Slider</h1>

                          <h2 class="page-header">1- Modifier le texte<br>2- Sauvegarder</h2>

               <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier l'image 1 du slider!</h3>

                            </div>
                            <form method='post' action='index.php'>

                     <input name="title" id="title"><?php echo $title ; ?></input>
            <script>
                replace( 'title' );
            </script>





                        </div>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier l'image 2 du slider.</h3>

                            </div>
                            <form method='post' action='index.php'>
                     <input name="tel" id="tel"><?php echo $tel ; ?></input>

            <script>
                replace( 'tel' );
            </script>



                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier l'image 3 du slider</h3>

                            </div>
                            <form method='post' action='index.php'>

 <input name="adresse" id="adresse"><?php echo $adresse ; ?></input>

            <script>
                replace( 'adresse' );
            </script>




                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier le descriptif avis</h3>

                            </div>
                            <form method='post' action='index.php'>

                     <textarea name="descavis" id="descavis" rows="10" cols="80"><?php echo $descavis ; ?></textarea>
            <script>
                CKEDITOR.replace( 'descavis' );
            </script>



                        </div>
                    </div>
                </div>



    <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modifier le descriptif contact</h3>

                            </div>
                            <form method='post' action='index.php'>

                     <textarea name="desccontact" id="desccontact" rows="10" cols="80"><?php echo $desccontact ; ?></textarea>
            <script>
                CKEDITOR.replace( 'desccontact' );
            </script>
<input type = 'submit' name='sauvegarder' value="Sauvegarder">
                </form>




                        </div>
                    </div>
                </div>







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
