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

Route::get('/', 'ServicesFrontendIndexController@index')->name('index');
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('', 'ContactController@store')->name('store');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('backend.index');
    })->name('dashboard');

    // Slide show
    Route::prefix('slide-show')->name('slide_show.')->group(function () {
        Route::get('/', 'SlideShowController@index')->name('index');
        Route::get('create', 'SlideShowController@create')->name('create');
        Route::post('store', 'SlideShowController@store')->name('store');
        Route::get('edit/{id}', 'SlideShowController@edit')->name('edit');
        Route::put('update', 'SlideShowController@update')->name('update');
        Route::delete('delete/{id}', 'SlideShowController@destroy')->name('delete');
    });

    // Mission
    Route::prefix('mission')->name('mission.')->group(function () {
        Route::get('/', 'MissionController@index')->name('index');
        Route::get('create', 'MissionController@create')->name('create');
        Route::post('store', 'MissionController@store')->name('store');
        Route::get('edit/{id}', 'MissionController@edit')->name('edit');
        Route::put('update', 'MissionController@update')->name('update');
        Route::delete('delete/{id}', 'MissionController@destroy')->name('delete');
    });

    // Service
    Route::prefix('service')->name('service.')->group(function () {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('create', 'ServiceController@create')->name('create');
        Route::post('store', 'ServiceController@store')->name('store');
        Route::get('edit/{id}', 'ServiceController@edit')->name('edit');
        Route::put('update', 'ServiceController@update')->name('update');
        Route::delete('delete/{id}', 'ServiceController@destroy')->name('delete');
    });
    
    // Gallerry
    Route::prefix('gallerry')->name('gallerry.')->group(function () {
        Route::get('/', 'ImageActiveController@index')->name('index');
        Route::get('create', 'ImageActiveController@create')->name('create');
        Route::post('store', 'ImageActiveController@store')->name('store');
        Route::get('edit/{id}', 'ImageActiveController@edit')->name('edit');
        Route::put('update', 'ImageActiveController@update')->name('update');
        Route::delete('delete/{id}', 'ImageActiveController@destroy')->name('delete');
    });

    // Product type
    Route::prefix('product-type')->name('product_type.')->group(function () {
        Route::get('/', 'ProductTypeController@index')->name('index');
        Route::get('create', 'ProductTypeController@create')->name('create');
        Route::post('store', 'ProductTypeController@store')->name('store');
        Route::get('edit/{id}', 'ProductTypeController@edit')->name('edit');
        Route::put('update', 'ProductTypeController@update')->name('update');
        Route::delete('delete/{id}', 'ProductTypeController@destroy')->name('delete');
    });

    // Product type specification
    Route::prefix('product-type-specification')->name('product_type_specification.')->group(function () {
        Route::get('/', 'ProductTypeSpecificationController@index')->name('index');
        Route::get('create', 'ProductTypeSpecificationController@create')->name('create');
        Route::post('store', 'ProductTypeSpecificationController@store')->name('store');
        Route::get('edit/{id}', 'ProductTypeSpecificationController@edit')->name('edit');
        Route::put('update', 'ProductTypeSpecificationController@update')->name('update');
        Route::delete('delete/{id}', 'ProductTypeSpecificationController@destroy')->name('delete');
    });

    // Supplier
    Route::prefix('supplier')->name('supplier.')->group(function () {
        Route::get('/', 'SupplierController@index')->name('index');
        Route::get('create', 'SupplierController@create')->name('create');
        Route::post('store', 'SupplierController@store')->name('store');
        Route::get('edit/{id}', 'SupplierController@edit')->name('edit');
        Route::put('update', 'SupplierController@update')->name('update');
        Route::delete('delete/{id}', 'SupplierController@destroy')->name('delete');
    });

    // Green bean coffee type
    Route::prefix('green-bean-coffee-type')->name('green_bean_coffee_type.')->group(function () {
        Route::get('/', 'GreenBeanCoffeeTypeController@index')->name('index');
        Route::get('create', 'GreenBeanCoffeeTypeController@create')->name('create');
        Route::post('store', 'GreenBeanCoffeeTypeController@store')->name('store');
        Route::get('edit/{id}', 'GreenBeanCoffeeTypeController@edit')->name('edit');
        Route::put('update', 'GreenBeanCoffeeTypeController@update')->name('update');
        Route::delete('delete/{id}', 'GreenBeanCoffeeTypeController@destroy')->name('delete');
    });

    // Green bean coffee import
    Route::prefix('green-bean-coffee-import')->name('green_bean_coffee_import.')->group(function () {
        Route::get('/', 'GreenBeanCoffeeImportController@index')->name('index');
        Route::get('create', 'GreenBeanCoffeeImportController@create')->name('create');
        Route::post('store', 'GreenBeanCoffeeImportController@store')->name('store');
        Route::get('edit/{id}', 'GreenBeanCoffeeImportController@edit')->name('edit');
        Route::put('update', 'GreenBeanCoffeeImportController@update')->name('update');
        Route::delete('delete/{id}', 'GreenBeanCoffeeImportController@destroy')->name('delete');
    });
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
