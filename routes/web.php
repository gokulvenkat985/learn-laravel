
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','UsersController@index');

Auth::routes();

Route::get('/home', 'UsersController@index')->name('home');

Route::post('UsersController/fetch','UsersController@fetch')->name('searchlocation.fetch');

Route::post('UsersController/cities','UsersController@cities')->name('state.cities');
Route::post('UsersController/retrive','UsersController@retrive')->name('maincategories.retrive');

Route::get('/viewads/{maincategory}/{id}','UsersController@viewads');

Route::post('/product/search','UsersController@productsearch');

Route::post('/search/add','UsersController@searchadd');

//post add route:
Route::get('/postadd','UsersController@postadd');

//get the url for view the category
Route::get('/post-classified-ads/{maincategory}/{id}','UsersController@categories');

//validat te  fofor postad
Route::post('/postcarbikes','UsersController@postcarbikes');

//get the adds to displaty the records
Route::get('/getads','UsersController@getads')->name('maincategories.getads');

Route::get('/product/view/{id}','UsersController@linkads');
