( function( api ) {

	// Extends our custom "bizplus" section.
	api.sectionConstructor['bizplus'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
	jQuery( "#accordion-panel-bizplus-theme-options" ).addClass( "custom-class" );

} )( wp.customize );
