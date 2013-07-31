<?php 

//need to work out what week we're in

// strtotime("2012-08-26 20:26");

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Island hopping</title>
<link rel="stylesheet" href="main.css" type="text/css">
<link rel="stylesheet" href="colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
		<script src="jquery.colorbox.js"></script>
		<script>
		$(document).ready(function(){
			$(".termscont").hide();
			$(".termscont1").hide();
			$(".past").colorbox({inline:true, innerWidth:"520px",scrolling:true});
				
			$('.open').click(function() {
				$(".window", this).animate({left:'-90px'},{
				duration:500,
				complete: function() {
					$.colorbox({inline:true, innerWidth:"520px",scrolling:false, href:"#day1"});
					}});
				});
				
			$(".termsh3").click(function () {
				$(".termscont").slideToggle("slow", function() {
					$.colorbox.resize({})
				});
			});
			$(".termsh4").click(function () {
				$(".termscont1").slideToggle("slow", function() {
					$.colorbox.resize({})
				});
			});
		});
		$(document).bind('cbox_closed', function(){
				$(".termscont").hide();
			});
		$(document).bind('cbox_closed', function(){
				$(".termscont1").hide();
			});
		$(document).ready(function(){
			//Examples of how to assign the Colorbox event to elements
			$(".inline").colorbox({inline:true, width:"50%"});
		});
		</script>
</head>
<body>
    <div class="box">
    	<div class="header">
        	<h1>Html title ready to edit for crm’s lorem ipsum dolor sit</h1>
        </div>
        <div class="map">
        
        	<div class="isl1"><a class="inline cboxElement" href="#il1"><div class="background1 open"></div></a></div>
            <div class="isl2"><div class="background2 close"></div></div>
            <div class="isl3"><div class="background3 close"></div></div>
            <div class="clearfix">&nbsp;</div>
            <div class="isl4"><div class="background4 close"></div></div>
            <div class="isl5"><div class="background5 close"></div></div>
            <div class="isl6"><div class="background6 close"></div></div>
            <div class="clearfix"></div>
            <div class="isl7"><div class="background7 close"></div></div>
            <div class="isl8"><div class="background8 close"></div></div>
            <div class="isl9"><div class="background9 close"></div></div>
            <div class="clearfix"></div>
            
            

			<!-- start island -->
			<div style='display:none'>
			  <div id='il1' style='padding:10px; background:#fff;'>
			    <h1>Casino</h1>
			    <p>Drogi Marszałku, Wysoka Izbo. PKB rośnie. Różnorakie i miejsce ostatnimi czasy.</p>
			    <div class="clear"></div>
			    <a class="offerbutton" href="#"><span>Call to action Text</span></a>
			    <div class="clear"></div>
			    <div class="terms">
			      <div id="accordion">
			        <h3 class="termsh3">&raquo; View Terms &amp; Conditions</h3>
			        <div class="termscont">
			          <ul>
			            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="clear"></div>
			    </p>
			    <h1>Bingo</h1>
			    <p>Drogi Marszałku, Wysoka Izbo. PKB rośnie. Różnorakie i miejsce ostatnimi czasy.</p>
			    <div class="clear"></div>
			    <a class="offerbutton" href="#"><span>Call to action Text</span></a>
			    <div class="clear"></div>
			    <div class="terms">
			      <div id="accordion">
			        <h3 class="termsh4">&raquo; View Terms &amp; Conditions</h3>
			        <div class="termscont1">
			          <ul>
			            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="clear"></div>
			    </p>
			  </div>
			</div>
			<!-- end island -->
			
			
        </div>
    </div>
</body>
</html>
