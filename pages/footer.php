	<div id="footer">
		<div class="cont">
			<p id="footertxt">
				Powered by SIMPLonMARS | Contact | Suivez nous sur les réseaux sociaux
			</p>
			<a href="https://www.facebook.com/marseille.solutions?fref=ts" target="_blank">
				<div id="fblogo">
				</div>
			</a>
		</div>
	</div>
	<script>
	function placeFooter() {
		var footerpos = window.innerHeight-(parseInt($("#menu").css("height")))-(parseInt($("#footer").css("height")))-60;
		$("#milieu").css("min-height",footerpos);
		console.log("ok");
	};
		placeFooter();
	window.onresize = function() {
		placeFooter();
	};
	</script>
</body>
</html>