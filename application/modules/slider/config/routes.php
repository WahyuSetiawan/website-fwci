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
| If you do not want to allow access via that route you should logout:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['slider'] = "";
//$route['login/(:any)'] = "";
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
$route['flexslider'] = "flexslider/index";
$route['flexslider/thumbnail_controlnav'] = "flexslider/thumbnail_controlnav";
$route['flexslider/carousel_minmax'] = "flexslider/carousel_minmax";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['flexslider/flexslider'] = "flexslider/index";
$route['flexslider/flexslider/thumbnail_controlnav'] = "flexslider/thumbnail_controlnav";
$route['flexslider/flexslider/carousel_minmax'] = "flexslider/carousel_minmax";
