jQuery.noConflict();
jQuery(document).ready(function(){


/*GOOGLE MAPS STARTS*/
if ( jQuery( '#map' ).length && jQuery() ) {
var jQuerymap = jQuery('#map');
	jQuerymap.gMap({
	address: 'Evropska 2589/33b, 160 00  Praha 6',
	zoom: 18,
	markers: [
	{ 'address' : 'Evropska 2589/33b, 160 00  Praha 6' },]
			});
		 }
/*GOOGLE MAPS ENDS*/


});  /* JQUERY ENDS */
