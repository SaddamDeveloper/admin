<?php
/**
 * Frontentd
 */
require __DIR__.'/frontend.php';
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
    Route::get('/add/branch/','BranchController@addBranchForm')->name('admin.add_branch_form');
    /***
     * CRUD Branch
     */
    Route::post('add/branch/form', 'BranchesRegisterController@store')->name('admin.add.branch');
    
    /**
     * Restaurant Controller
     */
    Route::get('/restaurant/', 'RestaurantController@GetRestaurantList');
    Route::get('/all/list/restaurant/', 'RestaurantController@ajaxGetRestaurantList')->name('admin.ajax.restaurant_list');
    Route::get('/status/restaurant/{id}/{status}', 'RestaurantController@restaurantStatus')->name('admin.restaurant_status');
    Route::get('/edit/restaurant/{id}', 'RestaurantController@restaurantEdit')->name('admin.restaurant_edit');
    
    Route::get('/add/restaurant/', 'RestaurantController@addRestaurantForm')->name('admin.add.add_restaurant_form');
    
    /**
     * Restaurant Menu
     */
    Route::get('/status/restaurant/{id}', 'RestaurantController@manageMenu')->name('admin.restaurant_menu');
    Route::get('add/restaurant/menu/{restaurantId}', 'RestaurantController@addMenu')->name('admin.add.menu');
    Route::post('store/restaurant/menu', 'RestaurantController@storeMenu')->name('admin.store.menu');
    Route::post('update/restaurant/menu', 'RestaurantController@updateMenu')->name('admin.update.menu');
    Route::get('/all/menu/list/', 'RestaurantController@ajaxGetMenuList')->name('admin.ajax.menu_list');
    
    /***
     * CRUD Restaurant
     */
    
    Route::post('add/restaurant/form', 'RestaurantsRegisterController@store')->name('admin.add.restaurant');
    Route::post('update/restaurant/form', 'RestaurantController@updateRestaurant')->name('admin.update.restaurant');
    
    /**
     * Tax Configuration
     */
    Route::get('/tax', 'RestaurantController@tax')->name('admin.tax');
    Route::post('/add/tax', 'RestaurantController@addTax')->name('admin.add.tax');
    
    /**
     * State Configuration
     */
    Route::get('/state', 'RestaurantController@state')->name('admin.state');
    Route::post('/add/state', 'RestaurantController@addState')->name('admin.add.state');
    Route::get('/all/list/state/', 'RestaurantController@ajaxGetStateList')->name('admin.ajax.state_list');
    Route::get('/status/state/{id}/{status}', 'RestaurantController@stateStatus')->name('admin.state_status');

    /**
     * City Configuration
     */
    Route::get('/city', 'RestaurantController@city')->name('admin.city');
    Route::post('/add/city', 'RestaurantController@addCity')->name('admin.add.city');
    Route::get('/all/list/city/', 'RestaurantController@ajaxGetCityList')->name('admin.ajax.city_list');
    Route::get('/status/city/{id}/{status}', 'RestaurantController@cityStatus')->name('admin.city_status');
    
});


