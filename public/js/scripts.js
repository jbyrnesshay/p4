$(document).ready(function() {


	$('#frameselect').change(function(){
		color = $(this).val();
		 
		$('#frame').css('borderColor',color );
	});
		//alert(color);
		//$('#currentbrowse').css('borderColor',color );
	 
	$('#matselect').change(function(){
		matcolor = $(this).val();
		$('#currentbrowse').css('borderColor', matcolor);

	//$('#currentbrowse').css('borderColor',color );
	

});
});//end document ready