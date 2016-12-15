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
 

 $('#category').change(function() {
  
 	$value=$('#category').val();
 
 	document.forms["categoryform"].submit();
 
 	
});

$('.delete').click(function(e){
 
    var x;
    if (confirm("REALLY DELETE??") == true) {
       x= 2;
    } else {
       x=0;
       e.preventDefault();
    }});
 	
 
 editstartState();
 	editpageListener();
 function editstartState() {
 	 
 	//$('#eframe').css('borderColor', eframecolor);
 	//ematcolor = $('#ematselect').val();
 	//eframewidth = $('#eframethick').val();
 	framewidth = $('#eframethick').val();
	mainstylesheet.cssRules[3].style.borderWidth=framewidth+'em';
	framecolor = $('#eframecolor').val();
	$('#eframeselect').val(framecolor);
	$('#eframe').css("borderColor", framecolor);
	matcolor = $('#ematcolor').val();
	matwidth = $('#ematthick').val();
	$('#ematselect').val(matcolor);
	mainstylesheet.cssRules[2].style.borderColor=matcolor;
	mainstylesheet.cssRules[2].style.borderWidth=matwidth+'em';
	//document.getElementById('eframeselect').value = framecolor;
	/*if (ematcolor == 'none') {
			//$('#matselect').value('white') ;
			document.getElementById('ematselect').value = 'white';
			//mainstylesheet.cssRules[2].style.borderWidth=ematwidth+'em';
			//var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0+'em';

		}
		else {
		//mainstylesheet.cssRules[2].style.borderWidth=ematwidth+'em';
		mainstylesheet.cssRules[2].style.borderColor=ematcolor;*/

	
 }

 function editpageListener() {
 	$('#eframeselect').change(function(){
		color = $(this).val();
		$('#eframe').css('borderColor',color );
	});
	//
	//if matselect change
	$('#ematselect').change(function(){
		matcolor = $(this).val();
		/*reminder use .cssText; to see contents */
			testThickness = $('#ematthick').val();
	 		if (matcolor == 'none'){
			//mainstylesheet.cssRules[2].style.borderWidth=bwidth;
			mainstylesheet.cssRules[2].style.borderWidth=0+'em';
			$('#ematthick').
			mainstylesheet.cssRules[2].style.borderColor='white';

		}
		else {

			mainstylesheet.cssRules[2].style.borderColor=matcolor;
			mainstylesheet.cssRules[2].style.borderWidth=testThickness + 'em';
		}
		
	});
	//
	//if framethickness slider changed
	$('#eframethick').on("input",function(){
		fwidth = $('#eframethick').val();
		mainstylesheet.cssRules[3].style.borderWidth=fwidth+'em';
	});
	//"ematthick"
	//if matthickness slider changed
	$('#ematthick').on("input", function(){
		mwidth= $(this).val();
		matcolor= $('#ematselect').val();
		 
		 
		mainstylesheet.cssRules[2].style.borderWidth=mwidth+'em';
	}
		//mainstylesheet.cssRules[2].style.borderColor=matcolor;
	
		
	
	);
}
	//
 


 

/*$('#frameselect').change(function(){
		color = $(this).val();
		$('#frame').css('borderColor',color );
	});
	//
	//if matselect change
	$('#matselect').change(function(){
		matcolor = $(this).val();
	 
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

 */

});

 