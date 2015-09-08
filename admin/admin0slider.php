<?php include ("checksession.php");?>
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
      $sql = 'UPDATE slider SET imgslider1 = "'.htmlspecialchars($newimgslider1,ENT_QUOTES).'", imgslider2 = "'.htmlspecialchars($newimgslider2,ENT_QUOTES).'", imgslider3 = "'.htmlspecialchars($newimgslider3,ENT_QUOTES).'", textfiche1 = "'.htmlspecialchars($newtextfiche1,ENT_QUOTES).'", textfiche2 = "'.htmlspecialchars($newtextfiche2,ENT_QUOTES).'", textfiche3 = "'.htmlspecialchars($newtextfiche3,ENT_QUOTES).'"';
    if ($conn->query($sql) === TRUE) {
      $confirm= "<script>alert('Modification(s) effectuée(s) !');</script>";
    } else {
      $confirm= "<script>alert('Erreur, contactez nous.');</script>";
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

  <?php include("menugaucheadminheader.php"); ?>


        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header">
                  Index - Modifier le Slider
                </h1>
                <p class="page-header">Modifier les images et textes du slider en index. (Pour le moment, modifier un image remplacera l'ancienne dans la base de donnée)</p>
                <form method='post' action='admin0slider.php'>
               <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Slide 1</h3>
                            </div>
                            <div class="panel-body">
                              <h5>
                                Image Slide 1 (lien vers l'image):
                              </h5>
                                <?php echo "<input type='text' class='form-control' name='imgslider1' id='imgslider1' value='".$imgslider1."'>"; ?>
                              <h5>
                                Texte Slide 1 :
                              </h5>
                              <?php echo "<input type='text' class='form-control' name='textfiche1' id='textfiche1' value='".$textfiche1."'>"; ?>
                              <div class="row">
                                <div class="col-lg-2 col-md-offset-9 valide">
                                  <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contenu actuel :</h3>
                            </div>
                            <div class="panel-body">
                              <div class="col-lg-6">
                                <?php echo "<img class='apercu' src=".$imgslider1."></img>"; ?>
                              </div>
                              <div class="col-lg-6">
                                <?php echo "<p class='apercutxt'>".$textfiche1."</p>"; ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-lg-6">
                         <div class="panel panel-primary">
                             <div class="panel-heading">
                                 <h3 class="panel-title">Slide 2</h3>
                             </div>
                             <div class="panel-body">
                               <h5>
                                 Image Slide 2 (lien vers l'image):
                               </h5>
                                <?php echo "<input class='form-control' name='imgslider2' id='imgslider2' value='".$imgslider2."'>"; ?>
                               <h5>
                                 Texte Slide 2 :
                               </h5>
                               <?php echo "<input class='form-control' name='textfiche2' id='textfiche2' value='".$textfiche2."'>"; ?>
                               <div class="row">
                                 <div class="col-lg-2 col-md-offset-9 valide">
                                   <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                                 </div>
                               </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="panel panel-primary">
                             <div class="panel-heading">
                                 <h3 class="panel-title">Contenu actuel :</h3>
                             </div>
                             <div class="panel-body">
                               <div class="col-lg-6">
                                 <?php echo "<img class='apercu' src=".$imgslider2."></img>"; ?>
                               </div>
                               <div class="col-lg-6">
                                 <?php echo "<p class='apercutxt'>".$textfiche2."</p>"; ?>
                               </div>
                             </div>
                         </div>
                     </div>
                 </div>


                 <div class="row">
                      <div class="col-lg-6">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Slide 3</h3>
                              </div>
                              <div class="panel-body">
                                <h5>
                                  Image Slide 3 (lien vers l'image):
                                </h5>
                                <?php echo "<input class='form-control' name='imgslider3' id='imgslider3' value='".$imgslider3."'>"; ?>
                                <h5>
                                  Texte Slide 3 :
                                </h5>
                                <?php echo "<input class='form-control' name='textfiche3' id='textfiche3' value='".$textfiche3."'>"; ?>
                                <div class="row">
                                  <div class="col-lg-2 col-md-offset-9 valide">
                                    <input class='btn btn-warning' type ='submit' name='sauvegarder' value="Sauvegarder">
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Contenu actuel :</h3>
                              </div>
                              <div class="panel-body">
                                <div class="col-lg-6">
                                  <?php echo "<img class='apercu' src=".$imgslider3."></img>"; ?>
                                </div>
                                <div class="col-lg-6">
                                  <?php echo "<p class='apercutxt'>".$textfiche3."</p>"; ?>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>


                <h1><?php if(isset($confirm)){
                    echo $confirm ;
                } ?></h1>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


</body>
</html>
