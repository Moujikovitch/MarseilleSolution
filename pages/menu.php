<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<div id="menu" class="unfix">
		<div class="cont">
			<a href="index.php">
				<div id="logo">
				</div>
			</a>
			<div id="contbtn">
			<div class="ssbtn">
				<a href="page0.php">
					<div id="btm1" class="btnmenu">
						<p class="txtmenu">Comment ça marche ?</p>
					</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page1.php">
				<div id="btm2" class="btnmenu">
					<p class="txtmenu">Solutions en cours</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page2.php">
				<div id="btm3" class="btnmenu">
					<p class="txtmenu">Événement</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page3.php">
				<div id="btm4" class="btnmenu">
					<p class="txtmenu">Medias</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page4.php">
				<div id="btm5" class="btnmenu">
					<p class="txtmenu">Communauté</p>
				</div>
				</a>
			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
   var $win = $(window);
   var winH = $("#logo").height();
    $(window).scroll(function ()    {    
       if ( $(window).scrollTop() > winH)
       {
           $("#menu").addClass("fix");
           $("#menu").removeClass("unfix");
           $("#milieu").css("margin-top","205px");
       }
       else  if ($(window).scrollTop() < winH)
       {
           $("#menu").addClass("unfix");
           $("#menu").removeClass("fix");
           $("#milieu").css("margin-top","40px");
       }
   });</script>