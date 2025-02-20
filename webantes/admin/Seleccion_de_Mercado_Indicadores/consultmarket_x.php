<?
include ("conection/config.php");
include ("menuA.php");

?>


<!--
Select Box Logic 1.0 by Ari N. Karp, August 2008
using mooTools v.1.11

Blog: theuiguy.blogspot.com

You are free to use at will, just at least visit my blog and tell me
1. if you are using it and how (for curiosity sake)
2. some feedback on how you changed, enhanced, or minimized it. 

I believe in sharing code to the community, so if you feel the same, then
please share your changes with me to help make the UI a better place.

For help on this, please visit theuiguy.blogspot.com and I will get back asap.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Custom Select Boxes Sample: Ultimate Multi-Select</title>
	<link rel="stylesheet" type="text/css" href="css/selects.css"/>
	<style>
		body {
			margin:0px;
		}
	</style>
</head>
<body>


<div id="dropdown3Container">
	<div id="dropdown3" class="uiSelectBox" classSetSelect="uiSelectBox,uiSelectBoxToggle,uiSelectBoxChoice,uiSelectBoxStack" isDisabled="false" maxSize=6 toggleStyle="none" info="true" toggleLabel=""><div>
    <div isSelected="false" title="Aardvark" class="uiSelectBoxChoice" id="Aardvark" count="1">Aardvark</div>
    <div isSelected="false" title="Alligator" class="uiSelectBoxChoice" id="Alligator" count="2">Alligator</div>
    <div isSelected="false" title="Bat" class="uiSelectBoxChoice" id="Bat" count="3">Bat</div>
    <div isSelected="false" title="Deer" class="uiSelectBoxChoice" id="Deer" count="4">Deer</div>
    <div isSelected="false" title="Ewe" class="uiSelectBoxChoice" id="Ewe" count="5">Ewe</div>
    <div isSelected="false" title="Frog" class="uiSelectBoxChoice" id="Frog" count="6">Frog</div>
    <div isSelected="false" title="Giraffe" class="uiSelectBoxChoice" id="Giraffe" count="7">Giraffe</div>
    <div isSelected="false" title="Jerboa" class="uiSelectBoxChoice" id="Jerboa" count="8">Jerboa</div>
    <div isSelected="false" title="Hedgehog" class="uiSelectBoxChoice" id="Hedgehog" count="9">Hedgehog</div>
   <div isSelected="false" title="Ibis" class="uiSelectBoxChoice" id="Ibis" count="10">Ibis</div>
   <div isSelected="false" title="Ibis" class="uiSelectBoxChoice" id="Ibis" count="10">Ibis</div>
   <div isSelected="false" title="Ibis" class="uiSelectBoxChoice" id="Ibis" count="10">Ibis</div>
    </div> 
    </div>
</div>

<div style="float:left">&nbsp;</div>
<div id="dropdown2Container">
	<div id="dropdown2" class="uiSelectBox" classSetSelect="uiSelectBox,uiSelectBoxToggle,uiSelectBoxChoice,uiSelectBoxStack" isDisabled="false" maxSize=6 toggleStyle="closed" info="true" toggleLabel=""><div><div isSelected="false" title="Aardvark" class="uiSelectBoxChoice" id="Aardvark" count="1">Aardvark</div><div isSelected="false" title="Alligator" class="uiSelectBoxChoice" id="Alligator" count="2">Alligator</div><div isSelected="false" title="Bat" class="uiSelectBoxChoice" id="Bat" count="3">Bat</div><div isSelected="false" title="Deer" class="uiSelectBoxChoice" id="Deer" count="4">Deer</div><div isSelected="false" title="Ewe" class="uiSelectBoxChoice" id="Ewe" count="5">Ewe</div><div isSelected="false" title="Frog" class="uiSelectBoxChoice" id="Frog" count="6">Frog</div><div isSelected="false" title="Giraffe" class="uiSelectBoxChoice" id="Giraffe" count="7">Giraffe</div><div isSelected="false" title="Jerboa" class="uiSelectBoxChoice" id="Jerboa" count="8">Jerboa</div><div isSelected="false" title="Hedgehog" class="uiSelectBoxChoice" id="Hedgehog" count="9">Hedgehog</div><div isSelected="false" title="Ibis" class="uiSelectBoxChoice" id="Ibis" count="10">Ibis</div></div></div>
</div>
<script type="text/javascript" src="sel/log.js"></script>
<script type="text/javascript" src="sel/mootools111_core.js"></script>
<script type="text/javascript" src="sel/selectboxfactory.js"></script>
<script>
var app = {
	initialize : function(){
		this.images();
		log.start();
	},
	images : function(){ // always load and clone. 
		var i = "";  // put your path here /path/pathsubfolder/
		this.imgs = [i+'clear.gif',i+'eraser.gif']; 
		this.images = new Asset.images(this.imgs);
	}
}
window.addEvent('domready', function(){
	window.removeEvents('keyup');
	app.initialize();	
	var dropdown3 = new selectBoxFactory({
		id : "dropdown3",
		type : 'selectmultiple',
		definition : {
			useSift : true,
			container : "dropdown3Container", // always put the dropdowns container!
			useEraser: true,
			useSelf: false, //if false, then use id from parent container.
			'classSets' : {
				'selectClassSet' : $("dropdown3").getAttribute("classSetSelect")
			}
		}
	});
	var dropdown2 = new selectBoxFactory({
		id : "dropdown2",
		type : 'dropdown',
		definition : {
			useSift : false,
			container : "dropdown2Container", // always put the dropdowns container!
			useEraser: true,
			useSelf: false, //if false, then use id from parent container.
			'classSets' : {
				'selectClassSet' : $("dropdown2").getAttribute("classSetSelect")
			}
		}
	});	
});
</script>
<input type="text" id="focusBox" onFocus="this.blur()">
</body>
</html>
