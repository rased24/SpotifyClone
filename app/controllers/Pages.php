<?php

class Pages extends Controller
{
	protected $userModel;

	public function __construct()
	{
		$this->userModel = $this->model( 'User' );
	}

	public function index()
	{
		$users = $this->userModel->getUsers();
		$data = [
			'title' => 'Great Index',
			'info'  => 'What\'s up bro?',
			'users' => $users
		];

		$this->view( 'pages/index', $data );
		}

	public function about()
	{
		$this->view( 'pages/about' );
	}
}