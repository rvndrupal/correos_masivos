<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>

<head>
<title>99Points : Demos : Create Sexy Animated Tabs Using jQuery and CSS.</title>

<script type="text/javascript" src="jquery.js"></script>
<link href="dependencies/screen.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
// <![CDATA[
$(document).ready(function() { 

	$("#first-tab").addClass('buttonHover');
});

function navigate_tabs(container, tab)
{	
	$(".b").css('display' , 'none');
	$(".c").css('display' , 'none');
	$(".a").css('display' , 'none');
	
	$("#first-tab").removeClass('buttonHover');
	$("#second-tab").removeClass('buttonHover');
	$("#third-tab").removeClass('buttonHover');
	
	$("#"+tab).addClass('buttonHover');
	$("."+container).show('slow');
}

// ]]>
</script>

</head>
<body>


	
	<br clear="all" /><br clear="all" /><br clear="all" />
	
	<div align="center">
		
		<div id="wrap">
		
			<a href="javascript:navigate_tabs('a','first-tab');" class="buttons" id="first-tab">Tab 1</a>  
			<a href="javascript:navigate_tabs('b','second-tab');" class="buttons" id="second-tab">Tab 2</a>
			<a href="javascript:navigate_tabs('c','third-tab');" class="buttons" id="third-tab">Tab 3</a>
			
			<br clear="all" />
			
			<div id="body" align="center">
			
				<div class="a">
				<em>99</em>Points is a place where you can find many useful tutorials over jQuery, PHP, Ajax, Codeigniter and CSS. Its all about PHP web development. This blog is popular for its Facebook style , Youtube style and many other popular tutorialse. Get latest tutorial's source code free and use them to put some stylish effect to your web pages.  <br />  <br /> Thanks!

				</div>
				<div class="b">
				<?php include("actividades.php");?>
				<!--<em>L</em> 
orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. --> 
				</div>
				<div class="c"><em>T</em>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. 


				</div>
			
			</div>	
					
			
			
			
		</div>
		
		
	</div>

<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" />			  

</body>
</html>
