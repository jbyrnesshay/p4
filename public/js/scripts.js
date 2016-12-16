/* all scripts.js programming by Joachim Byrnes-Shay*/

$(document).ready(function() {

	headsource = 'YOUR PLACE FOR WALL ART';

	//mainstylesheet is variable employed for stylling :before pseudoelement
	//not able to use Jquery for that, app necessitates dynamic styling for it
	mainstylesheet = document.styleSheets[2];

	//a few simple home page functions
	homepageFuncs();
	//simple flash message effect with jquery
	flashMessages();
	//listener for and display for user selection of mat, frame, 
	//color choices on create page
	createpicConfig();
	//primitive javascript delete confirmation
	deleteConfirmation();
	//initial state of user's frame, mat, color choices upon edit
	//editstartState();
	//listener and change of display for user's new selects on edit
 	//editpageListener();
 	editPageitemcontrol();

	//jquery effect on flash messages
	function flashMessages() {
		if ($('#flash_message').html()) {
			 $('#flash_message').fade(4000, function(){
			 	//$('#ctrhead').html(headsource);
			});
		}
	}
	
	//some simple home page options
 	function homepageFuncs() {
		//if wishlist options button is clicked it 
		//toggles button panel, consisting of details, edit, delete
		$('#options').click(function() {
			$('.edit').toggleClass("visiblebutton");
		 	$('.details').toggleClass("visiblebutton");
		 	$('.delete').toggleClass("visiblebutton"); 
		});
		
	   	//if the 'open wishlist' button on home page is clicked
	   	//toggles wishlist vs right column text content
		$('#openlist').click(function(){
	   		$('#pg1rightcontent').toggle();
	  		$('#wishlistcontainer, #wish').toggle();
	  	});
	 
		//if home page category is selected, choice is submitted to 
		//controller, which changes the display of images accordingly
		$('#category').change(function() {
	  		$value=$('#category').val();
	 		document.forms["categoryform"].submit();
	 	});
	}//end homepageFuncs

	
	function deleteConfirmation() {
		//primitive delete confirmation window in javascript
		$('.delete').click(function(e){
	    if (!confirm("REALLY DELETE??") == true) {
	    	e.preventDefault();
	    }});
	}//end deleteConfirmation
 	
 	
 	/*  createpicConfig function listens for user input to set 
		values for user frame, mat, color options */
	function createpicConfig() {
		//if frame select change 
		$('#frameselect').change(function(){
			color = $(this).val();
			$('#frame').css('borderColor',color );
		});
		//if create page matselect change
		$('#matselect').change(function(){
			matcolor = $(this).val();
			/*reminder use .cssText; to see contents */
			//set default matwidth
			bwidth = '0.3em';
			
			if (matcolor == 'none') {
				/*this is accessing css rules, to achieve styling functionality
				  for the mat using :before selector, which I used to create a resizable 
				  mat that doesn't affect image size.*/   
				mainstylesheet.cssRules[0].style.borderWidth = 0 + 'em';
				mainstylesheet.cssRules[0].style.borderColor='white';
			}
			else {
				if ($('#matthick').val()>0.3) {
				bwidth= $('#matthick').val() + 'em';
				}
				mainstylesheet.cssRules[0].style.borderWidth=bwidth;
				mainstylesheet.cssRules[0].style.borderColor=matcolor;
			}
		});
		//if framethickness slider changed, set border width
		$('#framethick').on("input",function(){
			fwidth = $('#framethick').val() + 'em';
			$('#frame').css('borderWidth', fwidth);
		});
		//
		//if matthickness slider changed, set mat thickness
		$('#matthick').on("input", function(){
			mwidth= $(this).val();
			matcolor= $('#matselect').val();
			if (matcolor == 'none') {
				$('#matselect').val('white') ;
				mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
			}
			else {
			mainstylesheet.cssRules[0].style.borderWidth=mwidth+'em';
			mainstylesheet.cssRules[0].style.borderColor=matcolor;
			}
		});
	}//end of createpicConfig function	


	function editPageitemcontrol() {
		editstartState();
		editpageListener();
	 	function editstartState() {
	 	//these are all initial values for the wishlist pic
	 	//that user selected to edit
		 	framewidth = $('#eframethick').val() + 'em';
		 	//again using cssRules to change :before
		 	$('#eframe').css('borderWidth', framewidth);
			//mainstylesheet.cssRules[3].style.borderWidth=framewidth+'em';
			framecolor = $('#eframecolor').val();
			$('#eframeselect').val(framecolor);
			$('#eframe').css("borderColor", framecolor);
			matcolor = $('#ematcolor').val();
			matwidth = $('#ematthick').val();
			$('#ematselect').val(matcolor);
			mainstylesheet.cssRules[1].style.borderColor=matcolor;
			mainstylesheet.cssRules[1].style.borderWidth=matwidth+'em';
		}// end editstartState

	 	function editpageListener() {
	 		$('#eframeselect').change(function(){
				color = $(this).val();
				$('#eframe').css('borderColor',color );
			});
			//
			//if matselect change
			$('#ematselect').change(function(){
				matcolor = $(this).val();
				matThickness = $('#ematthick').val();
				
				if (matcolor == 'none'){
				 	mainstylesheet.cssRules[1].style.borderWidth=0+'em';
					mainstylesheet.cssRules[1].style.borderColor='white';
				}
				else {
					mainstylesheet.cssRules[1].style.borderColor=matcolor;
					mainstylesheet.cssRules[1].style.borderWidth=matThickness + 'em';
				}
			});
			//
			//if framethickness slider changed
			$('#eframethick').on("input",function(){
				fwidth = $('#eframethick').val() + 'em';
				$('#eframe').css('borderWidth', fwidth)
			});
			//if matthickness slider changed
			$('#ematthick').on("input", function(){
				mwidth= $(this).val();
				matcolor= $('#ematselect').val();
				mainstylesheet.cssRules[1].style.borderWidth=mwidth+'em';
			}
		);}//end edit page listener
	}
});

 