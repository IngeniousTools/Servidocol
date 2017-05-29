<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\JobTitle;
use App\User;
use App\Rol;

class EmployeeController extends Controller{
    protected $identification;
    public $name;
    public $lastName;
    public $location;
    public $celPhone;
    public $phone;
    public $email;
    public $jobTitle;
    protected $status;

    public function __construct(Employee $employee){
        $this->employee = $employee;
    }

    protected function RegistryEmployee(Request $request){
      $employee = new Employee;
      $employee->idEmployee=$request->input('txt_identificacion');
      $employee->idJobTitle=$request->input('opt_jobtitle');
      $employee->name=$request->input('txt_name');
      $employee->lastName=$request->input('txt_lastname');
      $employee->location=$request->input('txt_location');
      $employee->celPhone=$request->input('txt_celphone');
      $employee->phone=$request->input('txt_phone');
      $employee->email=$request->input('txt_email');
      $employee->status=1;
      $employee->save();

      return $this->ListEmployee();
    }

    public function ListEmployee(){
      $employee = Employee::all();
      $data = array('title' => 'Lista de empleados',
                    'employee' => $employee, );
      return view('employee.ListEmployee',$data);
    }

    public function ViewEmployee($identification){
      $employee = Employee::find($identification);
      $jobtitle = JobTitle::all();
      $info = array('title' => 'Ver empleado',
                    'employee' => $employee,
                    'jobtitle' => $jobtitle,);
      return view('employee/ViewEmployee',$info);
    }

    public function UpdateEmployee(Request $request, $identification){
      $employee = Employee::find($identification);
      $employee->name = $request->input('txt_name');
      $employee->idJobTitle=$request->input('opt_jobtitle');
      $employee->lastName=$request->input('txt_lastname');
      $employee->location=$request->input('txt_location');
      $employee->celPhone=$request->input('txt_celphone');
      $employee->phone=$request->input('txt_phone');
      $employee->email=$request->input('txt_email');
      $employee->status=$request->input('opt_status');
      $employee->save();
      return $this->ListEmployee();
    }

    public function RegistryUser(Request $request){
      $user = new User;
      $user->idUser = null;
      $user->idEmployee = $request->input('txt_identificacion');
      $user->idRol = $request->input('opt_rol');
      $user->password = encrypt($request->input('txt_password'));
      $user->status = 1;
      $user->save();

      return $this->ListUser();
    }

    public function ListUser(){
      $user = User::all();
      $data = array('title' => 'Lista de usuarios',
                    'user' => $user, );
      return view('user.ListUser',$data);
    }

    public function ViewUser($identification){
      $user = User::find($identification);
      $rol = Rol::all();
      $info = array('title' => 'Ver usuario',
                    'rol' => $rol,
                    'user' => $user,);
      return view('user/ViewUser',$info);
    }

    public function UpdateUser(Request $request, $identification){
      $user = User::find($identification);
      $user->idRol = $request->input('opt_rol');
      $user->status = $request->input('opt_status');
      $user->save();

      return $this->ListUser();
    }

    protected function Login(Request $request){
      $user = User::find($request->input('txt_identificacion'));
      if(!empty($user)){
        if ($user->status === 0) {
          return back()->with('status','Usuario inactivo');
        }else {
          if($request->input('txt_password') === decrypt($user->password)){
            session(['identification' => $user->idEmployee]);
            session(['rol' => $user->idRol]);
            session(['name' => $user->employee->name . " " . $user->employee->lastname]);
            return redirect('/');
          }else{
            return back()->with('status','Contraseña incorrecta');
          }
        }
      }else{
        return back()->with('status','Usuario no existente');
      }
      return redirect('/');

    }

    public function Logout(Request $request){
      $request->session()->flush();
      return redirect('/');
    }
}
