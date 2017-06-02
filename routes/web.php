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
Auth::routes();
// admin Login
Route::prefix('/admin')->group(function(){
	Route::get('/login', 'Auth\employeeLoginController@showEmployeeLogin')->name('admin.login');
	Route::post('/login', 'Auth\employeeLoginController@employeeLogin')->name('admin.login.submit');
	Route::get('/logout', 'Auth\employeeLoginController@logout')->name('admin.logout');
});
Route::get('/admin/dashboard', function(){
	return view('layouts/main');
})->name('admin.dashboard');	
// Route::get('/', function(){
// 	return view('auth/adminLogin');
// });
Route::get('/order', function(){
	return view('Order');
});
// Apis
Route::resource('/foodcategory', 'foodCategoryController');
Route::resource('/food', 'foodController');
Route::resource('/roleapi', 'roleController');
Route::resource('/employeeapi', 'employeeController');
Route::resource('/emprolepivotapi', 'employeeRoleController');
Route::get('/create', 'employeeRoleController@store');
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
