<div id="milieu">
    <div id="cont">
<?php
include '../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
$i = 1;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $titre = $row['titre'];
         $texte = $row['texte'];
         $dates = $row['dates'];
         if ($i == 0){
 					$i = 1;
 				} else {
 					$i = 0;
 				}

         echo "<div class='bgevent model".$i."'>
   							<div class='ficheevent'>
   								<div class='fichephotoevent' style='background-image:url(".$photo.")'>
   								</div>
   								<div class='fichearticleevent'>
   									<div class='fichetitreevent'>
   										<p class='titreevent'>".$titre."</p>
   										<p class='dateevent'>".$dates."</p>
   									</div>
   									<div class='fichetexteevent'>".$texte."</div>
   								</div>
   							</div>
   						</div>";

         }
} else {
     echo "0 results";
}

$conn->close();

?>
	</div>
</div>
