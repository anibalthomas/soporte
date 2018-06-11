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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/solicitud', 'SolicitudesController@create')->name('solicitud');
// Route::get('/lista', 'SolicitudesController@index')->name('lista');
// Route::post('guardar', 'SolicitudesController@store')->name('guardar');
// Route::get('edit/{id}', 'SolicitudesController@edit')->name('edit');


Route::get('/solicitud', 'SolicitudesController@index')->name('lista');
Route::get('/solicitud/create', 'SolicitudesController@create')->name('solicitud');
Route::post('/solicitud', 'SolicitudesController@store')->name('guardar');
Route::get('solicitud/{id}/edit', 'SolicitudesController@edit')->name('edit');
// Route::get('solicitud/{id}', 'SolicitudesController@show')->name('show');
Route::put('solicitud/{id}', 'SolicitudesController@update')->name('update');
Route::delete('solicitud/{id}', 'SolicitudesController@destroy')->name('destroy');


// return datatables()->eloquent(User::query())->toJson();
// Route::get('api/solicitudes', function(){
//   return Datatables::eloquent(App\Solicitud::query())->make(true);
//   return datatables()->eloquent(App\Solicitud::query())->toJson();
// });
