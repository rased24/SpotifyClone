( function ( $ ) {

	$( '#newSongsButton' ).on( 'click',
		function ()
		{

		if ( $( '#newSongs').hasClass( 'hidden' ) )
		{
			$( '#newSongs' ).removeClass( 'hidden' );
			$( '#randomSongs' ).addClass( 'hidden' );
			$( '#mostViewedSongs' ).addClass( 'hidden' );


		}
		else
		{
			$( '#newSongs' ).addClass( 'hidden' );
		}
	} );

	$( '#randomSongsButton' ).on( 'click',
		function ()
		{

		if ( $( '#randomSongs').hasClass( 'hidden' ) )
		{
			$( '#randomSongs' ).removeClass( 'hidden' );
			$( '#newSongs' ).addClass( 'hidden' );
			$( '#mostViewedSongs' ).addClass( 'hidden' );


		}
		else
		{
			$( '#randomSongs' ).addClass( 'hidden' );
		}
	} );

	$( '#mostViewedSongsButton' ).on( 'click',
		function ()
		{

			if ( $( '#mostViewedSongs').hasClass( 'hidden' ) )
			{
				$( '#mostViewedSongs' ).removeClass( 'hidden' );
				$( '#newSongs' ).addClass( 'hidden' );
				$( '#randomSongs' ).addClass( 'hidden' );


			}
			else
			{
				$( '#mostViewedSongs' ).addClass( 'hidden' );
			}
		} );

	$( 'input[type=radio]' ).on( 'change',
		function ()
		{
			$( '#playAudio' ).submit();
		} );
} ) ( jQuery );