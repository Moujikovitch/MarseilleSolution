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
    $newimgslider1 = $_POST['imgslider1'];
    $newimgslider2 = $_POST['imgslider2'];
    $newimgslider3 = $_POST['imgslider3'];
    $newtextfiche1 = $_POST['textfiche1'];
    $newtextfiche2 = $_POST['textfiche2'];
    $newtextfiche3 = $_POST['textfiche3'];
    $newdesccontact = $_POST['desccontact'];
    $sql = 'UPDATE slider SET imgslider1 = "'.$newimgslider1.'", imgslider2 = "'.$newimgslider2.'", imgslider3 = "'.$newimgslider3.'", textfiche1 = "'.$newtextfiche1.'", textfiche2 = "'.$newtextfiche2.'", textfiche3 = "'.$newtextfiche3.'"';
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

$sql = "SELECT * FROM slider";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $imgslider1 = $row['imgslider1'];
         $imgslider2 = $row['imgslider2'];
         $imgslider3 = $row['imgslider3'];
         $textfiche1 = $row['textfiche1'];
         $textfiche2 = $row['textfiche2'];
         $textfiche3 = $row['textfiche3'];

     }
} else {
     echo "0 results";
}

$conn->close();

?>


<body>
  <?php include 'nav.php'; ?>
    <div id="wrapper">
        <form method='post' action='index.php'>
        <div id="page-wrapper">

            <div class="container-fluid">
                <h1 class="page-header">
                  Modifier le Slider
                </h1>
                <p class="page-header">Modifier les images et textes du slider en index. (Pour le moment, modifier un image remplacera l'ancienne dans la base de donnée)</p>

               <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Slide 1</h3>
                            </div>
                      <h5>
                        Image Slide 1 (lien vers l'image):
                      </h5>
                     <input name="imgslider1" id="imgslider1">
                     <input name="textfiche1" id="textfiche1">
                     <?php echo "<img class='apercu' src=".$imgslider1."></img>"; ?>
                     <?php echo "<p class='apercutxt'>".$textfiche1."</p>"; ?>
                        </div>
                    </div>
                </div>
                <div class="row">



                    <input type ='submit' name='sauvegarder' value="Sauvegarder">

                </div>
              </form>


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
