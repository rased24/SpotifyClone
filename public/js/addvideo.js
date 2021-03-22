
( function ( $ ) {
	$( 'button[type=button]' ).on( 'click', function () {
		const jsonUrl  = 'https://www.youtube.com/oembed?url=' + $( '#videoUrl' ).val() + '&format=json';

		$.getJSON( jsonUrl,
			function ( data )
			{
				$( '#thumbnailImg' ).addClass( 'image-container' );

				$( '#videoTitle').val( data.title );
				$( '#videoAlbum').val( data.author_name );
				$( '#thumbnailImg' ).attr( 'src',  data.thumbnail_url );
				$( '#thumbnail' ).val( data.thumbnail_url );
			});
	} );
} )( jQuery );