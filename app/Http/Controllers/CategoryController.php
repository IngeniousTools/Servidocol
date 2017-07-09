<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller{

    protected $idCategory;
    public $name;
    protected $status;

    public function __construct(Category $category){

    }

    protected function CreateCategory(Request $request){
      $category = new Category;
      $category->idCategory = null;
      $category->name = $request->input('txt_name');
      $category->status = 1;
      $category->save();

      return redirect('element/category/list');
    }

    public function ListCategory(){
      $category = Category::all();
      $data = array('title' => 'Lista de categorias',
                    'categories' => $category
                    );
      return view('category.ListCategory',$data);
    }

    protected function UpdateCategory(Request $request ,$identificationCategory){
      $category = Category::find($identificationCategory);
      $category->name = $request->input('txt_name');
      $category->status = $request->input('opt_status');
      $category->save();
      return redirect('element/category/list');
    }

}
