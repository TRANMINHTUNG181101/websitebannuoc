<?php

use App\Models\Order_statisticals;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you cay the RouteServiceProvider within a group which
| contains the "wn register web routes for your application. These
| routes are loaded beb" middleware group. Now create something great!
|
*/

Route::get('admin','DashboardController@show')->name('d');

//nguyen lieu
Route::get('admin/nguyen-lieu','MaterialController@show')->name('showMaterial');
Route::get('/admin/nguyen-lieu-ajax','MaterialController@showMalAjax');
Route::post('/admin/xoa-nguyen-lieu-ajax/{id}','MaterialController@delMalAjax');

Route::get('admin/sua-nguyen-lieu/{slug}','MaterialController@editMaterialView')->name('material.editview');
Route::post('admin/sua-nguyen-lieu/{id}','MaterialController@updateMaterial')->name('material.edithandle');
Route::get('admin/them-nguyen-lieu','MaterialController@addMaterialView')->name('material.addview');
Route::post('admin/them-nguyen-lieu','MaterialController@addMaterialHandle')->name('material.addhandle');
Route::get('admin/xoa-nguyen-lieu/{id}','MaterialController@delMaterial')->name('material.delete');
Route::post('admin/tim-kiem/','MaterialController@searchMaterial')->name('material.search');

//san pham
Route::get('admin/san-pham','ProductController@show')->name('products.show');
Route::get('admin/them-san-pham','ProductController@addProductView')->name('products.addview');
Route::post('admin/them-san-pham','ProductController@addProductHandle')->name('products.addhandle');
Route::get('admin/sua-san-pham/{slug}','ProductController@editProductView')->name('products.editview');
Route::post('admin/sua-san-pham/{id}','ProductController@updateProduct')->name('products.edithandle');

//auth
// Route::get('/register','RegisterController@showFormRegister')->name('auth.register');
// Route::post('/register','RegisterController@postRegister')->name('authregister');
// Route::post('/login','LoginController@postLogin')->name('authlogin');
// Route::get('/login','LoginController@getLogin')->name('auth.login');
// Route::get('/logout','LoginController@logout')->name('auth.logout');

Route::get('/fetchData','ProductController@sendData');
Route::get('/admin/them-nguyen-lieu-ajax','MaterialController@addMaterialViewAjax');
Route::post('/admin/them-nguyen-lieu-ajax1','MaterialController@addMaterialHandleAjax');






