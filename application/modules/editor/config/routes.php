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
$route['editor'] = "";
//$route['editor/(:any)'] = "";
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
$route['tinymce'] = "editor/index";
$route['ckeditor'] = "editor/ckeditor";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['editor/editor'] = "editor/index";
$route['editor/editor/ckeditor'] = "editor/ckeditor";

