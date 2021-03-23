<?php

class Pages extends Controller
{
	private $userModel;
	private $audioModel;

	public function __construct ()
	{
		$this->userModel  = $this->model( 'User' );
		$this->audioModel = $this->model( 'Audio' );
	}

	public function index ()
	{
		$audios = $this->audioModel->getAudios();

		$user = isset( $_SESSION[ 'user_id' ] ) ? $this->userModel->findUserBy( 'ID', $_SESSION[ 'user_id' ] ) : '';

		$data = [
			'user'   => $user,
			'audios' => $audios,
		];

		$this->view( 'includes/head' );
		$this->view( 'includes/navigation', $data );
		$this->view( 'pages/index', $data );
	}

	public function about ()
	{
		$user = isset( $_SESSION[ 'user_id' ] ) ? $this->userModel->findUserBy( 'ID', $_SESSION[ 'user_id' ] ) : '';

		$data = [
			'user' => $user,
		];

		$this->view( 'includes/head' );
		$this->view( 'includes/navigation', $data );
		$this->view( 'pages/about' );
	}

	public function play ()
	{

		$user = isset( $_SESSION[ 'user_id' ] ) ? $this->userModel->findUserBy( 'ID', $_SESSION[ 'user_id' ] ) : '';

		$data = [
			'yt_id' => '',
			'user'  => $user
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
		{
			$data[ 'yt_id' ] = $_GET[ 'yt_id' ];
		}

		$this->view( 'includes/head' );
		$this->view( 'includes/navigation', $data );
		$this->view( 'pages/play', $data );
	}
}