// JavaScript Document
function toggleAccount(theEl) {
	$('#accountContainer').slideToggle('slow');
	
	if($(theEl).hasClass('selected')) {
		// Delay
		$(theEl).toggleClass('selected', 600, 'easeOutSine'); 	
	}
	else
		$(theEl).toggleClass('selected', 0, 'easeOutSine'); 	
}

function showSubSubSection(id) {
	console.log(id);
	console.log($(id));
	
	//Hide All
	$('.headerSubSubSection').hide();

	if( typeof id !== 'undefined' ) {
		$(id).slideDown();
	}	
}

function showSubSubSectionCampaign(id) {
	//Hide All
	$('.headerSubSubSection').fadeOut();
	$('.headerSubSubSectionOverlay').fadeOut();
	
	if( typeof id !== 'undefined' ) {
		
		$('.headerSubSubSectionOverlay').fadeIn();
		$(id).fadeIn();
		
	}
	
	
	
}

