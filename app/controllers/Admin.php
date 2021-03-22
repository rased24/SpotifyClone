<?php

class Admin extends Controller
{
	private  $audioModel;

	public function __construct ()
	{
		$this->audioModel = $this->model( 'Audio' );
	}

	public function  addaudio()
	{
		$data = [
			'title'          => '',
			'album'          => '',
			'thumbnail'      => '',
			'url'            => '',
			'titleError'     => '',
			'albumError'     => '',
			'thumbnailError' => '',
			'urlError'       => '',

		];

		if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
		{

			$data = [
				'title'          => trim( $_POST[ 'title' ] ),
				'album'          => trim( $_POST[ 'album'] ),
				'thumbnail'      => trim( $_POST[ 'thumbnail' ] ),
				'url'            => filter_var( trim( $_POST[ 'url' ] ), FILTER_VALIDATE_URL ),
				'titleError'     => '',
				'albumError'     => '',
				'urlError'       => '',
			];

			//Validate title
			if ( empty( $data[ 'title' ] ) )
			{
				$data[ 'titleError' ] = 'Title can\'t be empty.';
			}

			//Validate album
			if ( empty( $data[ 'album' ] ) )
			{
				$data[ 'albumError' ] = 'Album can\'t be empty.';
			}

			//Validate url
			if ( empty( $data[ 'url' ] ) )
			{
				$data[ 'urlError' ] = 'Url can\'t be empty.';
			}
			elseif ( empty( $data[ 'thumbnail' ] ) )
			{
				$data[ 'urlError' ] = 'You must use Youtube Url.';
			}

			preg_match( '@https://i.ytimg.com/vi/(.*)/hqdefault.jpg@', $data[ 'thumbnail' ] , $test );

			$data[ 'yt_id' ] = $test[ 1 ];


			//Check if audio exists in database
			if ( $this->audioModel->findAudioBy( 'yt_id', $data[ 'yt_id' ] ) )
			{
				$data[ 'urlError' ] = 'This audio already exists in the site.';
			}



			//Check if all errors are empty
			if ( empty( $data[ 'titleError' ] ) && empty( $data[ 'albumError' ] ) && empty( $data[ 'urlError' ] ) )
			{
				$addedToDB = $this->audioModel->addAudio( $data );

				if ( $addedToDB )
				{
					header( 'location:' . URLROOT );
				}
				else
				{
					$data[ 'urlError' ] = 'Something went wrong.';
					$this->view( 'admin/addaudio', $data );
				}
			}
		}

		$this->view( 'admin/addaudio', $data );
	}
}