<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Element;
use App\Category;
use App\Deposit;

class ElementController extends Controller{

  protected function CreateElement(Request $request){
    $element = new Element;
    $element->idItem = null;
    $element->idCategory = $request->input('opt_category');
    $element->idDeposit = $request->input('opt_deposit');
    $element->name = $request->input('txt_name');
    $element->status = 1;
    $element->save();

    return redirect('element/list');
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
}
