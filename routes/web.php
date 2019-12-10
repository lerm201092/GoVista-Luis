<?php

Route::get('/', function () { return view('auth.login'); });

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
Route::get('/modulos/pacientes/buscar_json', 'Modulos\\PacientesController@buscarPaciente')->name('modulos.pacientes.buscar_json');
Route::get('/modulos/pacientes/bf_ver','Modulos\\PacientesController@beforeVer')->name('modulos.pacientes.bf_ver');
Route::get('/modulos/pacientes/bf_editar','Modulos\\PacientesController@beforeEditar')->name('modulos.pacientes.bf_editar');
Route::get('/modulos/pacientes/buscar/{keyword?}', 'Modulos\\PacientesController@buscar')->name('modulos.pacientes.buscar');
Route::put('/modulos/pacientes/update/{PacienteId?}', 'Modulos\\PacientesController@update')->name('modulos.pacientes.update');
Route::put('/modulos/pacientes/insert','Modulos\\PacientesController@insert')->name('modulos.pacientes.insert');

// CITAS - VISTAS
Route::get('/modulos/citas/listado', 'Modulos\\CitasController@listar')->name('modulos.citas.listado');
Route::get('/modulos/citas/ver/{CitaId?}', 'Modulos\\CitasController@ver')->name('modulos.citas.ver');
Route::get('/modulos/citas/editar/{CitaId?}', 'Modulos\\CitasController@editar')->name('modulos.citas.editar');
Route::get('/modulos/citas/crear', 'Modulos\\CitasController@crear')->name('modulos.citas.crear');

// CITAS - FUNCIONES
Route::get('/modulos/citas/bf_ver','Modulos\\CitasController@beforeVer')->name('modulos.citas.bf_ver');
Route::get('/modulos/citas/bf_editar','Modulos\\CitasController@beforeEditar')->name('modulos.citas.bf_editar');
Route::put('/modulos/citas/update/{CitaId?}', 'Modulos\\CitasController@update')->name('modulos.citas.update');
Route::put('/modulos/citas/insert', 'Modulos\\CitasController@insert')->name('modulos.citas.insert');

//AREAS
Route::get('/Areas/municipios','Modulos\\PacientesController@queryMunicipio_onchange')->name('areas.municipios');

//HISTORIAS CLINICAS - VISTAS
Route::get('/modulos/historiaclinica/crear/{CitaId?}', 'Modulos\\HistoriasController@crear')->name('modulos.historiaclinica.crear');
Route::get('/modulos/historiaclinica/listado', 'Modulos\\HistoriasController@listar')->name('modulos.historiaclinica.listado');
Route::put('/modulos/historiaclinica/insert', 'Modulos\\HistoriasController@insert')->name('modulos.historiaclinica.insert');
Route::get('/modulos/historiaclinica/ver/{HistoriaId?}', 'Modulos\\HistoriasController@ver')->name('modulos.historiaclinica.ver');
Route::get('/modulos/historiaclinica/dashboard/{HistoriaId?}', 'Modulos\\HistoriasController@dashboard')->name('modulos.historiaclinica.dashboard');

// HISTORIAS CLINICAS - FUNCIONES
Route::get('/modulos/historiaclinica/bf_crear','Modulos\\HistoriasController@beforeCrear')->name('modulos.historiaclinica.bf_crear');
Route::get('/modulos/historiaclinica/bf_ver','Modulos\\HistoriasController@beforeVer')->name('modulos.historiaclinica.bf_ver');
Route::get('/modulos/historiaclinica/bf_dashboard','Modulos\\HistoriasController@beforeDashboard')->name('modulos.historiaclinica.bf_dashboard');

//EJERCICIOS - VISTAS
Route::get('/modulos/ejercicios/listado', 'Modulos\\HistoriasEjerciciosController@listar')->name('modulos.ejercicios.listado');
Route::get('modulos/ejercicios/playexercise/{id}', 'Modulos\\HistoriasEjerciciosController@playexercise')->name('modulos.ejercicios.playexercise');
//EJERCICIOS - FUNCIONES
Route::get('/modulos/ejercicios/bf_play','Modulos\\HistoriasEjerciciosController@beforePlay')->name('modulos.ejercicios.bf_play');
Route::get('/saveExerciceId',            'Modulos\\HistoriasEjerciciosController@saveExerciceId');

//fullcalender
Route::get('fullcalendar','CitasController@calendar');
Route::post('fullcalendar/create','FullCalendarController@create');
Route::post('fullcalendar/update','FullCalendarController@update');
Route::post('fullcalendar/delete','FullCalendarController@destroy');