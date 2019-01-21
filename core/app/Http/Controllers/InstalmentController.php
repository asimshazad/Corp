<?php

namespace App\Http\Controllers;

use App\Instalment;
use Illuminate\Http\Request;

class InstalmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageInstalment()
    {
        $data['page_title'] = "Manage Instalment";
        $data['instalment'] = Instalment::all();
        return view('instalment.instalment', $data);
    }
    public function storeInstalment(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:instalments',
            'duration' => 'required|numeric',
            'time' => 'required|numeric',
            'charge' => 'required|numeric'
         ]);

        $data = new Instalment();
        $data->name = $request->name;
        $data->duration = $request->duration;
        $data->time = $request->time;
        $data->charge = $request->charge;
        $data->difference = round(($request->duration * 30) / $request->time);
        $data->save();
        return response()->json($data);

    }
    public function editInstalment($product_id)
    {
        $product = Instalment::find($product_id);
        return response()->json($product);
    }
    public function updateInstalment(Request $request,$product_id)
    {
        $data = Instalment::find($product_id);
        $this->validate($request,[
            'name' => 'required|unique:instalments,name,'.$product_id,
            'duration' => 'required|numeric',
            'time' => 'required|numeric',
            'charge' => 'required|numeric'
        ]);

        $data->name = $request->name;
        $data->duration = $request->duration;
        $data->time = $request->time;
        $data->charge = $request->charge;
        $data->difference = round(($request->duration * 30) / $request->time);
        $data->save();

        return response()->json($data);
    }
}
