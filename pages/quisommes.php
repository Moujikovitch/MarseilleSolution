	<div id="milieu">
		<div id="slideshow">
    		<div id="sContent">
    			<div id="imgs0" class="imgslider">
                    <div id="txts0" class="txts">Texte 1</div>
    			</div>
    			<div id="imgs1" class="imgslider">
                    <div id="txts0" class="txts">Texte 2</div>
    			</div>
    			<div id="imgs2" class="imgslider">
                    <div id="txts0" class="txts">Texte 3</div>
    			</div>
    		</div>
		</div>
        <div id="contbtnslider">
            <div id="btns0" class="btnslider">
            </div>
            <div id="btns1" class="btnslider">
            </div>
            <div id="btns2" class="btnslider">
            </div>
        </div>
	</div>
    <script>
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
        })
    </script>
