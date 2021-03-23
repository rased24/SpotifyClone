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

	public function getPlaylist ( $id )
	{
		$this->db->query( 'SELECT * FROM playlists WHERE ID = :ID' );

		//Binding id param with id variable
		$this->db->bind( ':ID', $id );

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

	public function createPlaylist( $ID )
	{
		$this->db->query( 'INSERT INTO playlists (ID) VALUES  (:ID)');

		$this->db->bind( ':ID', $ID );

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
		$this->db->query( 'UPDATE playlists SET audios = :audios WHERE ID = :ID' );

		$this->db->bind( ':ID', $data[ 'ID' ] );
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