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

Route::get('/admin', function () {
            return view('layouts/main');
        })->where('vue_capture', '[\/\w\.-]*');

// Route::get('/', function () {
//             return view('Order');
//         })->where('vue_capture', '[\/\w\.-]*');

Route::get('/', function(){
	return view('Order');
});	


// Apis
Route::resource('/foodcategory', 'foodCategoryController');
Route::resource('/food', 'foodController');