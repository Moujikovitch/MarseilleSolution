<?php
include 'db.php';
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
    <script>
        $("#slideshow").css("height","0vh");
        $("#slideshow").animate({
            height:"60vh"
        },400,"swing");
        var etape = 0
        function slide() {
            etape++;
            if (etape==3){
                etape=0;
            };
            var leftv = etape*-120;
            $("#sContent").animate({
            left:leftv.toString()+"vh",
            }, 2000,"swing");
        };
        var next = setInterval(function(){slide();},5000);
        $(".btnslider").click(function(){
            clearInterval(next);
           etape = parseInt($(this.id).selector.substring(4,5));
           var leftv = etape*-120;
					$("#sContent").stop();
           $("#sContent").animate({
            left:leftv.toString()+"vh",
            }, 200,"swing");
           next = setInterval(function(){slide();},5000);
        })
    </script>
