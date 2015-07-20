<div id="milieu">
	<div class="cont">
		<img id="photocomu" src="media/commu.jpg"></img>
	<div class="titre"><p class="titrecom">Marseille Solution vu par...</p>
		<?php
			for ($i=0;$i<10;$i++)
			{
				echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><p class='txtfichecom'><strong>J-C. Carteron</strong><br>Fonction</p></div></div>";
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
	<div id="">
		<div class="modalphoto"></div>
		<div class="modaltitre"></div>
		<div class="modaltext"></div>
	</div>
</div>
</div>

<script>
$("body").hide();
var coucou = setInterval(function(){
	if (document.readyState === "complete") {
		$("body").show();
		clearInterval(coucou);
	};
},40);
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