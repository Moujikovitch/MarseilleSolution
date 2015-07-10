<div id="milieu">
	<img id="photocomu" src="commu.jpg"></img>
	<div class="cont">
	<div class="titre"><p class="titrecom">Marseille Solution vu par...</p>
		<div class="fichecom">
			<div class="imgfichecom"></div>
			<p class="txtfichecom"><strong>J-C. Carteron</strong><br>Fonction</p>
		</div>
		<?php
			for ($i=0;$i<10;$i++)
			{
				echo "<div class='fichecom'></div>";
			}
		?>
		</div>
		</div>
	<div class="cont">
	<div class="titre"><p class="titrecom">Nos partenaires :</p>
		<?php
			for ($i=0;$i<10;$i++)
			{
				echo "<div class='fichecom'></div>";
			}
		?>
		</div>
	</div>
	<div class="cont">
	<div class="titre"><p class="titrecom">L'équipe :</p>
		<?php
			for ($i=0;$i<10;$i++)
			{
				echo "<div class='fichecom'></div>";
			}
		?>
		</div>
	</div>
<div id="voile">
</div>
<div id="modal">
</div>
</div>

<script>
$("#modal").hide();
$("#voile").hide();
$(".fichecom").click(function(){
	$("#modal").show();
	$("#modal").animate({
		height:"300px"
	},400,"swing");
	$("#voile").show();
});
$("#modal").click(function(){
	$("#modal").hide();
	$("#modal").css("height","0px");
	$("#voile").hide();
});
</script>