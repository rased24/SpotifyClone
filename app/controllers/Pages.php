<?php

class Pages extends Controller
{
	private $userModel;
	private $audioModel;

	public function __construct()
	{
		$this->userModel  = $this->model( 'User' );
		$this->audioModel = $this->model( 'Audio' );
	}

	public function index()
	{
		$audios = $this->audioModel->getAudios();

		$data = [
			'audios' => $audios,
			'i'      => 1
		];

		$this->view( 'pages/index', $data );
		}

	public function about()
	{
		$this->view( 'pages/about' );
	}

	public function play()
	{

		$data = [
			'yt_id' => '',
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' )
		{
			$data[ 'yt_id' ] = $_GET[ 'yt_id' ];

		}
		$this->view( 'pages/play', $data );
	}
}