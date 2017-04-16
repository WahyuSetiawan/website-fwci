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
| If you do not want to allow access via that route you should add:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['user'] = "";
//$route['user/(:any)'] = "";
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
$route['user'] = "user/index";
$route['user/get_data'] = "user/get_data";
$route['user/add'] = "user/add";
$route['user/update'] = "user/update";
$route['user/delete'] = "user/delete";
$route['user/isUsernameAvailable'] = "user/isUsernameAvailable";
$route['user/isEmailAvailable'] = "user/isEmailAvailable";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['user/user'] = "user/index";
$route['user/user/get_data'] = "user/get_data";
$route['user/user/add'] = "user/add";
$route['user/user/update'] = "user/update";
$route['user/user/delete'] = "user/delete";
$route['user/user/isUsernameAvailable'] = "user/isUsernameAvailable";
$route['user/user/isEmailAvailable'] = "user/isEmailAvailable";

