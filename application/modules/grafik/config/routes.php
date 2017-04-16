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
$route['garfik'] = "";
//$route['grafik/(:any)'] = "";
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
$route['grafik'] = "grafik/index";
$route['grafik/area'] = "grafik/area";
$route['grafik/bar'] = "grafik/bar";
$route['grafik/pie'] = "grafik/pie";
$route['grafik/combination'] = "grafik/combination";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['grafik/grafik'] = "grafik/index";
$route['grafik/grafik/area'] = "grafik/area";
$route['grafik/grafik/bar'] = "grafik/bar";
$route['grafik/grafik/pie'] = "grafik/pie";
$route['grafik/grafik/combination'] = "grafik/combination";