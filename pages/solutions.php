<div id="milieu" class="pagesolution">
  <div id="milieu" class="pagecommu">
  	<div class="cont">
  		<div class="titre">
  			<p class="titrecom">
  				LES SOLUTIONS EN COURS
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

  $sql = "SELECT * FROM solutions";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
       // output data of each row
  		$i = 0;
       while($row = $result->fetch_assoc()) {
           $image = $row['image'];
           $logo = $row['logo'];
           $nom = $row['nom'];
           $fonction = $row['fonction'];
           $lien = $row['lien'];
           $infogra = $row['infogra'];
  				$i++;
  				echo "<div class='bgfichecom'>
  							 <div class='fichecom' id='num".$i."'>
                  <div class='bgimgfichesol'>
  								  <div class='logofichecom' style='background-image: url(".$image.")'>
  									</div>
  									<div class='txtfichecom'>
  										<p class='titrefichecom'>
  											".$nom."
  										</p>
  										".$fonction."
  									</div>
                  </div>
  							  <div class='infofichecom'>
  							    <img class='imginfo' src=".$infogra."></img>
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
    <div id="modal" class="modalsolution">
      <div id="crux">
      </div>
      <div id="contmodal">
        <div class="modalinfo">
        </div>
      </div>
    </div>
  </div>

</div>
