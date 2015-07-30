	<div id="footer">
		<div class="cont">
			<p id="footertxt">
				Powered by SIMPLonMARS | Contact | Suivez nous sur les réseaux sociaux |  <a href="http://localhost/MarseilleSolution/connection/connection.php">Admin</a>
			</p>
		</div>
	</div>
	<script>
	function placeFooter() {
		var footerpos = window.innerHeight-(parseInt($("#menu").css("height")))-(parseInt($("#footer").css("height")))-60;
		$("#milieu").css("min-height",footerpos);
	};
		placeFooter();
	window.onresize = function() {
		try {
			placeFooter();
			posImgComment();
		} catch(e) {

		};
	};
	</script>
</body>
</html>
