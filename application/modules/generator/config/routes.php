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
| If you do not want to allow access via that route you should hasil:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['generator'] = "";
//$route['generator/(:any)'] = "";
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
$route['generator'] = "generator/index";
$route['generator/tabelinduk'] = "generator/tabelinduk";
$route['generator/hasil'] = "generator/hasil";
$route['generator/tes'] = "generator/tes";
$route['generator/crud'] = "generator/crud";
$route['generator/crudhasil'] = "generator/crudhasil";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['generator/generator'] = "generator/index";
$route['generator/generator/tabelinduk'] = "generator/tabelinduk";
$route['generator/generator/hasil'] = "generator/hasil";
$route['generator/generator/tes'] = "generator/tes";
$route['generator/generator/crud'] = "generator/crud";
$route['generator/generator/crudhasil'] = "generator/crudhasil";