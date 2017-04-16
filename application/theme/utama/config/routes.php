<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Remove the utama route set by the module extensions
|--------------------------------------------------------------------------
|
| Normally by utama this route is accepted:
|
| module/controller/method
|
| If you do not want to allow access via that route you should add:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['utama'] = "";
//$route['utama/(:any)'] = "";
/*
|--------------------------------------------------------------------------
| Routes to accept
|--------------------------------------------------------------------------
|
| Map all of your valid module routes here such as:
|
| $route['your/custom/route'] = "controller/method";
|
*/
$route['utama'] = "utama/index";

// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['utama/utama'] = "utama/index";