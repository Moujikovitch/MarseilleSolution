<?php
include '../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ccmarche";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $titre = $row['titre'];
         $photo = $row['photo'];
         $photo2 = $row['photo2'];

         }
} else {
     echo "0 results";
}

$conn->close();
?>

<div id="milieu" class="pagecomment">
  <img id="photop0" class="imgcomment" src='<?php echo $photo; ?>'></img>
  <div id="textcomment"><p><?php echo $titre; ?></p></div>
	<img id="photop1" class="imgcomment" src='<?php echo $photo2; ?>'></img>
		<div class="ssbtn" id="btncomment">
			<a href="page1.php">
				<div class="btnmenu">
					<p class="txtmenu">VOIR LES SOLUTIONS</p>
				</div>
			</a>
		</div>
</div>
