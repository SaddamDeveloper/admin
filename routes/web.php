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

/***
 * Admin Control
 */
Route::get('/admin/login', 'Admin\AdminLoginController@showAdminLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\AdminLoginController@adminLogin');
Route::post('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware'=>'auth:admin','prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
    Route::get('/branch', 'AdminDashboardController@showAdminBranch')->name('admin.add_branch');
    
    /***
     * Branch Controller From Admin
     */
    Route::get('/list/branch/','BranchController@ajaxGetBranchList')->name('admin.ajax.branch_list');
    Route::get('/add/branch/','BranchController@addBranchForm')->name('admin.add_branch');
});


