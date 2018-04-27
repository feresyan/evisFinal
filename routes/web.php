<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','AuthController@login')->name('login')->middleware('guest');
Route::post('/postLogin','AuthController@postLogin')->name('post.Login');
Route::get('/logout','AuthController@logout')->name('logout');
// Route::get('/register','AuthController@register')->name('register');
// Route::post('/postRegister','AuthController@postRegister')->name('post.Register');

// --- ADMIN ---
// VIOLATION
Route::get('/admin-dashboard','AdminController@adminDashboard')->name('admin.dashboard');
Route::get('/admin-dashboard/violation','AdminController@indexViolation')->name('violation.index');
Route::get('/admin-dashboard/violation/create','AdminController@createViolationList')->name('violation.create');
Route::post('/admin-dashboard/violation/create','AdminController@storeViolationList')->name('violation.store');
Route::get('/admin-dashboard/violation/{id}','AdminController@showViolation')->name('violation.show');
Route::get('/admin-dashboard/violation/{id}/edit','AdminController@editViolationList')->name('violation.edit');
Route::put('/admin-dashboard/violation/{id}/edit','AdminController@updateViolationList')->name('violation.update');
Route::delete('/admin-dashboard/violation/{id}/delete','AdminController@destroyViolationList')->name('violation.destroy');

// EMPLOYEE VIOLATION
Route::get('/admin-dashboard/employee-violation','AdminController@indexEmployeeViolation')->name('employee.violation.index');
Route::get('/admin-dashboard/employee-violation/create','AdminController@createEmployeeViolation')->name('employee.violation.create');
Route::get('/admin-dashboard/employee-violation/create/find-employee-name','AdminController@findEmployeeName')->name('findEmployeeName');
Route::post('/admin-dashboard/employee-violation/create','AdminController@storeEmployeeViolation')->name('employee.violation.store');
Route::get('/admin-dashboard/employee-violation/{id}','AdminController@showEmployeeViolation')->name('employee.violation.show');
// Route::get('/admin-dashboard/employee-violation/{id}/edit','AdminController@editEmployeeViolation')->name('employee.violation.edit');
// Route::put('/admin-dashboard/employee-violation/{id}/edit','AdminController@updateEmployeeViolation')->name('employee.violation.update');
Route::delete('/admin-dashboard/employee-violation/{id}/delete','AdminController@destroyEmployeeViolation')->name('employee.violation.destroy');

// SANCTION
// Route::get('/admin-dashboard/sanction','AdminController@indexSanction')->name('sanction.index');
// Route::get('/admin-dashboard/sanction/create','AdminController@createSanctionList')->name('sanction.create');
// Route::post('/admin-dashboard/sanction/create','AdminController@storeSanctionList')->name('sanction.store');
// Route::get('/admin-dashboard/sanction/{id}','AdminController@showSanction')->name('sanction.show');
// Route::get('/admin-dashboard/sanction/{id}/edit','AdminController@editSanctionList')->name('sanction.edit');
// Route::put('/admin-dashboard/sanction/{id}/edit','AdminController@updateSanctionList')->name('sanction.update');
// Route::delete('/admin-dashboard/sanction/{id}/delete','AdminController@destroySanctionList')->name('sanction.destroy');

// EMPLOYEE SANCTION
Route::get('/admin-dashboard/employee-sanction','AdminController@indexEmployeeSanction')->name('employee.sanction.index');
// Route::get('/admin-dashboard/employee-sanction/create','AdminController@createEmployeeSanction')->name('employee.sanction.create');
// Route::post('/admin-dashboard/employee-violation/create','AdminController@storeEmployeeViolation')->name('employee.violation.store');
// Route::get('/admin-dashboard/employee-sanction/{id}','AdminController@showEmployeeSanction')->name('employee.sanction.show');
// Route::get('/admin-dashboard/employee-violation/{id}/edit','AdminController@editEmployeeViolation')->name('employee.violation.edit');
// Route::put('/admin-dashboard/employee-violation/{id}/edit','AdminController@updateEmployeeViolation')->name('employee.violation.update');
// Route::delete('/admin-dashboard/employee-sanction/{id}/delete','AdminController@destroyEmployeeSanction')->name('employee.sanction.destroy');

// EMPLOYEE LAYOFFS
Route::get('/admin-dashboard/employee-layoffs','AdminController@indexEmployeeLayoffs')->name('employee.layoffs.index');

// --- MANAGER ---
Route::get('/manager-dashboard','ManagerController@managerDashboard')->name('manager.dashboard');
Route::get('/manager-dashboard/employee-violation','ManagerController@indexEmployeeViolation')->name('manager.employee.violation.index');
Route::get('/manager-dashboard/employee-sanction','ManagerController@indexEmployeeSanction')->name('manager.employee.sanction.index');
Route::put('/manager-dashboard/employee-sanction/{id}','ManagerController@accSanctionEmployee')->name('manager.employee.sanction.acc');
Route::get('/manager-dashboard/employee-layoffs','ManagerController@indexEmployeeLayoffs')->name('manager.employee.layoffs.index');

// --- EXECUTIVE ---
Route::get('/executive-dashboard','ExecutiveController@executiveDashboard')->name('executive.dashboard');
Route::get('/executive-dashboard/employee-violation','ExecutiveController@indexEmployeeViolation')->name('executive.employee.violation.index');
Route::get('/executive-dashboard/employee-sanction','ExecutiveController@indexEmployeeSanction')->name('executive.employee.sanction.index');
Route::get('/executive-dashboard/employee-layoffs','ExecutiveController@indexEmployeeLayoffs')->name('executive.employee.layoffs.index');