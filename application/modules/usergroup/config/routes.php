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
$route['usergroup'] = "";
//$route['usergroup/(:any)'] = "";
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
$route['usergroup'] = "usergroup/index";
$route['usergroup/get_data'] = "usergroup/get_data";
$route['usergroup/add'] = "usergroup/add";
$route['usergroup/update'] = "usergroup/update";
$route['usergroup/delete'] = "usergroup/delete";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['usergroup/usergroup'] = "usergroup/index";
$route['usergroup/usergroup/get_data'] = "usergroup/get_data";
$route['usergroup/usergroup/add'] = "usergroup/add";
$route['usergroup/usergroup/update'] = "usergroup/update";
$route['usergroup/usergroup/delete'] = "usergroup/delete";