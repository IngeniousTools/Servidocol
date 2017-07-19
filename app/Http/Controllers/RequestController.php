<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Stock;
use App\Element;
use App\Requirement;
use App\Employee;

class RequestController extends Controller{

    protected $idRequest;
    public $name;
    public $deposit;
    public $category;
    protected $dateRedistribution;
    protected $status;

    public function RequestElement(Request $request){
      $employee = Employee::find($request->input('txt_identification'));
      if (empty($employee) == null) {
        $request = new Requirement;
        $request->idRequirement = null;
        $request->idEmployee = $request->input('txt_identification');
        $request->date = date("Y-n-j");
        $request->autorization = 0;
        $request->deliveryDate = $request->input('txt_deliveryDate');
        $request->save();
        return back()->with('delivery','delivery');
      }else{
        return back()->with('error','error');
      }
    }
}
