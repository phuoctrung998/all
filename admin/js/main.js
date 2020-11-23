$( document ).ready( function () {
	// Click Repeater
	$( '.btn-repeater' ).on( 'click' , function () {
		var _this = $( this );
		var groupRepeater = _this.parents( '.form-repeater' );
		var repeaterWrapper = groupRepeater.find( '.repeater-wrapper' );
		var row = repeaterWrapper.find( '.row-input:last-child' ).clone( true );
		repeaterWrapper.append( row );
	} );

	// Click delete 
	$( '.repeater-wrapper' ).on( 'click' , '.btn-repeater-del' , function () {
		var _this = $( this );
		var limit = _this.parents( '.repeater-wrapper' ).find( '.row-input' );
		var row = _this.parents( '.row-input' );
		if( limit.length > 1 ) {
			row.remove();
		}
		return false; 
	}  );
	
	
	/** app detail **/
	
	$( '.btn-repeater-uk' ).on( 'click' , function () {
		var _this = $( this );
		var groupRepeater = _this.parents( '.form-repeater' );
		var repeaterWrapper = groupRepeater.find( '.repeater-wrapper' );
		var row = repeaterWrapper.find( '.row-input:last-child' ).clone( true );
		repeaterWrapper.append( row );
	} );
});