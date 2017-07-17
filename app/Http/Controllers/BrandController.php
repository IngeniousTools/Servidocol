<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller{

  protected $idBrand;
  public $name;
  protected $status;

    protected function CreateBrand(Request $request){
      $brand = new Brand;
      $brand->idBrand = null;
      $brand->name = $request->input('txt_name');
      $brand->status = 1;
      $brand->save();

      return back()->with('delivery','delivery');
    }

    public function ListBrand(){
      $brands = Brand::all();
      $data = array('title' => 'Lista de marcas para elementos',
                    'brands' => $brands
                    );
      return view('brand.ListBrand',$data);
    }

    protected function UpdateBrand(Request $request, $identificationCategory){
      $brand = Brand::find($identificationCategory);
      $brand->name = $request->input('txt_name');
      $brand->status = $request->input('opt_status');
      $brand->save();
      return redirect('element/brand/list');
    }
}
