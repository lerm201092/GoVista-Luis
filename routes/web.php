<?php

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/summary', 'Views\\SummaryController@index')->name('summary');
Route::get('/userEmpresa_Login', 'Auth\\LoginController@userEmpresa_Login');

//  PACIENTES - VISTAS
Route::get('/modulos/pacientes/listado', 'Modulos\\PacientesController@listar')->name('modulos.pacientes.listado');
Route::get('/modulos/pacientes/ver/{PacienteId?}', 'Modulos\\PacientesController@ver')->name('modulos.pacientes.ver');
Route::get('/modulos/pacientes/editar/{PacienteId?}', 'Modulos\\PacientesController@editar')->name('modulos.pacientes.editar');
Route::get('/modulos/pacientes/crear', 'Modulos\\PacientesController@crear')->name('modulos.pacientes.crear');

// PACIENTES - FUNCIONES
Route::get('/modulos/pacientes/bf_buscar','Modulos\\PacientesController@beforeBuscar')->name('/modulos/pacientes/bf_buscar');
Route::get('/modulos/pacientes/bf_ver','Modulos\\PacientesController@beforeVer')->name('modulos.pacientes.bf_ver');
Route::get('/modulos/pacientes/bf_editar','Modulos\\PacientesController@beforeEditar')->name('modulos.pacientes.bf_editar');
Route::get('/modulos/pacientes/buscar/{keyword?}', 'Modulos\\PacientesController@buscar')->name('modulos.pacientes.buscar');
Route::put('/modulos/pacientes/update/{PacienteId?}', 'Modulos\\PacientesController@update')->name('modulos.pacientes.update');
Route::put('/modulos/pacientes/insert','Modulos\\PacientesController@insert')->name('modulos.pacientes.insert');

// CITAS - VISTAS
Route::get('/modulos/citas/listado', 'Modulos\\CitasController@listar')->name('modulos.citas.listado');
Route::get('/modulos/citas/ver/{CitaId?}', 'Modulos\\CitasController@ver')->name('modulos.citas.ver');
Route::get('/modulos/citas/editar/{CitaId?}', 'Modulos\\CitasController@editar')->name('modulos.citas.editar');


// CITAS - FUNCIONES
Route::get('/modulos/citas/bf_ver','Modulos\\CitasController@beforeVer')->name('modulos.citas.bf_ver');
Route::get('/modulos/citas/bf_editar','Modulos\\CitasController@beforeEditar')->name('modulos.citas.bf_editar');


//AREAS
Route::get('/Areas/municipios','Modulos\\PacientesController@queryMunicipio_onchange')->name('areas.municipios');