<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Element;
use App\Category;
use App\Deposit;
use App\Bill;
use App\Stock;


class ElementController extends Controller{

  protected $idElement;
  public $name;
  protected $deposit;
  protected $category;
  protected $dateRedistribution;
  protected $status;

  public static $initial;
  public static $finish;

  protected function CreateElement(Request $request){
    $element = new Element;
    $element->idItem = null;
    $element->idCategory = $request->input('opt_category');
    $element->idDeposit = $request->input('opt_deposit');
    $element->name = $request->input('txt_name');
    $element->status = 1;
    $element->save();

    return back()->with('delivery','delivery');
  }

  public function ListElement(){
    $elements = Element::all();
    $data = array('title' => 'Lista de elementos',
                  'elements' => $elements);
    return view('element.ListElement',$data);
  }

  protected function ViewElement($identification){
    $elements = Element::find($identification);
    $categories = Category::all();
    $deposits = Deposit::all();
    $data = array('title' => 'Visualización de elementos',
                  'element' => $elements,
                  'categories' => $categories,
                  'deposits' => $deposits);
    return view('element.ViewElement',$data);
  }

  protected function UpdateElement(Request $request, $identification){
    $elements = Element::find($identification);
    $elements->idCategory = $request->input('opt_category');
    $elements->idDeposit = $request->input('opt_deposit');
    $elements->name = $request->input('txt_name');
    $elements->status = $request->input('opt_status');
    $elements->save();

    return redirect('element/list');

  }

  protected function NotifyElement(){

  }

  protected function CreateElementStock(Request $request){
    $stock = new Bill;
    $stock->idBill = null;
    $stock->idItem = $request->input('opt_element');
    $stock->idBrand = $request->input('opt_brand');
    $stock->price = $request->input('txt_price');
    $stock->quantity = $request->input('txt_quantity');
    $stock->dateBuy = $request->input('txt_date');
    $stock->save();

    return back()->with('delivery','delivery');
  }

  protected function ListElementStock(){

    $bills = DB::table('bill')
            ->select(DB::raw('item.name as item, brand.name as brand, (SUM(price)) as price, (SUM(quantity)) as quantity'))
            ->join('brand','bill.idBrand','=','brand.idBrand')
            ->join('item','item.idItem','=','item.idItem')
            ->whereRaw('item.idItem=bill.idItem')
            ->whereRaw('brand.idBrand=bill.idBrand')
            ->where([['brand.status','1'],['item.status','1']])
            ->groupBy('brand')
            ->groupBy('item')->get();

    $data = array('title' => 'Lista de elementos',
                  'bills' => $bills);
    //return $bills;
    return view('stock.ListStock',$data);

  }

  protected function ReportElementStock(Request $request){

    self::$initial = $request->input('txt_initialDate');
    self::$finish = $request->input('txt_finishDate');

    Excel::create('Reporte desde '.self::$initial . ' hasta ' .self::$finish, function($excel) {
      $excel->sheet('Reporte',function($sheet) {

        $bills = DB::table('bill')
                ->select(DB::raw('item.name as item, brand.name as brand, (SUM(price)) as price, (SUM(quantity)) as quantity'))
                ->join('brand','bill.idBrand','=','brand.idBrand')
                ->join('item','item.idItem','=','item.idItem')
                ->whereRaw('item.idItem=bill.idItem')
                ->whereRaw('brand.idBrand=bill.idBrand')
                ->where([['brand.status','1'],['item.status','1']])
                ->whereBetween('dateBuy',[self::$initial,self::$finish])
                ->groupBy('brand')
                ->groupBy('item')->get();
        //$bills = Bill::where([['dateBuy','>=',self::$initial],['dateBuy','<=',self::$finish]])->get();
        $data = array('bills' => $bills);
        $sheet->loadView('stock.ReportDownloadStock',$data);
      });
    })->export('xlsx');
    
  }

  protected function UpdateElementStock(){

  }

}
