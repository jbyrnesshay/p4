$(document).ready(function() {
	headsource = '<img id="ctrheadimage" src="/images/frames_pexels_107911.jpg">';
	mainstylesheet = document.styleSheets[2];

	if ($('#flash_message').html()) {
		 $('#flash_message').fadeOut(3000, function(){
		 	$('#headimage').html(headsource);
		});
	}
	$('#frameselect').change(function(){
		color = $(this).val();
		$('#frame').css('borderColor',color );
	});
	
	$('#matselect').change(function(){
		matcolor = $(this).val();
		/*reminder use .cssText; to see contents */
		bwidth = '.25em';

		if (matcolor == 'none') {
			var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0;
		}
		else {
			mainstylesheet.cssRules[0].style.borderWidth=bwidth;
			mainstylesheet.cssRules[0].style.borderColor=matcolor;
		}
	});
	$('#framethick').on("input",function(){
		fwidth = $('#framethick').val();
		mainstylesheet.cssRules[1].style.borderWidth=fwidth+'em';
	});
	$('#matwidth').on("input", function(){
		mwidth= $(this).val();
		matcolor= $('#matselect').val();
		if (matcolor == 'none') {
			var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0+'em';

		}
		else {
		mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
		mainstylesheet.cssRules[0].style.borderColor=matcolor;
	}
	});
});//end document ready