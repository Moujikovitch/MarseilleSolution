<div id="milieu" class="pagecommu">
	<div class="cont">
		<img id="photocomu" src="media/commu.jpg">
		</img>
		<div class="titre">
			<p class="titrecom">
				Marseille Solution vu par...
			</p>
			<div class="flexbox">
				<?php
					for ($i=0;$i<10;$i++)
						{
							echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><div class='txtfichecom'><p class='titrefichecom'>J-C. Carteron</p>Fonction</div></div></div>";
						}
				?>
			</div>
		</div>
	</div>
	<div class="cont">
		<div class="titre">
			<p class="titrecom">
				Nos partenaires :
			</p>
			<div class="flexbox">
				<?php
					for ($i=0;$i<10;$i++)
						{
							echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><p class='txtfichecom'><strong>J-C. Carteron</strong><br>Fonction</p></div></div>";
						}
				?>
			</div>
		</div>
	</div>
	<div class="cont">
		<div class="titre">
			<p class="titrecom">
				L'équipe :
			</p>
			<div class="flexbox">
				<?php
					for ($i=0;$i<10;$i++)
						{
							echo "<div class='bgfichecom'><div class='fichecom'><div class='imgfichecom'></div><p class='txtfichecom'><strong>J-C. Carteron</strong><br>Fonction</p></div></div>";
						}
				?>
			</div>
		</div>
	</div>
	<div id="voile">
	</div>
	<div id="modal">
		<div id="contmodal">
			<div class="modalphoto">
			</div>
			<div class="modaltitre">
				Coucou c'est moi
			</div>
			<div class="modaltext">
				La vie est géniale même si elle n'a pas de sens.
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
				All work and no play makes Jack a dull boy
			</div>
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
	$("#contmodal").animate({
		height:"295px"
	},400,"swing");
	$("#voile").show();
	//ajouter selection de classe en fonction de l'ID généré par PHP
	$(".modalphoto").css("background-image",$(".imgfichecom").css("background-image"));
	$(".modaltitre").innerHTML = ""
	$(".modaltexte").innetHTML = ""
});
$("#modal").click(function(){
	$("#modal").hide();
	$("#modal").css("height","0px");
	$("#voile").hide();
});
</script>
