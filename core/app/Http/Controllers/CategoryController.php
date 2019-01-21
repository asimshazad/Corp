<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageCategory()
    {
        $data['page_title'] = " Category";
        $data['category'] = Category::all();
        $data['company'] = Company::all();
        return view('dashboard.category', $data);
    }
    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'company_id' => 'required',
            'name' => 'unique_with:categories,company_id',
            'status' => 'required',
        ]);

    	$data = new Category();
        $data->name = $request->name;
        $data->company_id = $request->company_id;
        $data->slug = str_slug($request->name);
        $data->status = $request->status;
        $data->save();
        $data['company'] = Company::find($request->company_id)->name;
        return response()->json($data);

    }
    public function editCategory($product_id)
    {
        $product = Category::find($product_id);
        return response()->json($product);
    }
    public function updateCategory(Request $request,$product_id)
    {
        $product = Category::find($product_id);
        $request->validate([
            'company_id' => 'required',
            'name' => 'unique_with:categories,company_id,'.$product_id,
           'status' => 'required',
        ]);

        $product->name = $request->name;
        $product->company_id = $request->company_id;
        $product->slug = str_slug($request->name);
        $product->status = $request->status;
        $product->save();
        $product['company'] = Company::find($request->company_id)->name;
        return response()->json($product);
    }


}
