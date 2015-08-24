<div id="milieu" class="pagecommu">
	<div class="cont">
		<img id="photocomu" src="media/commu.jpg">
		</img>
		<div class="titre">
			<p class="titrecom">
				Marseille Solution vu par...
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
									<div class='bgimgfichecom'>
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
				Nos partenaires :
			</p>
			<div class="flexbox">
				<?php
					for ($i=0;$i<10;$i++)
						{
							echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><p class='txtfichecom'><strong>J-C. Carteron</strong><br>Fonction</p></div></div>";
						}
				?>
			</div>
		</div>
	</div>
	<div class="cont">
		<div class="titre">
			<p class="titrecom">
				L'équipe :
			</p>
			<div class="flexbox">
				<?php
					for ($i=0;$i<10;$i++)
						{
							echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><p class='txtfichecom'><strong>J-C. Carteron</strong><br>Fonction</p></div></div>";
						}
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
				Coucou c'est moi
			</div>
			<div class="modaltext">
				La vie est géniale même si elle n'a pas de sens.
			</div>
		</div>
	</div>
</div>
