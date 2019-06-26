<?php
/**
 * Start session if not already started
 */
if(!isset($_SESSION)) session_start();

//load environment variable
require_once __DIR__ . '/../app/config/_env.php';

//instantiate database class
new \App\classes\Database();

//set custom error handler

set_error_handler([new \App\classes\ErrorHandler(), 'hendleErrors']);


require_once __DIR__ . '/../app/routing/routes.php';

new App\RouteDispatcher($router);



