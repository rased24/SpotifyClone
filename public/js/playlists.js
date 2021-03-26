( function ( $ ) {
	const root = $( '#root' ).val();

	$( '[id=myPlaylist]' ).on( 'click', function () {
		const playlist_id = $( this ).attr( 'name' );

		$( this ).attr( 'href', root + '/playlists/playlist?playlist_id=' + playlist_id );
	} );

	$( '[id=removePlaylist]' ).on( 'click', function () {

		const playlist_id = $( this ).attr( 'name' );
		const url   = $( '#root' ).val() + '/playlists/removeplaylist?playlist_id=' + playlist_id;

		$( this ).attr( "href", url );
	} );
} ) ( jQuery );