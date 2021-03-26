( function ( $ ) {


	let  playlist_id = $( '#playlist_id' ).on( 'change', function () {

		return $( '#playlist_id' ).val( $( '#playlist_id option:selected' ).val() );
	} );


	$( '[id=addToPlaylist]' ).on( 'click', function () {

		const yt_id = $( this ).attr( 'name' );
		const url   = $( '#root' ).val() + '?yt_id=' + yt_id + '&' + playlist_id.serialize();

		$( this ).attr( "href", url );
	} );


	$( '#message' ).fadeOut( 3000 );
} ) ( jQuery )