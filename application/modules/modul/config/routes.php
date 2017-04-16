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
$route['modul'] = "";
//$route['modul/(:any)'] = "";
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
$route['modul'] = "modul/index";
$route['modul/get_data'] = "modul/get_data";
$route['modul/add'] = "modul/add";
$route['modul/delete'] = "modul/delete";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['modul/modul'] = "modul/index";
$route['modul/modul/get_data'] = "modul/get_data";
$route['modul/modul/add'] = "modul/add";
$route['modul/modul/delete'] = "modul/delete";