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

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo = $row['photo'];
         $titre = $row['titre'];
         $texte = $row['texte'];
         $dates = $row['dates'];


        echo "<div class='bgevent'><div class='ficheevent'><div style='background-image:url(".$photo.")' class='fichephotoevent'></div><div class='fichearticleevent'><div class='fichetitreevent'>".$titre."</div><div class='fichetexteevent'>".$texte."</div><div class='fichedate'>".$dates."</div></div></div></div>";

         }
} else {
     echo "0 results";
}

$conn->close();

?>  
	</div>
</div>