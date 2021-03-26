<?php

class Playlists extends Controller
{
	private $userModel;
	private $audioModel;
	private $playlistModel;

	public function __construct ()
	{
		$this->userModel     = $this->model( 'User' );
		$this->audioModel    = $this->model( 'Audio' );
		$this->playlistModel = $this->model( 'Playlist' );
	}

	public function createplaylist ()
	{
		$data = [
			'ID'           => Store::user()->ID,
			'title'        => '',
			'errorMessage' => ''
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
		{
			$data[ 'title' ] = $_POST[ 'title' ];

			if ( empty( $data[ 'title' ] ) )
			{
				$data[ 'errorMessage' ] = 'Playlist name can\'t be empty.';
			}
			else
			{
				$this->playlistModel->createPlaylist( $data[ 'ID' ], $data[ 'title' ] );
				header( 'location:' . URLROOT . '/playlists/playlists' );
			}
		}
		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/createplaylist', $data );
	}

	//All playlists
	public function playlists ()
	{
		if ( isset( Store::user()->is_admin ) && ( Store::user()->is_admin == '0' || Store::user()->is_admin == '1' ) )
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'playlists/playlists' );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}

	//Specific playlist
	public function playlist ()
	{
		if ( isset( Store::user()->is_admin ) )
		{
			$data = [
				'playlist_id'   => '',
				'playlist_name' => '',
				'playlist'      => [],
				'message'       => ''
			];

			if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
			{
				$data[ 'playlist_id' ] = $_GET[ 'playlist_id' ];

				if ( empty( $data[ 'playlist_id' ] ) )
				{
					$data[ 'message' ] = 'Playlist Id can\'t be empty.';
				}
				elseif ($this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->ID !== Store::user()->ID )
				{
					header( 'location:' . URLROOT . '/pages/error' );
				}
				else
				{
					$playlist = $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] );

					if ( empty( $playlist ) )
					{
						$data[ 'message' ] = 'Some errors occurred. Invalid playlist.';
					}
					else
					{
						$data[ 'playlist_name' ] = $playlist->title;
						$yt_ids                  = json_decode( $playlist->audios );

						if ( ! empty( $yt_ids ) )
						{
							foreach ( $yt_ids as $yt_id )
							{
								$data[ 'playlist' ][] = $this->audioModel->findAudioBy( 'yt_id', $yt_id );
							}
						}
						else
						{
							$data[ 'message' ] = 'You have no musics in this playlist yet.';
						}
					}
				}
			}
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'playlists/playlist', $data );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}

	//Add musics to playlist
	public function add ()
	{
		if ( isset( Store::user()->is_admin ) )
		{
			$data = [
				'audios'         => '',
				'playlist_id'    => '',
				'errorMessage'   => '',
				'successMessage' => ''
			];

			if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
			{
				$audio                 = $_GET[ 'yt_id' ];
				$data[ 'playlist_id' ] = $_GET[ 'playlist_id' ];

				//validate $audio
				if ( empty( $audio ) )
				{
					$data[ 'errorMessage' ] = 'Invalid request.';
				}
				else if ( ! isset( $this->audioModel->findAudioBy( 'yt_id', $audio )->yt_id ) )
				{
					$data[ 'errorMessage' ] = 'Invalid request.';
				}

				//Validate playlist_id
				if ( empty( $data[ 'playlist_id' ] ) )
				{
					$data[ 'errorMessage' ] = 'Invalid request.';
				}
				else if ( ! isset( $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->playlist_id ) )
				{
					$data[ 'errorMessage' ] = 'Invalid request.';
				}
				else if ( $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->ID !== Store::user()->ID )
				{
					$data[ 'errorMessage' ] = 'Invalid request.';
				}

				if ( empty( $data[ 'errorMessage' ] ) && empty( $data[ 'successMessage' ] ) )
				{
					$playlist = json_decode( $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->audios, TRUE );

					if ( ! empty( $playlist ) && in_array( $audio, $playlist ) )
					{
						$data[ 'errorMessage' ] = 'This music already exists in your playlist.';
					}
					else
					{
						$playlist[]               = $audio;
						$playlist                 = json_encode( $playlist );
						$data[ 'audios' ]         = $playlist;
						$data[ 'successMessage' ] = 'Music added to playlist successfully.';

						$this->playlistModel->addToPlaylist( $data );
					}
				}

				$this->view( 'includes/head' );
				$this->view( 'includes/navigation' );
				$this->view( 'pages/allaudios', $data );
			}
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}

	//Remove audio from playlist
	public function remove ()
	{
		if ( isset( Store::user()->is_admin ) )
		{
			$data = [
				'yt_id'         => '',
				'playlist_id'   => '',
				'playlist_name' => '',
				'message'       => '',
				'audios'        => [],
				'playlist'      => []

			];

			if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
			{
				$data[ 'yt_id' ]       = $_GET[ 'yt_id' ];
				$data[ 'playlist_id' ] = $_GET[ 'playlist_id' ];

				//Validate yt_id
				if ( empty( $data[ 'yt_id' ] ) )
				{
					$data[ 'message' ] = 'Invalid request.';
				}
				else if ( ! isset( $this->audioModel->findAudioBy( 'yt_id', $data[ 'yt_id' ] )->yt_id ) )
				{
					$data[ 'message' ] = 'Invalid request.';
				}

				//Validate playlist_id
				if ( empty( $data[ 'playlist_id' ] ) )
				{
					$data[ 'message' ] = 'Invalid request.';
				}
				else if ( ! isset( $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->playlist_id ) )
				{
					$data[ 'message' ] = 'Invalid request.';
				}
				else if ( $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] )->ID !== Store::user()->ID )
				{
					$data[ 'message' ] = 'Invalid request.';
				}

				//Check if there's no error
				if ( empty( $data[ 'message' ] ) )
				{
					$playlist                = $this->playlistModel->findPlaylistBy( 'playlist_id', $data[ 'playlist_id' ] );
					$data[ 'playlist_name' ] = $playlist->title;
					$playlist                = json_decode( $playlist->audios, TRUE );

					//Check if music exists in playlist
					if ( ( $key = array_search( $data[ 'yt_id' ], $playlist ) ) !== FALSE )
					{
						unset( $playlist[ $key ] );

						foreach ( $playlist as $yt_id )
						{
							$data[ 'playlist' ][] = $this->audioModel->findAudioBy( 'yt_id', $yt_id );
						}
						$playlist         = json_encode( $playlist );
						$data[ 'audios' ] = $playlist;
						$this->playlistModel->addToPlaylist( $data );
					}
					else
					{
						$data[ 'message' ] = 'Invalid request.';
					}
				}
			}
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'playlists/playlist', $data );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}

	public function removeplaylist ()
	{
		if ( isset( Store::user()->is_admin ) )
		{

			$data = [
				'ID'          => Store::user()->ID,
				'playlist_id' => ''
			];

			if ( $_SERVER[ 'REQUEST_METHOD' ]  === 'GET' )
			{
				$data[ 'playlist_id' ] = $_GET[ 'playlist_id' ];
			}

			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'playlists/playlists', $data );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}
}