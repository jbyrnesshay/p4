$(document).ready(function() {
	headsource = '<img id="ctrheadimage" src="/images/frames_pexels_107911.jpg">';
	mainstylesheet = document.styleSheets[2];

 
	 	 
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
	 /*
	 $('#options').toggle(function() {
	 	 
	 
	  
	 	$('#edit').css("visibility", "visible");
	 	$('#details').css('visibility', "visible");
	 	$('#delete').css("visibility", 'visible');
	 }, function(){
	 	$('#edit').css("visibility", "hidden");
	 	$('#details').css('visibility', "hidden");
	 	$('#delete').css("visibility", 'hidden');

	 });*/

	 $('#options').click(function() {
	 	 
	 	// alert('test');
	  
	 	$('.edit').toggleClass("visiblebutton");
	 	$('.details').toggleClass("visiblebutton");
	 	$('.delete').toggleClass("visiblebutton"); 
	 });
	 
 

});//end document ready