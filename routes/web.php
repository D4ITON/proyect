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



// Route::get('roles',function(){
// 	return \App\Role::with('user')->get();
// });

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/phpfirebase_sdk','FirebaseController@index');

// Route::resource('asistencias','AsistenciasController');
Route::get('asistencias',['as' =>'asistencias.index', 'uses' => 'AsistenciasController@index']);
Route::get('asistencias/clase/{id}/create',['as' =>'asistencias.createclases', 'uses' => 'AsistenciasController@createclases']);

//rutas de prueba

//	RUTA PARA VER LAS CLASES GENENRALES

Route::post('asistencias/clases/create/{curso_id}',['as' =>'asistencias.storeclases', 'uses' => 'AsistenciasController@storeclases']);

//registro de tomar asistencias
Route::get('asistencias/clases/{curso_id}/asistencia/{clase_id}/registro/',['as' =>'asistencias.create', 'uses' => 'AsistenciasController@create']);
Route::post('asistencias/clases/{curso_id}/create/registro/{clase_id}',['as' =>'asistencias.store', 'uses' => 'AsistenciasController@store']);
//muestra de todos las asistencias de la clase
Route::get('asistencias/clases/{curso_id}/asistencia/{clase_id}',['as' =>'asistencias.show', 'uses' => 'AsistenciasController@show']);


Route::get('asistencias/clases/{curso_id}',['as' =>'asistencias.clases', 'uses' => 'AsistenciasController@verclases']);
Route::get('asistencias/clases/{curso_id}/ver',['as' =>'asistencias.vergeneral', 'uses' => 'AsistenciasController@vergeneral']);


Route::delete('asistencias/clases/{clase_id}/destroy',['as' =>'asistencias.destroy', 'uses' => 'AsistenciasController@destroy']);


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cursos','CursosController');
// Route::resource('clases','ClasesController');

Route::resource('usuarios','UsersController');



