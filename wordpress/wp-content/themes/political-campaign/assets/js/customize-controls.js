( function( api ) {

	// Extends our custom "political-campaign" section.
	api.sectionConstructor['political-campaign'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );