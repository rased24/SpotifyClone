<?php

class User {
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getUsers()
	{
		$this->db->query( 'SELECT * FROM users' );

		return $this->db->resultSet();
	}

	public function findAudioBy( $row, $data )
	{
		$this->db->query( 'SELECT * FROM users WHERE ' . $row . ' = :' . $row );

		//Binding param with  variable
		$this->db->bind( ':' . $row, $data );

		$this->db->execute();
		$res = $this->db->single();

		if ( $res )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	public function register( $data )
	{
		$this->db->query( 'INSERT INTO users (username, email, password)  VALUES (:username, :email, :password) ');

		//Bind the values
		$this->db->bind( ':username', $data[ 'username' ] );
		$this->db->bind( ':email', $data[ 'email' ] );
		$this->db->bind( ':password', $data[ 'password' ] );

		if ( $this->db->execute() )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}

	public function login( $username, $password )
	{
		$this->db->query( 'SELECT * FROM users WHERE username = :username' );

		$this->db->bind( ':username', $username );

		$row = $this->db->single();

		if ( $row )
		{
			$hashedPassword =  $row->password;

			if ( password_verify( $password, $hashedPassword ) )
			{
				return $row;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}