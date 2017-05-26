<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
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

    protected function Registry(Request $request){
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

      return redirect()->back()->with('status','Empleado creado');
    }

    protected function login(Request $request){
      $identificacion = $request->input('txt_identificacion');
      $password = $request->input('txt_password');
      return redirect('/');

    }
}
