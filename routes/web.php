<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'AdminController@dashboard');
Route::any('/register', 'AdminController@register');
Route::any('/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::any('/register/add', 'AdminController@add_register');
Route::any('/admin/add', 'AdminController@add_admin');
Route::any('/seller/add', 'AdminController@add_seller');
Route::any('/brand/add', 'AdminController@add_brand');
Route::any('/category/add', 'AdminController@add_category');
Route::any('/product/add', 'AdminController@add_product');

Route::any('/register/view', 'AdminController@view_register');
Route::any('/admin/view', 'AdminController@view_admin');
Route::any('/seller/view', 'AdminController@view_seller');
Route::any('/brand/view', 'AdminController@view_brand');
Route::any('/category/view', 'AdminController@view_category');
Route::any('/product/view', 'AdminController@view_product');

Route::any('/register/update/{id}', 'AdminController@update_register');
Route::any('/admin/update/{id}', 'AdminController@update_admin');
Route::any('/seller/update/{id}', 'AdminController@update_seller');
Route::any('/brand/update/{id}', 'AdminController@update_brand');
Route::any('/category/update/{id}', 'AdminController@update_category');
Route::any('/product/update/{id}', 'AdminController@update_product');

Route::any('/register/delete/{id}', 'AdminController@delete_register');
Route::any('/admin/delete/{id}', 'AdminController@delete_admin');
Route::any('/seller/delete/{id}', 'AdminController@delete_seller');
Route::any('/brand/delete/{id}', 'AdminController@delete_brand');
Route::any('/category/delete/{id}', 'AdminController@delete_category');
Route::any('/product/delete/{id}', 'AdminController@delete_product');

Route::any('/ajax-update-register-status', 'AdminController@ajax_update_register_status');