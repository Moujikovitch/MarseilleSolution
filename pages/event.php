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
$numodel = 1;
$numevent = 0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $titre = $row['titre'];
         $texte = $row['texte'];
         $dates = $row['dates'];
         if ($numodel == 0){
 					$numodel = 1;
 				 } else {
 					$numodel = 0;
 				 }
         $numevent++;
         echo "<div id='num".$numevent."' class='bgevent model".$numodel."' date=".$dates.">
                <div class='dateevent manudate'>
                  <p>
                  ".$dates."
                  </p>
                </div>
   							<div class='ficheevent'>
   								<div class='fichephotoevent' style='background-image:url(".$photo.")'>
   								</div>
   								<div class='fichearticleevent'>
   									<div class='fichetitreevent'>
   										<p class='titreevent'>".$titre."</p>
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
  <div id="voile">
  </div>
  <div id="modal" class="modalevent">
    <div id="crux">
    </div>
    <div id="contmodal">
      <div class="modalphotoevent">
      </div>
      <div class="modaldateevent">
        Coucou c'est moi
      </div>
      <div class="modaltextevent">
        La vie est géniale même si elle n'a pas de sens.
      </div>
    </div>
  </div>
</div>
