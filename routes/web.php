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

Route::group(['prefix' => 'incident'], function (){

  Route::get('create',function () {
    $areaIncident = DB::table('areaincident')->where('status',1)->get();
    $priority = DB::table('priority')->where('status',1)->get();
    $data = array('areaIncident' => $areaIncident,
                  'priority' => $priority,
                  'title' => 'Crear incidente',);
    return view('incident.RegistryIncident', $data);
  });

  Route::post('create','IncidentController@CreateIncident');

  Route::get('list','IncidentController@ListIncident');

  Route::get('view/{identification}','IncidentController@ViewIncident');

  Route::post('view/{identification}','IncidentController@CommentIncident');

  Route::get('property/{identification}','IncidentController@PropertyIncident');

  Route::get('close/{identification}','IncidentController@ChangeStatusIncident');

  Route::get('search', function(){
    $data = array('title' => 'Busqueda de incidentes');
    return view('incident.SearchIncident', $data);
  });

  Route::post('search','IncidentController@SearchIncident');

  Route::get('filter/{identification}', function($identification){

    $incident = DB::table('incident')->where([['idIncident',$identification],['status',1],['aprobation',0]])->get();
    $incidentPriority = DB::table('incident')->where([['idIncident',$identification],['status',1],['aprobation',0]])->value('idPriority');

    $priority = DB::table('priority')->where([['idPriority',$incidentPriority],['status',1]])->get();

    $priorization = DB::table('priority')->where('status',1)->get();

    $areaIncident = DB::table('areaincident')->where('status',1)->get();
    $incidentDetail = Storage::get('incident'.$identification.'.json');
    $detail = json_decode($incidentDetail, true);
    $data = array('title' => "Filtro de incidencias",
                  'incidents' => $incident,
                  'prioritys' => $priority,
                  'priorizations' => $priorization,
                  'areaincidents' => $areaIncident,
                  'detail' => $detail);
    return view('incident.FilterIncident',$data);
  });

  Route::post('filter/{identification}','IncidentController@FilterIncident');

});

Route::group(['prefix' => 'element'], function (){

  Route::group(['prefix' => 'category'], function (){

    Route::get('create', function (){
      $data = array('title' => 'Crear categoria');
      return view('category.RegistryCategory',$data);
    });

    Route::post('create','CategoryController@CreateCategory');

    Route::get('list','CategoryController@ListCategory');

    Route::get('update/{identification}',function($identification){
      $categories = DB::table('category')->where('idCategory',$identification)->get();
      $data = array('title' => 'Actualizar categorias',
                    'categories' => $categories,
                    );
      return view('category.UpdateCategory', $data);
    });

    Route::post('update/{identification}','CategoryController@UpdateCategory');

  });

  Route::group(['prefix' => 'brand'], function (){

    Route::get('create', function (){
      $data = array('title' => 'Crear marca de elemento');
      return view('brand.RegistryBrand',$data);
    });

    Route::post('create','BrandController@CreateBrand');

    Route::get('list','BrandController@ListBrand');

    Route::get('update/{identification}',function ($identification){
      $brands = DB::table('brand')->where('idBrand',$identification)->get();
      $data = array('title' => 'Actualizar marca de elemento',
                    'brands' => $brands,
                    );
      return view('brand.UpdateBrand', $data);
    });

    Route::post('update/{identification}','BrandController@UpdateBrand');

  });

  Route::group(['prefix' => 'stock'], function (){

    Route::get('create', function (){
      $data = array('title' => 'Crear marca de elemento');
      return view('brand.RegistryBrand',$data);
    });

    Route::post('create','ElementController@CreateElementStock');

    Route::get('list','ElementController@ListElementStock');

    Route::get('update/{identification}',function ($identification){
      $brands = DB::table('brand')->where('idBrand',$identification)->get();
      $data = array('title' => 'Actualizar marca de elemento',
                    'brands' => $brands,
                    );
      return view('brand.UpdateBrand', $data);
    });

    Route::post('update/{identification}','ElementController@UpdateElementStock');

  });

  Route::get('create',function (){
    $categories = DB::table('category')->where('Status',1)->get();
    $deposits = DB::table('deposit')->where('status',1)->get();
    $data = array('title' => 'Registro de elementos',
                  'categories' => $categories,
                  'deposits' => $deposits);
    return view('element.RegistryElement',$data);
  });

  Route::post('create','ElementController@CreateElement');

  Route::get('list','ElementController@ListElement');

  Route::get('view/{identification}', 'ElementController@ViewElement');

  Route::post('update/{identification}','ElementController@UpdateElement');

});
