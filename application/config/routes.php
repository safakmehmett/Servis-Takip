<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = 'home/NothingFound';
$route['translate_uri_dashes'] = FALSE;

$route['formsorgu'] = 'home/formsorgu';
$route['formsorgu/(:any)']= 'home/formsorgu/$1';
$route['newquery'] = 'servis/newquery';
$route['cihazdurum'] = 'servis/cihazdurum';
$route['cihazdurum/(:any)']= 'servis/cihazdurum/$1';