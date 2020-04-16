/* **************************************************************************************
	Post Type Portfolio  meta options Display as per Project Type
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var project_video = $( '.portfolio_project_type_field' );		

	function metabox_portfolio_project_dropdown() {
		var project_type = $( '#swmsc_portfolio_project_type' ).val();

		// remove by default		
		project_video.hide();		

		if ( project_type === 'video') {			
			project_video.show();
		}		
	}
	// Fire the function immediately
	metabox_portfolio_project_dropdown();
	$( '#swmsc_portfolio_project_type' ).on( 'change', metabox_portfolio_project_dropdown );

}); })(jQuery);