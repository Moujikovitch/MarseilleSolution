<?php
include '../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reglages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $title = $row['title'];
         $tel = $row['tel'];
         $adresse = $row['adresse'];
         $descpizza = $row['descpizza'];
         $descavis = $row['descavis'];
         $desccontact = $row['desccontact'];
         $descchef = $row['descchef'];
         $descfiche1 = $row['descfiche1'];
         $titrefiche3 = $row['titrefiche3'];
         $descfiche1 = $row['descfiche1'];
         $titrefiche1 = $row['titrefiche1'];
         $descfiche2 = $row['descfiche2'];
         $lienfiche2 = $row['lienfiche2'];
         $titrefiche2 = $row['titrefiche2'];
         }
} else {
     echo "0 results";
}

$conn->close();

/////////////////////////////
//modifier le tel
?>

	<div id="milieu">
		<div id="slideshow">
    		<div id="sContent">
                <?php echo "<div id='imgs0' class='imgslider' style='background-image:url(".$title.")'>"?>
                    <div id="txts0" class="txts"><?php echo $titrefiche1; ?></div>
    			</div>
                <?php echo "<div id='imgs1' class='imgslider' style='background-image:url(".$tel.")'>"?>

                    <div id="txts0" class="txts"><?php echo $titrefiche2; ?></div>
    			</div>
                 <?php echo "<div id='imgs2' class='imgslider' style='background-image:url(".$adresse.")'>"?>

                    <div id="txts0" class="txts"><?php echo $titrefiche3; ?></div>
    			</div>
    		</div>
		</div>
        <div id="contbtnslider">
            <div id="btns0" class="btnslider">
            </div>
            <div id="btns1" class="btnslider">
            </div>
            <div id="btns2" class="btnslider">
            </div>
        </div>
	</div>
