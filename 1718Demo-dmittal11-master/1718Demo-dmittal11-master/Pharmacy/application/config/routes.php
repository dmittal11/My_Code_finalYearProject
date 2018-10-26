<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['php_info'] = 'admin/DashboardController/php_info';
$route['404_override'] = 'MyCustom404Ctrl';
$route['translate_uri_dashes'] = FALSE;

//********** Admin Front Controller **************////////
$route['admin/register'] = 'admin/AdminController/register';
$route['admin'] = 'admin/AdminController/login';
//********** Admin Front Controller **************////////

//********** Admin Front Dashboard **************////////
$route['admin/logout'] = 'admin/DashboardController/logout';
$route['admin/dashboard'] = 'admin/DashboardController';
$route['admin/userlist'] = 'admin/DashboardController/userlist';
$route['admin/adduser'] = 'admin/DashboardController/adduser';
$route['admin/updateprofile'] = 'admin/DashboardController/updateprofile';
$route['admin/updateprofile/:num'] = 'admin/DashboardController/updateprofile';
$route['admin/getsearchuser'] = 'admin/DashboardController/getsearchuser';
$route['admin/managedrepeat'] = 'admin/DashboardController/managedrepeat';
$route['admin/patientforcollection'] = 'admin/DashboardController/patientforcollection';
$route['admin/patientfordelivery'] = 'admin/DashboardController/patientfordelivery';
$route['admin/contactbook'] = 'admin/DashboardController/contactbook';
$route['admin/viewmedication/:num'] = 'admin/DashboardController/viewmedication';
//********** Admin Front Dashboard **************////////


//****  Ajax Request ****////
$route['admin/delete_record'] = 'admin/DashboardController/delete_record';
$route['admin/update_status'] = 'admin/DashboardController/update_status';
$route['admin/soft_delete_record'] = 'admin/DashboardController/soft_delete_record';

//****  Ajax Request ****////


//********** User Front Controller **************////////
$route['default_controller'] = 'front';
$route['facebook'] = 'front/facebook';
$route['gmail'] = 'front/gmail';
$route['forgot'] = 'front/forgot';
$route['forgot_success'] = 'front/forgot_success';
$route['resetpassword'] = 'front/resetpassword';
$route['registration'] = 'front/registration';
//********** User Front Controller **************////////

//********** User  Dashboard **************////////
$route['dashboard'] = 'UserController';
$route['updateprofile'] = 'UserController/updateprofile';
$route['updateprofile/:num'] = 'UserController/updateprofile';
$route['logout'] = 'UserController/logout';
//********** User  Dashboard **************////////

$route['patients'] = 'UserController/patients';
$route['patients/:num'] = 'UserController/patients';
$route['addpatients'] = 'UserController/addpatients';
$route['addpatients/:num'] = 'UserController/addpatients';
$route['updatepatient'] = 'UserController/updatepatient';
$route['updatepatient/:num'] = 'UserController/updatepatient';
$route['medication'] = 'UserController/medication';
$route['medication/:num'] = 'UserController/medication';
$route['addmedication'] = 'UserController/addmedication';
$route['addmedication/:num'] = 'UserController/addmedication';
$route['updatemedication'] = 'UserController/updatemedication';
$route['updatemedication/:num'] = 'UserController/updatemedication';
$route['mymedication'] = 'UserController/mymedication';
$route['mymedication/:num'] = 'UserController/mymedication';
$route['druginteraction'] = 'UserController/druginteraction';
$route['managedrepeat'] = 'UserController/managedrepeat';
$route['patientforcollection'] = 'UserController/patientforcollection';
$route['patientfordelivery'] = 'UserController/patientfordelivery';
$route['contactbook'] = 'UserController/contactbook';
$route['diary'] = 'UserController/diary';
$route['views'] = 'UserController/views';
$route['history'] = 'UserController/history';
$route['addmymedication'] = 'UserController/addmymedication';
$route['updatemymedication/:num'] = 'UserController/updatemymedication';
$route['viewmedication/:num'] = 'UserController/viewmedication';
$route['getsearchuser'] = 'UserController/getsearchuser';
$route['medicationforcollect'] = 'UserController/medicationforcollect';
$route['medicationfordelivery'] = 'UserController/medicationfordelivery';
$route['medicationstock'] = 'UserController/medicationstock';




//****  Ajax Request ****////
$route['delete_record'] = 'UserController/delete_record';
$route['updatemeditatus'] = 'UserController/updatemeditatus';
$route['update_managed_repeat'] = 'UserController/update_managed_repeat';
