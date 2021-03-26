<?php

class Playlist
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAllPlaylists()
	{
		$this->db->query( 'SELECT * FROM playlists' );

		return $this->db->resultSet();
	}

	public function findPlaylistBy( $row, $data )
	{
		$this->db->query( 'SELECT * FROM playlists WHERE ' . $row . '= :' . $row );

		//Binding param with variable
		$this->db->bind( ':' . $row, $data );

		$this->db->execute();

		$res = $this->db->single();

		if ( $res )
		{
			return $res;
		}
		else
		{
			return FALSE;
		}

	}

	public function getPlaylist ( $id )
	{
		$this->db->query( 'SELECT * FROM playlists WHERE ID = :ID' );

		//Binding id param with id variable
		$this->db->bind( ':ID', $id );

		$this->db->execute();
		$res = $this->db->resultSet();

		if ( $res )
		{
			return $res;
		}
		else
		{
			return FALSE;
		}
	}

	public function createPlaylist( $ID, $title )
	{
		$this->db->query( 'INSERT INTO playlists (ID, title) VALUES  (:ID, :title)');

		$this->db->bind( ':ID', $ID );
		$this->db->bind( ':title', $title );

		if ( $this->db->execute() )
		{
			return TRUE;
		}
		else
		{
			return  FALSE;
		}
	}

	public function addToPlaylist( $data )
	{
		$this->db->query( 'UPDATE playlists SET audios = :audios WHERE playlist_id = :playlist_id' );

		$this->db->bind( ':playlist_id', $data[ 'playlist_id' ] );
		$this->db->bind( ':audios', $data[ 'audios' ] );

		if ( $this->db->execute() )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}
}