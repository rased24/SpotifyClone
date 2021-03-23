<?php

class Audio
{
	private $db;

	public function __construct ()
	{
		$this->db = new Database();
	}

	public function getAudios ()
	{
		$this->db->query( 'SELECT * FROM audios' );

		return $this->db->resultSet();
	}

	public function findAudioBy ( $row, $data )
	{
		$this->db->query( 'SELECT * FROM audios WHERE ' . $row . ' = :' . $row );

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

	public function addAudio ( $data )
	{
		$this->db->query( 'INSERT INTO audios (title, album, thumbnail, url, yt_id)  VALUES (:title, :album, :thumbnail, :url, :yt_id)' );

		//Bind the values
		$this->db->bind( ':title', $data[ 'title' ] );
		$this->db->bind( ':album', $data[ 'album' ] );
		$this->db->bind( ':thumbnail', $data[ 'thumbnail' ] );
		$this->db->bind( ':url', $data[ 'url' ] );
		$this->db->bind( ':yt_id', $data[ 'yt_id' ] );

		//$this->db->bind( ':viewed_times', $data[ 'viewed_times' ] );

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