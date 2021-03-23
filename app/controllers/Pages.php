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

		$this->view( 'includes/head' );
		$this->view( 'includes/navigation' );
		$this->view( 'pages/play', $data );
	}
}