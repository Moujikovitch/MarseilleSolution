$("document").ready(function(){

  //script MENU

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
  });


  //script FOOTER

  function placeFooter() {
    var footerpos = window.innerHeight-(parseInt($("#menu").css("height")))-(parseInt($("#footer").css("height")))-60;
    $("#milieu").css("min-height",footerpos);
  };
  
  placeFooter();


  //script COMMU

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

  function modalPlace () {
  	if (document.body.offsetWidth > 600) {
  		this.modalwidth = 600;
  	} else {
  		this.modalwidth = document.body.offsetWidth/100*80;
  	};
  	$("#modal").css("width",this.modalwidth.toString()+"px");
  	$("#modal").css("margin-left", (this.modalwidth/-2).toString()+"px");
  };

  modalPlace();


  //script COMMENT

  function posImgComment() {
  	if (document.body.offsetWidth > 600) {
  		this.widthComp = (document.body.offsetWidth/100*80).toString()+"px";
  	} else {
  		this.widthComp = (document.body.offsetWidth).toString()+"px";
  	};
  	$("#photop0").css("width", this.widthComp);
    if (document.getElementById("photop0")) {
  	   this.margleft = (document.getElementById("photop0").offsetWidth/-2).toString()+"px";
    };
  	$("#photop0").css("margin-left", this.margleft);
  };

  posImgComment();


  //script OnResize(footer+comment+commu)

  var coucou = window.onresize = function() {
			placeFooter();
			modalPlace();
			posImgComment();
	};

});
