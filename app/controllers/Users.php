<?php

class Users extends Controller
{
	private $userModel;

	public function __construct ()
	{
		$this->userModel = $this->model( 'User' );
	}

	public function login ()
	{
		$data = [
			'username'      => '',
			'password'      => '',
			'usernameError' => '',
			'passwordError' => ''
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
		{
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

			$data = [
				'username'      => trim( $_POST[ 'username' ] ),
				'password'      => trim( $_POST[ 'password' ] ),
				'usernameError' => '',
				'passwordError' => ''
			];

			//Validate username
			if ( empty( $data[ 'username' ] ) )
			{
				$data[ 'usernameError' ] = 'Please enter username.';
			}

			//Validate password
			if ( empty( $data[ 'password' ] ) )
			{
				$data[ 'passwordError' ] ='Please enter password.';
			}

			//Check if all errors are empty
			if ( empty( $data[ 'usernameError' ] ) && empty( $data[ 'passwordError' ] ) )
			{
				$loggedInUser = $this->userModel->login( $data[ 'username' ], $data[ 'password' ] );

				if ( $loggedInUser )
				{
					$this->createUserSession( $loggedInUser );
					header( 'location:' . URLROOT );
				}
				else
				{
					$data[ 'passwordError' ] = 'Password or username is incorrect.';
					$this->view( 'users/login', $data );
				}
			}

		}

		$this->view( 'users/login', $data );
	}

	public function register ()
	{
		$data = [
			'username'             => '',
			'email'                => '',
			'password'             => '',
			'confirmPassword'      => '',
			'usernameError'        => '',
			'emailError'           => '',
			'passwordError'        => '',
			'confirmPasswordError' => ''
		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
		{
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

			$data = [
				'username'             => trim( $_POST[ 'username' ] ),
				'email'                => trim( $_POST[ 'email' ] ),
				'password'             => trim( $_POST[ 'password' ] ),
				'confirmPassword'      => trim( $_POST[ 'confirmPassword' ] ),
				'usernameError'        => '',
				'emailError'           => '',
				'passwordError'        => '',
				'confirmPasswordError' => ''
			];

			$nameValidation     = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[\d])\S*$/";

			//Validate username
			if ( empty( $data[ 'username' ] ) )
			{
				$data[ 'usernameError' ] = 'Please enter username.';
			}
			elseif ( $this->userModel->findUserBy( 'username', $data[ 'username' ] ) )
			{
				$data[ 'usernameError' ] = 'This username is already taken.';
			}
			elseif ( ! preg_match( $nameValidation, $data[ 'username' ] ) )
			{
				$data[ 'usernameError' ] = 'Name can only contain letter and numbers';
			}

			//Validate email
			if ( empty( $data[ 'email' ] ) )
			{
				$data[ 'emailError' ] = 'Please enter email.';
			}
			elseif ( ! filter_var( $data[ 'email' ], FILTER_VALIDATE_EMAIL ) )
			{
				$data[ 'emailError' ] = 'Please enter valid email';
			}
			else
			{
				//Check if email exists
				if ( $this->userModel->findUserBy( 'email', $data[ 'email' ] ) )
				{
					$data[ 'emailError' ] = 'Email already exists in database';
				}
			}

			//Validate password
			if ( empty( $data[ 'password' ] ) )
			{
				$data[ 'passwordError' ] = 'Please enter password';
			}
			elseif ( strlen( $data[ 'email' ] ) < 6 )
			{
				$data[ 'passwordError' ] = 'Password must contain at least 6 characters';
			}
			elseif ( ! preg_match( $passwordValidation, $data[ 'password' ] ) )
			{
				$data[ 'passwordError' ] = 'Password must have at least one numeric value.';
			}

			//Validate confirmPassword
			if ( empty( $data[ 'confirmPassword' ] ) )
			{
				$data[ 'confirmPassword' ] = 'Please enter password';
			}
			elseif ( $data[ 'confirmPassword' ] !== $data[ 'password' ] )
			{
				$data[ 'confirmPasswordError' ] = 'Passwords don\'t match. Please try again.';
			}

			//Check if all errors are empty
			if ( empty( $data[ 'usernameError' ] ) && empty( $data[ 'emailError' ] ) && empty( $data[ 'passwordError' ] ) && empty( $data[ 'confirmPasswordError' ] )  )
			{
				//Hash password
				$data[ 'password' ] = password_hash( $data[ 'password' ], PASSWORD_DEFAULT );

				//Register user from model function
				if ( $this->userModel->register( $data ) )
				{
					//Redirect to login page
					header( 'location:' . URLROOT . '/users/login');
				}
				else
				{
					die( 'Something went wrong' );
				}
			}
		}

		$this->view( 'users/register', $data );
	}

	public function  createUserSession( $user )
	{

		$_SESSION[ 'user_id' ]  = $user->ID;
		$_SESSION[ 'username' ] = $user->username;
		$_SESSION[ 'email' ]    = $user->email;
		$_SESSION[ 'is_admin' ] = $user->is_admin;

	}

	public function logout()
	{
		unset( $_SESSION[ 'user_id' ] );
		unset( $_SESSION[ 'username' ] );
		unset( $_SESSION[ 'email' ] );
		unset( $_SESSION[ 'is_admin' ] );


		header( 'location:' . URLROOT );
	}
}