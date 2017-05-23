<?php
use Illuminate\Http\Request;
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
Route::get('/abc', function(){

});
Route::get('/', function(){
	return view('layouts/main');
});
Route::get('/order', function(){
	return view('Order');
});
// Apis
Route::resource('/foodcategory', 'foodCategoryController');
Route::resource('/food', 'foodController');
Route::resource('/roleapi', 'roleController');
// Route::resource('/roleeditapi/', 'roleController@update');
// Route::resource('/getRole', 'roleController@index');






// // vai le banako
// Route::get('/register', function (){
//     return view('layouts/register');
// });
// Route::post('/register/ok', 'registerController@store');
// Route::get('/login', function (){
//     return view('layouts/login');
// });