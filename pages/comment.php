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
         $photo = $row['photo'];
         
         }
} else {
     echo "0 results";
}

$conn->close();
?>


<div id="milieu" class="pagecomment">
		<img id="photop0" src='<?php echo $photo; ?>'></img>
	<div>
		<div class="ssbtn" id="btncomment">
			<a href="page1.php">
				<div class="btnmenu">
					<p class="txtmenu">VOIR LES SOLUTIONS</p>
				</div>
			</a>
		</div>
	</div>
</div>
