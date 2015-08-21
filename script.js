$("document").ready(function(){

  //script INDEX SLIDER

  $("#slideshow").css("height","0vh");
  $("#slideshow").animate({
      height:"60vh"
  },400,"swing");
  var etape = 0
  function slide() {
      etape++;
      if (etape==3){
          etape=0;
      };
      var leftv = etape*-120;
      $("#sContent").animate({
      left:leftv.toString()+"vh",
      }, 2000,"swing");
  };
  var next = setInterval(function(){slide();},5000);
  $(".btnslider").click(function(){
      clearInterval(next);
     etape = parseInt($(this.id).selector.substring(4,5));
     var leftv = etape*-120;
    $("#sContent").stop();
     $("#sContent").animate({
      left:leftv.toString()+"vh",
      }, 200,"swing");
     next = setInterval(function(){slide();},5000);
  });


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
  	},400,"swing", function(){
      $("#crux").animate({
        top:"-12px",
        right:"-12px"
      },400,"swing");
    });
  	$("#contmodal").animate({
  		height:"295px"
  	},400,"swing");

  	$("#voile").show();
  	//ajouter selection de classe en fonction de l'ID généré par PHP
  	$(".modalphoto").css("background-image",$("#"+this.id.toString()+" .imgfichecom").css("background-image"));
  	$(".modaltitre").html($("#"+this.id.toString()+" .txtfichecom").html());
  	$(".modaltext").html($("#"+this.id.toString()+" .descfichecom").html());
    $(".modalinfo").html($("#"+this.id.toString()+" .infofichecom").html());
  });

  $("#crux").click(function(){
  	$("#modal").hide();
  	$("#modal").css("height","0px");
    $("#crux").css({
      top:"5px",
      right:"5px"
    });
  	$("#voile").hide();
  });

  function modalPlace () {
  	if (document.body.offsetWidth > 600) {
  		this.modalwidth = 600;
  	} else {
  		this.modalwidth = document.body.offsetWidth/100*90;
  	};
  	$(".modalcommu").css("width",this.modalwidth.toString()+"px");
  	$(".modalcommu").css("margin-left", (this.modalwidth/-2).toString()+"px");
    $(".modalsolution").css("width",(this.modalwidth*3).toString()+"px");
    $(".modalsolution").css("margin-left", (this.modalwidth/-1.5).toString()+"px");
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
    $("#photop1").css("width", this.widthComp);
    $("#textcomment").css("width", this.widthComp);
    if (document.getElementById("photop0")) {
  	   this.margleft = (document.getElementById("photop0").offsetWidth/-2).toString()+"px";
    };
  	$("#photop0").css("margin-left", this.margleft);
    $("#photop1").css("margin-left", this.margleft);
    $("#textcomment").css("margin-left", this.margleft);
  };

  posImgComment();


  //script OnResize(footer+comment+commu)

  var coucou = window.onresize = function() {
			placeFooter();
			modalPlace();
			posImgComment();
	};

});
