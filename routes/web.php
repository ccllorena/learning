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
/*


/***************************
Route::get('/contacto', function () {
    return 'contacto';
});
*
 *  /*

Route::get('/trabajo', function () {
    return view('trabajo');
});

Route::get('/form', function () {
    return view('form');
})->name('miform');

Route::get('/contacto', function () {
    
    // crear mensaje
    //notificar por mail
    //Devolver respuesdta al usuario 
    
    
    return 'Pagina contacto';
})->name('contact');

Route::get('/perfil', function () {
    
    // identificar que el usuario exista
    //traer datos del usuario
    // enviar los datos
    //cargar la vista correspondiente
    
    
    return 'Pagina perfil';
})->name('profile');
 * 
 * 
 */


/*
Route::get('/', function () {
    return view('index');
});
*/


//Event::listen('illuminate.query', function($query) { var_dump($query); }); 



//Route::get('/', 'ControllerLogica@index')->name('miform');
//Route::get('/', 'ControllerLogica@usuario');

Route::get('/contacto', 'ControllerLogica@contacto')->middleware('Middlefuente');
Route::get('/perfil', 'ControllerLogica@perfil');

Route::get('/', 'ControllerLogica@index');
Route::get('/create', 'ControllerLogica@create');


Route::get('/listintegrantes/{id}','ControllerLogica@listintegrantes');
Route::get('/createintegrantes/{idccoop}', 'IntegrantesController@create');

Route::get('/editinte/{idinte}', 'IntegrantesController@edit');
//Route::put('/updateinte/{id}', 'IntegrantesController@update');

Route::get('/editintegrantes/{idinte}', 'IntegrantesController@index');

Route::get('grabaestado/{id_coopropietario}', 'ControllerLogica@grabaestado');


//Route::get('/storearrendatarios/', 'ArrendatariosController@store');
Route::resource('storearrendatarios', 'ArrendatariosController');
Route::get('/editarrendatarios/{idcoopro}', 'ArrendatariosController@index');
//
//

Route::get('/editararrendatarios/{idarre}', 'ArrendatariosController@edit');
Route::resource('updatearrendatarios', 'ArrendatariosController');




Route::resource('almacen/coopropietario','ControllerLogica');
Route::resource('almacen/integrante','IntegrantesController');