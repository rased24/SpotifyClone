<?php

session_start();

function isLoggedIn()
{
	if ( isset( $_SESSION[ 'user_id' ] ) )
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}