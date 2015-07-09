<div id="milieu">
	<div class="cont">
	<div class="titre">Marseille Solution vu par...</div>
		<div class="fichecom">
			<div class="imgfichecom"></div>
			<p class="txtfichecom"><strong>J-C. Carteron</strong><br>Fonction</p>
		</div>
		<div class="fichecom">
		</div>
		<div class="fichecom">
		</div>
	</div>
	<div class="cont">
	<div class="titre">Nos partenaires :</div>
		<div class="fichecom">
		</div>
		<div class="fichecom">
		</div>
		<div class="fichecom">
		</div>
	</div>
	<div class="cont">
	<div class="titre">L'équipe :</div>
		<div class="fichecom">
		</div>
		<div class="fichecom">
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