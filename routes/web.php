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
  $data = array('title' => 'Servidocol' );
  return view('Index', $data);
});

Route::get('login', function () {
  $data = array('title' => 'Login Servidocol', );
  return view('Login',$data);
});

Route::post('login','EmployeeController@login');

Route::get('logout','EmployeeController@Logout');

Route::group(['prefix' => 'employee'], function (){

  Route::get('create',function () {
    $jobtitle = DB::table('jobtitle')->where('status',1)->get();
    $data = array('jobtitle' => $jobtitle,
                  'title' => 'Crear empleado',);
    return view('employee.RegistryEmployee', $data);
  });

  Route::post('create','EmployeeController@RegistryEmployee');

  Route::get('list','EmployeeController@ListEmployee');

  Route::get('view/{identification}','EmployeeController@ViewEmployee');

  Route::post('update/{identification}','EmployeeController@UpdateEmployee');

});

Route::group(['prefix' => 'user'], function (){

  Route::get('create',function () {
    $rol = DB::table('rol')->where('status',1)->get();
    $data = array('rol' => $rol,
                  'title' => 'Crear usuario',);
    return view('user.RegistryUser', $data);
  });

  Route::post('create','EmployeeController@RegistryUser');

  Route::get('list','EmployeeController@ListUser');

  Route::get('view/{identification}','EmployeeController@ViewUser');

  Route::post('update/{identification}','EmployeeController@UpdateUser');

});
