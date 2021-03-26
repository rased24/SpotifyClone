( function ( $ ) {
	$( '[id=message]' ).fadeOut( 3000 );

	$( '[id=removeFromPlaylist]' ).on( 'click', function () {

		const yt_id = $( this ).attr( 'name' );
		const url   = $( '#root' ).val() + '&yt_id=' + yt_id;

		$( this ).attr( "href", url );
	} );
} ) ( jQuery );