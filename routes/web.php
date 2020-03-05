<?php

use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', 'PagesController@index')->name('home');

// Auth
Auth::routes();

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::prefix('admin')->name('admin.')->group(function () {

    Route::post('/menu', 'MenuController@update');

    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', 'AdminProductsController@index')->name('index');
        Route::get('/create', 'AdminProductsController@create')->name('create');
        Route::post('/create', 'AdminProductsController@store')->name('store');
        Route::get('/{product}', 'AdminProductsController@show')->name('show');
        Route::get('/{product}/images', 'AdminProductsController@images')->name('images');
        Route::post('/{product}/images', 'AdminProductsController@storeimages')->name('storeimages');
        Route::post('/{product}/images/{image}/delete', 'AdminProductsController@deleteimage')->name('deleteimage');
        Route::get('/{product}/edit', 'AdminProductsController@edit')->name('edit');
        Route::post('/{product}/edit', 'AdminProductsController@update')->name('update');
        Route::get('/{product}/delete', 'AdminProductsController@confirmdelete')->name('confirmdelete');
        Route::post('/{product}/delete', 'AdminProductsController@delete')->name('delete');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'AdminUsersController@index')->name('index');
        Route::get('/create', 'AdminUsersController@create')->name('create');
        Route::post('/create', 'AdminUsersController@store')->name('store');
        Route::get('/{user}', 'AdminUsersController@show')->name('show');
        Route::get('/{user}/edit', 'AdminUsersController@edit')->name('edit');
        Route::post('/{user}/edit', 'AdminUsersController@update')->name('update');
        Route::get('/{user}/delete', 'AdminUsersController@confirmdelete')->name('confirmdelete');
        Route::post('/{user}/delete', 'AdminUsersController@delete')->name('delete');
    });
});