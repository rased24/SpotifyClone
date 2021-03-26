<?php

class Pages extends Controller
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

	public function index ()
	{

		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/index' );
	}

	public function about ()
	{
		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/about' );
	}

	public function play ()
	{
		$data = [
			'yt_id' => '',
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
		{
			$data[ 'yt_id' ] = $_GET[ 'yt_id' ];
		}

		if (  empty( $data[ 'yt_id' ] ) )
		{
			header( 'location:' . URLROOT );
		}
		elseif ( ! isset( $this->audioModel->findAudioBy( 'yt_id', $data[ 'yt_id' ] )->yt_id ) )
		{
			header( 'location:' . URLROOT );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/play', $data );
		}


	}

	public function allaudios ()
	{
		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/allaudios' );
	}

	public function createplaylist ()
	{
		if ( isset( Store::user()->is_admin ) )
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/createplaylist' );
		}
		else
		{
			$this->view( 'includes/head' );
			$this->view( 'includes/navigation' );
			$this->view( 'pages/error' );
		}
	}

	public  function  error ()
	{
		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/error' );
	}
}