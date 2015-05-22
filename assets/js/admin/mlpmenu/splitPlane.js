function showSplitPlaneRow(el) {
	$(el).parent().toggleClass('splitPaneRightSelected'); 
	$(el).parent().children("ul").eq(0).slideToggle(300); 
	$(el).parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
}

var pushMenu = new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );

// auto launch menu on mobile
if($('#trigger').is(":visible"))
	pushMenu._defaultOpen();

// If window is resized, shrink the menu
var width = $(window).width(); 
$(window).resize(function(e) {
	
	if ($(window).width()==width) return; 
	width = $(window).width();


	pushMenu._resetMenu();
});	

