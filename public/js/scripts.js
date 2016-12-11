$(document).ready(function() {


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
		mainstylesheet = document.styleSheets[2];
		/*reminder use .cssText; to see contents */
		bwidth = '1em';

		if (matcolor == 'none') {
			var firstrule = mainstylesheet.cssRules[0].style.borderWidth = 0;
		}
		else {
			mainstylesheet.cssRules[0].style.borderWidth=bwidth;
			mainstylesheet.cssRules[0].style.borderColor=matcolor;
		//alert(first_rule);
		//var test = document.styleSheets[1];
		//var test = document.getElementById('mainstyles');
		//alert(test);
	//	var mysheet = $('link[href="/css/picnook.css"]')[0].sheet;
   //document.test.addRule('div#padding:before','border-color: "'+matcolor+'";');
      //div#padding:before 
		//$('div#padding').before().css('borderColor', matcolor);
		//div#padding:before
	//$('#currentbrowse').css('borderColor',color );
	}

});
//ocument.styleSheets[0].addRule('div#padding:before','border-color: "'+matcolor+'";');
});//end document ready