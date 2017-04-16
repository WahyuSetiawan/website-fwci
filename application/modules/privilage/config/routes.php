<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Remove the default route set by the module extensions
|--------------------------------------------------------------------------
|
| Normally by default this route is accepted:
|
| module/controller/method
|
| If you do not want to allow access via that route you should setting:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['privilage'] = "";
//$route['privilage/(:any)'] = "";
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
$route['privilage'] = "privilage/index";
$route['privilage/get_data'] = "privilage/get_data";
$route['privilage/setting'] = "privilage/setting";
$route['privilage/save'] = "privilage/save";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['privilage/privilage'] = "privilage/index";
$route['privilage/privilage/get_data'] = "privilage/get_data";
$route['privilage/privilage/setting'] = "privilage/setting";
$route['privilage/privilage/save'] = "privilage/save";
