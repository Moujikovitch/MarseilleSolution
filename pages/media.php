<div id="milieu" class="pagemedia">
	<div id="cont">
		<?php
		$photo = array ("media/friche.jpg", "media/silo.jpg", "media/img3.jpg");
			for ($i = 0 ; $i < 3 ; $i++)
			{
				echo "<div class='bgevent'><div class='ficheevent'><div class='fichephotoevent' style='background-image:url(".$photo[$i].")'></div><div class='fichearticleevent'><div class='fichetitreevent'><p class='titreevent'>Titre de l'event</p><p class='dateevent'>10/05/2015</p></div><div class='fichetexteevent'>Est ce vraiment la \"vérité\" que la science définit peu à peu ? N'est ce pas plutôt l'homme qui se définit, qui tire de soi une foule d'erreur d'optiques et de vues bornées; à moins qu'il ne les déduise l'une de l'autre, jusqu'à ce que l'ardoise en soit couverte et que l'homme se trouve confirmé dans toutes ses relations avec les autres forces ? La science ne fait que continuer le processus infini qui a commencé avec le premier des êtres organiques, elle est une puissance créatrice [...] et non pas le contrairee [...] comme le croient les esprits mal informés...</div></div></div></div>";
			}
		?>
	</div>
</div>
