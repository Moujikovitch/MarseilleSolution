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
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $titre = $row['titre'];
         $texte = $row['texte'];
         $dates = $row['dates'];

			//$photo = array ("media/friche.jpg", "media/silo.jpg", "media/img3.jpg");
				//for ($i = 0 ; $i < 3 ; $i++)
			
				echo "<div class='bgevent model".$i."'><div class='ficheevent'><div class='fichephotoevent' style='background-image:url(".$photo.")'></div><div class='fichearticleevent'><div class='fichetitreevent'><p class='titreevent'>".$titre."</p><p class='dateevent'>".$dates."</p></div><div class='fichetexteevent'>".$texte."</div></div></div></div>";
			}
} else {
     echo "0 results";
}

$conn->close();

?>  
	</div>
</div>