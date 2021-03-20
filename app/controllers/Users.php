 <?php

class Users extends Controller {
	private $userModel;

	public function __construct()
	{
		$this->userModel = $this->model( 'User' );
	}

	public function login()
	{
		$data = [
			'title' => 'Login page'
		];

		$this->view( 'users/login', $data );
	}
}