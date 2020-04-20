<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
    This route for frontend
*/
require APPPATH . '/routes/front.php';


/*
    This route for admin
*/
require APPPATH . '/routes/admin.php';

$route['api/v1/search/model'] = 'ApiController/searchModel';
$route['api/v1/filter/model'] = 'ApiController/filterModel';
$route['api/v1/performer/contents'] = 'ApiController/contents';
///$route['search'] = 'Home/search';