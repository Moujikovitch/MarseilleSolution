<div id="milieu">
		<img id="photop0" src="media/comment.png"></img>
	<div id="btncomment">
		<div class="ssbtn">
			<a href="page1.php">
				<div id="btm2" class="btnmenu">
					<p class="txtmenu">Voir les solutions</p>
				</div>
			</a>
		</div>
	</div>
</div>
<script>
	function posImgComment() {
		this.widthComp = (document.body.offsetWidth/100*80).toString()+"px";
		$("#photop0").css("width", this.widthComp);
		this.margleft = (document.getElementById("photop0").offsetWidth/-2).toString()+"px";
		$("#photop0").css("margin-left", this.margleft);
		console.log("lol");
	};
	posImgComment();
	window.onresize = function() {
		posImgComment();
	};
</script>