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
						<p class="txtmenu">COMMENT ÇA MARCHE ?</p>
					</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page1.php">
				<div id="btm2" class="btnmenu">
					<p class="txtmenu">SOLUTIONS EN COURS</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page2.php">
				<div id="btm3" class="btnmenu">
					<p class="txtmenu">ÉVÉNEMENT</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page3.php">
				<div id="btm4" class="btnmenu">
					<p class="txtmenu">MEDIAS</p>
				</div>
				</a>
			</div>
			<div class="ssbtn">
				<a href="page4.php">
				<div id="btm5" class="btnmenu">
					<p class="txtmenu">COMMUNAUTÉ</p>
				</div>
				</a>
			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
   var $win = $(window);
   var winH = $("#logo").height()+35;
    $(window).scroll(function ()    {
       if ( $(window).scrollTop() > winH)
       {
           $("#menu").addClass("fix");
           $("#menu").removeClass("unfix");
           $("#milieu").css("margin-top","285px");
       }
       else  if ($(window).scrollTop() < winH)
       {
           $("#menu").addClass("unfix");
           $("#menu").removeClass("fix");
           $("#milieu").css("margin-top","40px");
       }
   });</script>
