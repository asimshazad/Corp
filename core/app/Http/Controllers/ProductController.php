<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Product;
use App\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newProduct()
    {
        $data['page_title'] = 'Add New Product';
        $data['company'] = Company::all();
        return view('product.product-create',$data);
    }

    public function storeProduct(Request $request)
    {

        $request->validate([
           'company_id' => 'required',
           'category_id' => 'required',
           'name' => 'required|unique_with:products,company_id,category_id',
            'code' => 'required|min:4|unique:products',
            'specification' => 'required|array'
        ]);

        $in = Input::except('_method','_token','specification');

        $product = Product::create($in);

        foreach ($request->specification as  $s){
            $sp = new Specification;
            $sp->name = $s['specification'];
            $product->specifications()->save($sp);
        }
        session()->flash('message','Product Save Successfully');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function storeHistory()
    {
        $data['page_title'] = 'Product Store History';
        $data['product'] = Product::latest()->get();
        return view('product.product-history',$data);
    }

    public function editProduct($id)
    {
        $data['page_title'] = "Edit Product";
        $data['product'] = Product::findOrFail($id);
        $data['company'] = Company::all();
        $data['category'] = Category::all();
        return view('product.product-edit',$data);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'company_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|unique_with:products,company_id,category_id,'.$product->id,
            'code' => 'required|min:4|unique:products,code,'.$product->id,
            'specification' => 'required|array'
        ]);

        $in = Input::except('_method','_token','specification');

        $product->fill($in)->save();

        $product->specifications()->delete();

        foreach ($request->specification as  $s){
            $sp = new Specification;
            $sp->name = $s['specification'];
            $product->specifications()->save($sp);
        }

        session()->flash('message','Product Update Successfully');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function viewProduct($id)
    {
        $data['page_title'] = 'View Product';
        $data['product'] = Product::findOrFail($id);
        return view('product.product-view',$data);
    }



}
