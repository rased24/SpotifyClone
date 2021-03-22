function controlVideo ( vidcontrol )
{
	const div = document.getElementById( 'thevideo' );
	const iframe = div.getElementsByTagName( 'iframe' )[ 0 ].contentWindow;

	iframe.postMessage( '{"event":"command","func":"' + vidcontrol + '","args":""}', '*' );
}