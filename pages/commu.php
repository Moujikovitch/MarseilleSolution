<div id="milieu" class="pagecommu">
	<div class="cont">
		<img id="photocomu" src="media/commu.jpg">
		</img>
		<div class="titre">
			<p class="titrecom">
				MARSEILLE SOLUTION VU PAR...
			</p>
			<div class="flexbox">
<?php

include '../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM communautes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
		$i = 0;
     while($row = $result->fetch_assoc()) {
         $image = $row['image'];
         $nom = $row['nom'];
         $fonction = $row['fonction'];
         $description = $row['description'];
				$i++;
				echo "<div class='bgfichecom'>
								<div class='fichecom' id='num".$i."'>
									<div class='bgimgfichecom bgtem'>
										<div class='imgfichecom' style='background-image: url(".$image.")'>
										</div>
									</div>
									<div class='txtfichecom'>
										<p class='titrefichecom'>
										".$nom."
										</p>
										".$fonction."
									</div>
									<div class='descfichecom'>
										<p>".$description."</p>
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
	</div>
	<div class="cont">
		<div class="titre">
			<p class="titrecom">
				NOS PARTENAIRES :
			</p>
			<div class="flexbox">
				<?php
				// Create connection
				$conn = new mysqli($serveur, $user, $mdp, $mabase);
				// Check connection
				if ($conn->connect_error) {
				     die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM partners";
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {
				     // output data of each row
				     while($row = $result->fetch_assoc()) {
				         $logo = $row['logo'];
				         $partner = $row['partner'];
				         $lien = $row['lien'];
								$i++;
								echo "<a href=".$lien." target='_BLANK'>
											<div class='bgfichecom'>
												<div class='fichecomlogo' id='num".$i."'>
													<div class='bgimgfichecom bglogo'>
														<div class='imgfichecom' style='background-image: url(".$logo.")'>
														</div>
													</div>
													<div class='txtfichecom'>
														<p class='titrefichecom'>
														".$partner."
														</p>
													</div>
												</div>
											</div>
											</a>";
				}
				} else {
				     echo "0 results";
				}

				$conn->close();

							?>
			</div>
		</div>
	</div>
	<div class="cont">
		<div class="titre">
			<p class="titrecom">
				L'ÉQUIPE :
			</p>
			<div class="flexbox">
				<?php
				// Create connection
				$conn = new mysqli($serveur, $user, $mdp, $mabase);
				// Check connection
				if ($conn->connect_error) {
				     die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM equipes";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				     // output data of each row
				     while($row = $result->fetch_assoc()) {
				         $photo = $row['photo'];
				         $nomeq = $row['nomeq'];
				         $poste = $row['poste'];
				         $biographie = $row['biographie'];
								$i++;
								echo "<div class='bgfichecom'>
												<div class='fichecom' id='num".$i."'>
													<div class='bgimgfichecom bgequip'>
														<div class='imgfichecom' style='background-image: url(".$photo.")'>
														</div>
													</div>
													<div class='txtfichecom'>
														<p class='titrefichecom'>
														".$nomeq."
														</p>
														".$poste."
													</div>
													<div class='descfichecom'>
														<p>".$biographie."</p>
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
	</div>
	<div id="voile">
	</div>
	<div id="modal" class="modalcommu">
		<div id="crux">
		</div>
		<div id="contmodal">
			<div class="modalphoto">
			</div>
			<div class="modaltitre">
			</div>
			<div class="modaltext">
			</div>
		</div>
	</div>
</div>
