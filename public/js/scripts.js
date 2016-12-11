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
		alert(matcolor);
		//$('div#padding').addClass('r');
		//r str = "bar";
		/*for (i=0; i < document.styleSheets.length; i++){
			var stylesheet = document.styleSheets[i];
			 
		}*/
		mainstylesheet = document.styleSheets[2];
		var first_rule = mainstylesheet.cssRules[0].style.borderColor=matcolor;
		alert(first_rule);
		//var test = document.styleSheets[1];
		//var test = document.getElementById('mainstyles');
		//alert(test);
	//	var mysheet = $('link[href="/css/picnook.css"]')[0].sheet;
   //document.test.addRule('div#padding:before','border-color: "'+matcolor+'";');
      //div#padding:before 
		//$('div#padding').before().css('borderColor', matcolor);
		//div#padding:before
	//$('#currentbrowse').css('borderColor',color );
	

});
//ocument.styleSheets[0].addRule('div#padding:before','border-color: "'+matcolor+'";');
});//end document ready