/**
 * Javascript to handle open street map for property single page.
 */
jQuery( function( $ ) {
	'use strict';

	if( typeof contactMapData !== "undefined" ) {

		if( contactMapData.lat && contactMapData.lng ) {

			var officeLocation = new google.maps.LatLng( contactMapData.lat, contactMapData.lng );

			var mapZoom = 14;
			if( contactMapData.zoom ) {
				mapZoom = parseInt( contactMapData.zoom );
			}

			var contactMapOptions = {
				center : officeLocation,
				zoom : mapZoom,
				mapTypeId : google.maps.MapTypeId.ROADMAP,
				scrollwheel : false
			};

			var contactMap = new google.maps.Map( document.getElementById( "map_canvas" ), contactMapOptions );
			var contactMarker = new google.maps.Marker( {
				position : officeLocation,
				map : contactMap
			} );

		}

	}

} );