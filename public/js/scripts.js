$(document).ready(function() {
	 
	var headsource = '<img src="/images/frames_pexels_107911.jpg">';
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
		//alert(color);
		//$('#currentbrowse').css('borderColor',color );
	 //r matcolor = '';
	$('#matselect').change(function(){
		matcolor = $(this).val();
		//alert(matcolor);
		//$('div#padding').addClass('r');
		//r str = "bar";
		/*for (i=0; i < document.styleSheets.length; i++){
			var stylesheet = document.styleSheets[i];
			 
		}*/
		/* as of 12/11 [2] is the index of main stylesheet */
		
		//var mysheet = $('link[href="/css/picnook.css"]')[0].sheet;
		/*reminder use .cssText; to see contents */
		bwidth = '1em';

		if (matcolor == 'none') {
			var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0;
		}
		else {
			mainstylesheet.cssRules[0].style.borderWidth=bwidth;
			mainstylesheet.cssRules[0].style.borderColor=matcolor;
			 
	}
	
	//var mysheet = $('link[href="/css/picnook.css"]')[0].sheet;
   //document.test.addRule('div#padding:before','border-color: "'+matcolor+'";');
   //mysheet.addRule('div#padding:before','border: "'+matcolor+'";');
   //mysheet.cssRules[0].style.borderWidth=bwidth;
	//		mysheet.cssRules[0].style.borderColor=matcolor;
   //alert(mysheet.cssRules[0].cssText);
       
	//}
});
	$('#framethick').on("input",function(){
	fwidth = $('#framethick').val();
	mainstylesheet.cssRules[1].style.borderWidth=fwidth+'em';
});
	$('#matwidth').on("input", function(){
		mwidth= $(this).val();
		mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
	});
//ocument.styleSheets[0].addRule('div#padding:before','border-color: "'+matcolor+'";');


});//end document ready