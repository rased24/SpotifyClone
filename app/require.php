<?php

// Require libraries form the folder libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
require_once 'libraries/Store.php';

//Require Helpers
require_once 'helpers/session_helper.php';

//Require configurations
require_once 'config/config.php';

//Creating a new Core object
$init = new Core();