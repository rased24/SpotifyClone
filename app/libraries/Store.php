<?php

class Store
{

	public function __construct()
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
}