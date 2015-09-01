<div id="milieu">
    <div id="cont">
    <div class="titrecatevent">
      <p>
        ÉVÉNEMENTS À VENIR
      </p>
    </div>
    <div id="avenir">

    </div>
    <div class="titrecatevent">
      <p>
        ÉVÉNEMENTS PASSÉS
      </p>
    </div>
    <div id="passe">

    </div>
    <div id="check">


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
$faketext = "Se rendre inoffensif tandis qu'on est le plus redoutable, guidé par l'élévation du sentiment, c'est là le moyen pour arriver à la paix véritable qui doit toujours reposer sur une disposition d'esprit paisible, tandis que ce que l'on appelle la paix armée, telle qu'elle est pratiquée maintenant dans tous les pays, répond à un sentiment de discorde, à un manque de confiance en soi et le voisin, et empêche de déposer les armes soit par haine, soit par crainte. Plutôt périr que de haïr et de craindre, et plutôt périr deux fois que de se laisser haïr et craindre.";
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
         echo "<div class='eventcell'>
              <div id='num".$numevent."' class='bgevent model".$numodel."' date=".$dates.">
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
   									<div class='fichetexteevent'>".$faketext."</div>
   								</div>
   							</div>
                 <div class='hiddentext'>
                 ".$faketext."
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
      <div class="modaltitreevent">

      </div>
      <div class="modaltextevent">
        La vie est géniale même si elle n'a pas de sens.
      </div>
    </div>
  </div>
</div>
