<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['vesti/napravi'] = 'posts/create';
$route['vesti/azuriraj'] = 'posts/update';
$route['vesti/azuriraj/(:any)'] = 'posts/edit/$1';
$route['vesti/delete/(:any)'] = 'posts/delete/$1';
$route['vesti/(:any)'] = 'posts/view/$1';
$route['vesti'] = 'posts/index';

$route['kategorije/napravi'] = 'categories/create';
$route['kategorije'] = 'categories/index';
$route['kategorije/delete/(:any)'] = 'categories/delete/$1';
$route['kategorije/(:any)'] = 'categories/posts/$1';

$route['login'] = 'users/login';
$route['logout'] = 'users/logout';

// pagination

$route['page/(:any)'] = 'pages/page/$1';




// $route['default_controller'] = 'welcome';

// we are going to change default controler to pages/view

$route['default_controller'] = 'pages/view';

// stranice u izradi

$route['menadzment-tehnologije-i-razvoja'] = 'pages/invalid/mtr';
$route['eramus-i-literature'] = 'pages/invalid/eramus';
$route['managment-of-technology-and-development'] = 'pages/invalid/mtreng';
$route['master-studije'] = 'pages/invalid/master';
$route['kodeks-ponasanja-komunikacije-i-oblacenja'] = 'pages/invalid/kodeks';
$route['apa-uputstvo'] = 'pages/invalid/apa';
$route['razvoj-malih-i-srednjih-preduzeca'] = 'pages/invalid/rmisp';
$route['menadzment-tehnoloskih-operacija'] = 'pages/invalid/mto';
$route['tehnoloska-strategija'] = 'pages/invalid/ts';
$route['nastavnici'] = 'pages/invalid/nastavnici';

// :any - anything we go to, mtr/anything is gonna go to pages/view
// and if we don't set anything it will go to home since we set home
// default in our controler Pages
// $1 represents anything

$route['(:any)'] = 'pages/view/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
