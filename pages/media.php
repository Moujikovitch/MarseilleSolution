<div id="milieu" class="pagemedia">
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

$sql = "SELECT * FROM medias";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
		$i = 0;
		$nummedia = 0;
		$faketext = "Se rendre inoffensif tandis qu'on est le plus redoutable, guidé par l'élévation du sentiment, c'est là le moyen pour arriver à la paix véritable qui doit toujours reposer sur une disposition d'esprit paisible, tandis que ce que l'on appelle la paix armée, telle qu'elle est pratiquée maintenant dans tous les pays, répond à un sentiment de discorde, à un manque de confiance en soi et le voisin, et empêche de déposer les armes soit par haine, soit par crainte. Plutôt périr que de haïr et de craindre, et plutôt périr deux fois que de se laisser haïr et craindre.";
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
				$nummedia++;
			echo "<div id='num".$nummedia."' class='bgevent model".$i."'>
							<div class='ficheevent'>
								<div class='fichephotomedia' style='background-image:url(".$photo.")'>
								</div>
								<div class='fichearticleevent'>
									<div class='fichetitreevent'>
										<p class='titreevent'>".$titre."</p>
										<p class='dateevent'>".$dates."</p>
									</div>
									<div class='fichetexteevent'>".$faketext."</div>
								</div>
							</div>
							<div class='hiddentext'>
							".$faketext."
							</div>
						</div>";

		}
	} else {
		echo "Aucun résultat";
	}


$conn->close();

		?>
	</div>
	<div id="voile">
	</div>
	<div id="modal" class="modalmedia">
		<div id="crux">
		</div>
		<div id="contmodal">
			<div id="modalcontphotomedia">
				<img class="modalphotomedia" src="">
				</img>
			</div>
			<div class="modaldatemedia">
        Coucou c'est moi
      </div>
      <div class="modaltitremedia">

      </div>
      <div class="modaltextmedia">
        La vie est géniale même si elle n'a pas de sens.
      </div>
		</div>
	</div>
</div>
