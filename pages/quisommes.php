<?php
include '../MarseilleSolutionDB/db.php';
$error = "";

// Create connection
$conn = new mysqli($serveur, $user, $mdp, $mabase);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM slider";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       $imgslider1 = $row['imgslider1'];
       $imgslider2 = $row['imgslider2'];
       $imgslider3 = $row['imgslider3'];
       $textfiche1 = $row['textfiche1'];
       $textfiche2 = $row['textfiche2'];
       $textfiche3 = $row['textfiche3'];
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
                <?php echo "<div id='imgs0' class='imgslider' style='background-image:url(".$imgslider1.")'>"?>
                    <div id="txts0" class="txts"><?php echo $textfiche1; ?></div>
    			</div>
                <?php echo "<div id='imgs1' class='imgslider' style='background-image:url(".$imgslider2.")'>"?>

                    <div id="txts0" class="txts"><?php echo $textfiche2; ?></div>
    			</div>
                 <?php echo "<div id='imgs2' class='imgslider' style='background-image:url(".$imgslider3.")'>"?>

                    <div id="txts0" class="txts"><?php echo $textfiche3; ?></div>
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
