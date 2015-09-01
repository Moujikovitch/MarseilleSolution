$("document").ready(function(){

  var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
      // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
  var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
  var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
      // At least Safari 3+: "[object HTMLElementConstructor]"
  var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
  var isIE = /*@cc_on!@*/false || !!document.documentMode; // At least IE6

  //script INDEX SLIDER
  //animation début slider
  var slideWidth = $("#slideshow").width();
  var slideHeight = slideWidth/2;
  $("#slideshow").css("height","0vw");
  $("#slideshow").animate({
      height:slideHeight
  },400,"swing");

  //animation auto slide
  var etape = 0;
  function slide() {
      etape++;
      if (etape==3){
          etape=0;
      };
      var leftv = etape*-slideWidth;
      $("#sContent").animate({
      left:leftv.toString()+"px",
      }, 2000,"swing");
  };
  var next = setInterval(function(){slide();},5000);

  //click slide manuel
  $(".btnslider").click(function(){
      clearInterval(next);
     etape = parseInt($(this.id).selector.substring(4,5));
     var leftv = etape*-slideWidth;
    $("#sContent").stop();
     $("#sContent").animate({
      left:leftv.toString()+"px",
      }, 200,"swing");
     next = setInterval(function(){slide();},5000);
  });

  //correction taille du slide en resize
  function resizeSlider() {
    slideWidth = $("#slideshow").width();
    slideHeight = slideWidth/2;
    $("#slideshow").css("height","45vw");
  };

  //script MENU

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
    var footerpos = window.innerHeight-(parseInt($("#menu").css("height")))-(parseInt($("#footer").css("height")))-120;
    $("#milieu").css("min-height",footerpos);
  };

  placeFooter();


  //script COMMU

  //hover des images
  $(".fichecom").hover(function(){
    $("#"+this.id.toString()+" .imgfichecom").animate({
      opacity:"0.1"
    },100);
    $("#"+this.id.toString()+" .logofichecom").animate({
      opacity:"0.1"
    },100);
  }, function(){
    $("#"+this.id.toString()+" .imgfichecom").animate({
      opacity:"1"
    },200);
    $("#"+this.id.toString()+" .logofichecom").animate({
      opacity:"1"
    },200);
  });
  //modale
  $("#modal").hide();
  $("#voile").hide();

 var ident;
  function modalOpen() {
    //Ajout du contenu
    //ajouter selection de classe en fonction de l'ID généré par PHP
    $(".modalphoto").css("background-image",$("#"+ident.toString()+" .imgfichecom").css("background-image"));
    $(".modaltitre").html($("#"+ident.toString()+" .txtfichecom").html());
    $(".modaltext").html($("#"+ident.toString()+" .descfichecom").html());
    $(".modalinfo").html($("#"+ident.toString()+" .infofichecom").html());
    //modal pour event
    $(".modalphotoevent").css("background-image",$("#"+ident.toString()+" .fichephotoevent").css("background-image"));
    $(".modaldateevent").html($("#"+ident.toString()+" .dateevent").html());
    $(".modaltitreevent").html($("#"+ident.toString()+" .titreevent").html());
    $(".modaltextevent").html($("#"+ident.toString()+" .hiddentext").html());
    //modal pour media
    if (document.getElementById("modalcontphotomedia")) {
      if (isChrome == true) {
        $(".modalphotomedia").attr("src",$("#"+ident.toString()+" .fichephotomedia").css("background-image").substring($("#"+ident.toString()+" .fichephotomedia").css("background-image").indexOf("h"),$("#num1 .fichephotomedia").css("background-image").lastIndexOf(")")));
      } else {
        $(".modalphotomedia").attr("src",$("#"+ident.toString()+" .fichephotomedia").css("background-image").substring($("#"+ident.toString()+" .fichephotomedia").css("background-image").indexOf("h"),$("#num1 .fichephotomedia").css("background-image").length-2));
      };
      $(".modaldatemedia").html($("#"+ident.toString()+" .dateevent").html());
      $(".modaltitremedia").html($("#"+ident.toString()+" .titreevent").html());
      $(".modaltextmedia").html($("#"+ident.toString()+" .hiddentext").html());
    };
    //animation de l'ouverture
    this.heightSize = $("#modal").height();
    $("#modal").css("margin-top",(this.heightSize/-2).toString()+"px")
    $("#modal").show();
    $("#modal").css("height","0px")
    $("#voile").show();
    $("#modal").animate({
      height:this.heightSize+"px"
    },400,"swing", function(){
      $("#crux").animate({
        top:"-12px",
        right:"-12px"
      },400,"swing");
    });
    /*$("#contmodal").animate({
      height:this.heightSize+"px"
    },400,"swing");*/
  };

  $(".fichecom").click(function(){
    ident = this.id;
    modalOpen();
  });


  $("#crux").click(function(){
  	$("#modal").hide();
  	//$("#modal").css("height","0px");
    $("#crux").css({
      top:"5px",
      right:"5px"
    });
  	$("#voile").hide();
  });

  function modalPlace () {
    if (document.body.offsetWidth > 900) {
      this.modalwidth = 900;
    } else if (document.body.offsetWidth > 600) {
  		this.modalwidth = document.body.offsetWidth/100*80;
  	} else {
  		this.modalwidth = document.body.offsetWidth/100*90;
  	};
  	$("#modal").css("width",this.modalwidth.toString()+"px");
  	$("#modal").css("margin-left", (this.modalwidth/-2).toString()+"px");
    this.modalwidth = document.body.offsetWidth/100*90;
    $(".modalmedia").css("width",this.modalwidth.toString()+"px");
    $(".modalmedia").css("margin-left", (this.modalwidth/-2).toString()+"px");
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

  //script MEDIA/EVENT
  var checktext = [];
  function reduceText () {
    if(document.getElementsByClassName("fichetexteevent")[0]) {
      checktext = document.getElementsByClassName("fichetexteevent");
      for (i = 0; i < $(".fichetexteevent").length; i++) {
        var checklength = false;
        while (checktext[i].offsetHeight > 350) {
          checklength = true;
          checktext[i].innerHTML = checktext[i].innerHTML.substring(0,checktext[i].innerHTML.length-1);
        };
        if (checklength == true) {
          checktext[i].innerHTML += "[...]"
        };
        checktext[i].innerHTML += "<div class='plus' id='num"+(i+1).toString()+"'></div>"
      };
    };
  };
  reduceText();

  if (document.getElementById("avenir")) {
    var date = new Date(); //date actuelle
    var evaldate = new Date(); //date de l'évènement ciblé
    var checkdate = new Date(); //date de l'évènement à comparer pour classement
    var eventlist = document.getElementsByClassName("eventcell"); //liste des div event
    var pastevent = [], futurevent = [], writtepastevent = "", writtefuturevent = ""; //table de classement des events et variable pour écriture du code html
    var eventselect = []; //variable de récupération de l'attribut date pour l'event ciblé
    var eventchecked = []; //variable de récupération pour l'event comparé
    var checkpos = false; //booléen de vérification pour l'ordre des events passés et futurs

    //classement des event en passé et futur
    for ( i = 0 ; i < eventlist.length ; i++ ) {
      //selectionner event et récupérer sa date
      eventselect = eventlist[i].getElementsByClassName("bgevent")[0].getAttribute("date").split("-");
      evaldate.setFullYear(eventselect[0],eventselect[1]-1,eventselect[2]);
      //comparer et classer l'event dans les tables d'event
      if (evaldate.getTime() > date.getTime()) {
        futurevent.push(eventlist[i]);
      } else {
        pastevent.push(eventlist[i]);
      };
    };

    //classement des events futur par ordre chronologique
    for ( i = 0 ; i < futurevent.length ; i++ ) {
      //comparer les dates de l'event selectionné par rapports aux autres
      checkpos = false;
      for (j = 0 ; j < futurevent.length ; j++) {
        eventchecked = futurevent[i].getElementsByClassName("bgevent")[0].getAttribute("date").split("-");
        checkdate.setFullYear(eventchecked[0],eventchecked[1]-1,eventchecked[2]);
        if (evaldate.getTime() < checkdate.getTime()) {
          checkpos = true;
        };
      };
      //si l'event est le premier, l'inscrire dans la variable d'écriture
      if (checkpos == false) {
        writtefuturevent += futurevent[i].innerHTML;
        futurevent.splice(i,1);
        i = 0;
      };
    };
    $("#avenir").html(writtefuturevent);

    //classement des events passé par ordre chronologique
    for ( i = 0 ; i < pastevent.length ; i++ ) {
      //comparer les dates de l'event selectionné par rapports aux autres
      checkpos = false;
      for (j = 0 ; j < pastevent.length ; j++) {
        eventchecked = pastevent[i].getElementsByClassName("bgevent")[0].getAttribute("date").split("-");
        checkdate.setFullYear(eventchecked[0],eventchecked[1]-1,eventchecked[2]);
        if (evaldate.getTime() < checkdate.getTime()) {
          checkpos = true;
        };
      };
      //si l'event est le premier, l'inscrire dans la variable d'écriture
      if (checkpos == false) {
        writtepastevent += pastevent[i].innerHTML;
        pastevent.splice(i,1);
        i = 0;
      };
    };
    $("#passe").html(writtepastevent);
    $("#check").html("");
  };

  $(".plus").click(function(){
    ident = this.id;
    modalOpen();
  });


  //script OnResize

  var adaptResize = window.onresize = function() {
			placeFooter();
			modalPlace();
			posImgComment();
      resizeSlider();
	};

});
