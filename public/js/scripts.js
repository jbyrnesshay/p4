$(document).ready(function() {
	headsource = '<img id="ctrheadimage" src="/images/frames_pexels_107911.jpg">';
	mainstylesheet = document.styleSheets[2];

 //$('#pg1wishtlistcontainer').css("display", "none");
  //$('#pg1wishtlistcontainer').css("display", "none");

	 	 
	//flash messages
	if ($('#flash_message').html()) {
		 $('#flash_message').fadeOut(3000, function(){
		 	$('#headimage').html(headsource);
		});
	}
	//
	//if frame select change 
	$('#frameselect').change(function(){
		color = $(this).val();
		$('#frame').css('borderColor',color );
	});
	//
	//if matselect change
	$('#matselect').change(function(){
		matcolor = $(this).val();
		/*reminder use .cssText; to see contents */
		bwidth = '.25em';

		if (matcolor == 'none') {
			firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0;
		}
		else {
			if ($('#matthick').val()>.25) {
			bwidth= $('#matthick').val();
			}
			mainstylesheet.cssRules[0].style.borderWidth=bwidth;
			mainstylesheet.cssRules[0].style.borderColor=matcolor;
		}
	});
	//
	//if framethickness slider changed
	$('#framethick').on("input",function(){
		fwidth = $('#framethick').val();
		mainstylesheet.cssRules[1].style.borderWidth=fwidth+'em';
	});
	//
	//if matthickness slider changed
	$('#matthick').on("input", function(){
		mwidth= $(this).val();
		matcolor= $('#matselect').val();
		if (matcolor == 'none') {
			//$('#matselect').value('white') ;
			document.getElementById('matselect').value = 'white';
			mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
			//var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0+'em';

		}
		else {
		mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
		mainstylesheet.cssRules[0].style.borderColor=matcolor;
	}
	});
	//
 

	 $('#options').click(function() {
	 	 
	 	// alert('test');
	  
	 	$('.edit').toggleClass("visiblebutton");
	 	$('.details').toggleClass("visiblebutton");
	 	$('.delete').toggleClass("visiblebutton"); 
	 });
	
   

  $('#openlist').click(function(){
  	//alert('ah');
   
  	$('#pg1rightcontent').toggle();
  	$('#pg1wishlistcontainer').toggle();
  	});
 
 	 //opensearch() { 
 	 /*
 	 $('#opensearch').click(function(){

 	 	if ($('#pg1rightcontent').css('display') == 'none'){
 	 	thingis = $('#pg1wishlistcontainer');

 	 }
 	 else {
 	 	thingis = document.getElementById('pg1rightcontent');}
 	 //$('#pg1wishlistcontainer');

 	 thingis.css('display','none');
 	 searchstate = $('#pg1search');
 	 searchstate.toggle();
 	 //$('#pg1search').toggle();
 	});
 	 //}

 	//openlist();
 	//opensearch();
 	 //alert(thingis);
 */

 $('#category').change(function() {
 	//alert('kl');
 	//category= $('#categories').val();
 		//alert(category);
 	//id='#'+category;
 	//$(id).prop('selected', 'true');
 	$value=$('#category').val();
 	//document.getElementById('#categoryform').submit();
 	document.forms["categoryform"].submit();
 	//$("categoryform").submit();
 	//$('#browsecontent h2').text($value);
 	
});

$('.delete').click(function(e){
 
    var x;
    if (confirm("REALLY DELETE??") == true) {
       x= 2;
    } else {
       x=0;
       e.preventDefault();
    }});
 	
 	//$('#categories select').val(category);

  
 
});

 /*
 category=$('#categories').val();
 	$("categoryform").submit();
 	$('#categoryform').on('submit', function() {
 		category= $('#categories').val();
 		alert(category);
 	id='#'+category;
 	$(id).prop('selected', 'true');
 });});*/