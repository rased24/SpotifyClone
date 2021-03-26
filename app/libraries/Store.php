<?php

class Store
{
	public function __construct ()
	{
	}

	public static function user ()
	{
		$userModel = new User();

		return isset( $_SESSION[ 'user_id' ] ) ? $userModel->findUserBy( 'ID', $_SESSION[ 'user_id' ] ) : 'Not found';
	}

	public static function audios ()
	{
		$audioModel = new Audio();

		return $audioModel->getAudios();
	}

	public static function playlists ()
	{
		$playlistModel = new Playlist();

		return  $playlistModel->getPlaylist( self::user()->ID ) ;
	}

	public static function playlist ( $playlist_id )
	{
		$playlistModel = new  Playlist();

		return $playlistModel->findPlaylistBy( 'playlist_id', $playlist_id );
	}
}