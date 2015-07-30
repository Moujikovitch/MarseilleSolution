<div id="milieu" class="pagecomment">
		<img id="photop0" src="media/infog2.svg"></img>
	<div id="btncomment">
		<div class="ssbtn">
			<a href="page1.php">
				<div class="btnmenu">
					<p class="txtmenu">Voir les solutions</p>
				</div>
			</a>
		</div>
	</div>
</div>
<script>
function posImgComment() {
	if (document.body.offsetWidth > 600) {
		this.widthComp = (document.body.offsetWidth/100*80).toString()+"px";
	} else {
		this.widthComp = (document.body.offsetWidth).toString()+"px";
	};
	$("#photop0").css("width", this.widthComp);
	this.margleft = (document.getElementById("photop0").offsetWidth/-2).toString()+"px";
	$("#photop0").css("margin-left", this.margleft);
};

posImgComment();
</script>
