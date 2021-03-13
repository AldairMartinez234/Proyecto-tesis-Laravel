
<?php

Auth::routes();

    Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

    Route::post('editItem', 'UserController@editItem'); 
    Route::middleware(['auth'])->group (function () {

//Roles

	Route::post('roles/store', 'RoleController@store')->name('roles.store')
	      ->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
	      ->middleware('permission:roles.index');
	
	Route::get('roles/create', 'RoleController@create')->name('roles.create')
	      ->middleware('permission:roles.create'); 

	Route::put('roles/{id}', 'RoleController@update')->name('roles.update')
	      ->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
	      ->middleware('permission:roles.show');

	Route::delete('roles/delete/{role}', 'RoleController@destroy')->name('roles.destroy')
	      ->middleware('permission:roles.destroy');
	
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
	      ->middleware('permission:roles.edit');

//Pacientes	

    Route::post('pacientes/store', 'PacienteController@store')->name('pacientes.store')
	      ->middleware('permission:pacientes.create');

	Route::get('pacientes', 'PacienteController@index')->name('pacientes.index')
	      ->middleware('permission:pacientes.index');

	Route::get('pacientes/activo', 'PacienteController@activo')->name('activos')
	      ->middleware('permission:pacientes.index');

	Route::get('pacientes/inactivo', 'PacienteController@inactivo')->name('inactivo')
	      ->middleware('permission:pacientes.index');

    Route::get('pacientes/proceso', 'PacienteController@proceso')->name('proceso')
	      ->middleware('permission:pacientes.index');
	
	Route::get('pacientes/create', 'PacienteController@create')->name('pacientes.create')
	      ->middleware('permission:pacientes.create'); 

	Route::put('pacientes/{id}/edit', 'PacienteController@update')->name('pacientes.update')
	      ->middleware('permission:pacientes.edit');

	Route::get('pacientes/{id}', 'PacienteController@show')->name('pacientes.show')
	      ->middleware('permission:pacientes.show');

	Route::delete('pacientes/delete/{id}', 'PacienteController@delete')->name('pacientes.destroy')
	      ->middleware('permission:pacientes.destroy');

	Route::delete('paciente/alta/{id}', 'PacienteController@alta')->name('alta');

	Route::delete('paciente/baja1/{id}', 'PacienteController@baja1')->name('baja1');

	Route::delete('paciente/baja2/{id}', 'PacienteController@baja2')->name('baja2');

	Route::delete('paciente/baja3/{id}', 'PacienteController@baja3')->name('baja3');
	
	Route::get('pacientes/{id}/editar', 'PacienteController@edit')->name('pacientes.edit')
	      ->middleware('permission:pacientes.edit');

//Usuarios

	 Route::post('addItem', 'UserController@addItem')->name('addItem')
	      ->middleware('permission:usuarios.create');      

    Route::get('usuarios/create', 'UserController@create')->name('usuarios.create')
	      ->middleware('permission:usuarios.create'); 

	Route::get('usuarios', 'UserController@index')->name('usuarios.index')
	      ->middleware('permission:usuarios.index');

	Route::get('usuarios/tabla', 'UserController@tabla')->name('usuarios.table');


	Route::get('usuarios/{id}' ,'UserController@show')->name('usuarios.show')
	      ->middleware('permission:usuarios.show');

	Route::DELETE('usuarios/delete/{id}' ,'UserController@deleteItem')->name('usuarios.destroy')
	      ->middleware('permission:usuarios.destroy');

	
	Route::get('usuarios/{id}/edit', 'UserController@edit')->name('usuarios.edit')
	      ->middleware('permission:usuarios.edit');                                               

//Resumen medico

    Route::get('resumens/{id}', 'ResumenController@show')->name('resumens.show')
	      ->middleware('permission:resumens.show');
    
    Route::get('documentacion/{id}','ResumenController@lista_resumen')->name('resumens.lista_resumen')
	      ->middleware('permission:resumens.lista');

    Route::get('resumen/{id}','ResumenController@imprimir_resumen')->name('resumens.imprimir')
	      ->middleware('permission:resumens.imprimir');

    Route::get('medico/{resumen_id}','ResumenController@imprimir_resumens')->name('resumens.imprimirs')
	      ->middleware('permission:resumens.imprimirs');

    Route::get('resumen_medico/{id}','ResumenController@ver')->name('resumens.ver')
	      ->middleware('permission:resumens.edit');

	Route::get('medico_editar/{id}','ResumenController@edit')
	      ->name('resumens.edit');

	Route::get('resumens', 'ResumenController@index')->name('resumens.index')
	      ->middleware('permission:resumens.index');
	
	Route::put('nuevo_resumen/{id}', 'ResumenController@update')->name('resumens.update')
          ->middleware('permission:resumens.edit');

    Route::put('resumens/{id}', 'ResumenController@modificar')->name('resumens.modificar')
          ->middleware('permission:resumens.edit');

	Route::delete('resumens/delete/{id}', 'ResumenController@destroy')->name('resumens.destroy')
	      ->middleware('permission:resumens.destroy');

	Route::delete('control/delete/{id}', 'ControlController@destroy')->name('control.destroy');
	
// Unidade medicas

	Route::post('/addunidades', 'Unidades_MedicasController@addunidades')->name('addunidades');   

	Route::put('/addcontingencia', 'PacienteController@addcontingencia')->name('addcontingencia');   

	Route::get('/modocontingencia', 'PacienteController@modocontingencia')->name('modocontingencia.modo');  

	Route::get('unidades', 'Unidades_MedicasController@index')->name('unidades.index')
	      ->middleware('permission:usuarios.index');

	Route::put('unidades/editar','Unidades_MedicasController@edit')->name('unidades.update')
	      ->middleware('permission:usuarios.edit');

	Route::get('unidades/{id}' ,'Unidades_MedicasController@show')->name('unidades.show')
	      ->middleware('permission:usuarios.show');

	Route::DELETE('unidades/delete/{id}' ,'Unidades_MedicasController@destroy')->name('unidades.destroy')
	      ->middleware('permission:usuarios.destroy');     

    Route::resource('controls','ControlController');

    Route::resource('direccions','DireccionController');

    Route::resource('bitacora','BitacoraController');

    Route::resource('datos__familiars','Datos_FamiliarController');

    Route::get('logout', 'AuthController@log');


    Route::get('/control_entrega/{id}','ControlController@imprimir_controls');

    Route::get('/control_oxigeno/{id}','ControlController@edit');


});
