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

Route::group(['prefix' => 'employee'], function (){

  Route::get('create',function () {
    $jobtitle = DB::table('jobtitle')->where('status',1)->get();
    $data = array('jobtitle' => $jobtitle,
                  'title' => 'Crear empleado');
    return view('employee.RegistryEmployee', $data);
  });

  Route::post('create','EmployeeController@Registry');

});
