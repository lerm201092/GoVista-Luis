<?php

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/summary', 'Views\\SummaryController@index')->name('summary');
Route::get('/userEmpresa_Login', 'Auth\\LoginController@userEmpresa_Login');

//  PACIENTES
Route::get('/modulos/pacientes/bf_buscar','Modulos\\PacientesController@beforeBuscar')->name('/modulos/pacientes/bf_buscar');
Route::get('/modulos/pacientes/bf_ver','Modulos\\PacientesController@beforeVer')->name('modulos.pacientes.bf_ver');
Route::get('/modulos/pacientes/bf_editar','Modulos\\PacientesController@beforeEditar')->name('modulos.pacientes.bf_editar');

Route::get('/modulos/pacientes/listado', 'Modulos\\PacientesController@listar')->name('modulos.pacientes.listado');
Route::get('/modulos/pacientes/ver/{PacienteId?}', 'Modulos\\PacientesController@ver')->name('modulos.pacientes.ver');
Route::get('/modulos/pacientes/buscar/{keyword?}', 'Modulos\\PacientesController@buscar')->name('modulos.pacientes.buscar');
Route::get('/modulos/pacientes/editar/{PacienteId?}', 'Modulos\\PacientesController@editar')->name('modulos.pacientes.editar');
Route::put('/modulos/pacientes/update/{PacienteId?}', 'Modulos\\PacientesController@update')->name('modulos.pacientes.update');
//AREAS
Route::get('/Areas/municipios','Modulos\\PacientesController@queryMunicipio_onchange')->name('areas.municipios');