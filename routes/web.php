<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\Logout;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\Employee\Employeepro;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\Hardware\Addhardware;
use App\Http\Controllers\ict_equipment\Searchemp;
use App\Http\Controllers\Operations\Operationprocesses;
use App\Http\Controllers\Project\getprojdata;
use App\Http\Controllers\Project\projectprocess;
use App\Http\Controllers\Software\Softwareproccess;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\tables\Ncpty;
use App\Models\my\Software;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics')->middleware('auth');

//tables
Route::get('/ncpty', [Ncpty::class, 'ncptyDisplay'])->name('ncpty');

//Ict_equipment
Route::get('/add-hardware', [Addhardware::class, 'addinput'])->name('icte');
Route::post('/addinghardware', [Addhardware::class, 'addinginput']);

//project
Route::get('/createproj', [projectprocess::class, 'addproject'])->name('createproj');
Route::post('/creatingproj', [projectprocess::class, 'addingproject']);
Route::get('/updateproj', [projectprocess::class, 'updateproject'])->name('updateproj');
Route::post('/deleteproj', [projectprocess::class, 'deleteproject']);
Route::post('/getdata', [getprojdata::class, 'getdata']);
Route::post('/editingproj', [projectprocess::class, 'editingproj']);
Route::post('/search-external-funds', [projectprocess::class, 'searchExfunds'])->name('search-external-funds');
Route::post('/search-internal-funds', [projectprocess::class, 'searchInfunds'])->name('search-internal-funds');
Route::post('/createproj/employee/search-employee', [projectprocess::class, 'searchEmployee']);
Route::post('/createproj/training-services/search-training-services', [projectprocess::class, 'searchTrainingServices']);
Route::post('/createproj/frontline-services/search-frontline-services', [projectprocess::class, 'searchFrontlineServices']);
Route::post('/createproj/hardware/add-hardware', [projectprocess::class, 'addHardware']);
Route::post('/project/display-hardwares', [projectprocess::class, 'displayHardwares']);
Route::post('/project/display-softwares', [projectprocess::class, 'displaySoftwares']);
Route::post('/project/get-hardware-info', [projectprocess::class, 'getHardwareInfo']);
Route::post('/project/edit-hardware', [projectprocess::class, 'updateHardware']);
Route::post('/project/delete-hardware', [projectprocess::class, 'deleteHardware']);
Route::post('/project/get-software-info', [projectprocess::class, 'getSoftwareInfo']);
Route::post('/project/edit-software', [projectprocess::class, 'updateSoftware']);
Route::post('/project/delete-software', [projectprocess::class, 'deleteSoftware']);
Route::post('/updateproj/search-hardware', [projectprocess::class, 'searchHardware']);
Route::post('/updateproj/search-software', [projectprocess::class, 'searchSoftware']);

//Software
Route::get('/addsoft', [Softwareproccess::class, 'addSoftware'])->name('addsoft');
Route::post('/addingsoft', [Softwareproccess::class, 'addingSoftware']);
Route::get('/updatesoft', [Softwareproccess::class, 'updateSoftware'])->name('updatesoft');
Route::post('/deletesoft', [Softwareproccess::class, 'deleteSoftware']);
Route::post('/getsoftinfo', [Softwareproccess::class, 'getsoftinfo']);
Route::post('/updatingsoft', [Softwareproccess::class, 'updatingsoftware']);
Route::post('/software/search-software', [Softwareproccess::class, 'searchSoftware']);

//operations
Route::get('/update-operations', [Operationprocesses::class, 'updateOperation'])->name('Update-operations');
Route::get('/add-services-employees', [Operationprocesses::class, 'addServicesandEmployees'])->name('add-services-employees');
Route::post('/training-services/add-training-services', [Operationprocesses::class, 'addTrainingServices']);
Route::post('/employee/add-employee', [Operationprocesses::class, 'addEmployee']);
Route::post('/frontline-servies/add-frontline-services', [Operationprocesses::class, 'addFrontlineServices']);


//employee
Route::get('/addemp', [Employeepro::class, 'addEmployee'])->name('addemp');
Route::post('/addingemp', [Employeepro::class, 'addingEmployee']);
Route::post('/employee/update-employee', [Operationprocesses::class, 'updateEmployee']);


Route::post('/deleteemp', [Employeepro::class, 'deleteEmployee']);
Route::post('/employee/get-employee-information', [Employeepro::class, 'getData']);
Route::post('/employee/search-employee', [Operationprocesses::class, 'searchEmployee']);

//training-services
Route::post('/training-services/get-training-services-information', [Operationprocesses::class, 'getTrainingServicesData']);
Route::post('/training-services/delete-training-service-information', [Operationprocesses::class, 'deleteTrainingServices']);
Route::post('/training-services/search-training-services-information', [Operationprocesses::class, 'searchTrainingServices']);
Route::post('/training-services/update-training-services', [Operationprocesses::class, 'updateTrainingServices']);
// Route::get('/add-training-services', [Operationprocesses::class, 'addTrainingServices'])->name('add-training-services');

//frontline-services
Route::post('/frontline-services/get-fronline-services-data', [Operationprocesses::class, 'getFrontlineServicesData']);
Route::post('/frontline-services/search-frontline-services', [Operationprocesses::class, 'searchFrontlineServices']);
Route::post('/frontline-services/delete-frontline-service-information', [Operationprocesses::class, 'deleteFrontlineServices']);
Route::post('/frontline-services/update-frontline-services', [Operationprocesses::class, 'updateFrontlineServicese']);

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::post('/auth/login', [LoginBasic::class, 'loginpro']);
Route::get('/logout', [Logout::class, 'logout'])->name('logout');

Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
