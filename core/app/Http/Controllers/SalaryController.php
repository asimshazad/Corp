<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Salary;
use App\Staff;
class SalaryController extends Controller
{
    //CREATE TABLE `corporation`.`salaries` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `paid` INT NOT NULL , `date` DATE NOT NULL , `note` TEXT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NULL , `staff_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

    //ALTER TABLE `salaries` ADD `created_by` INT NOT NULL AFTER `staff_id`;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

        $data['page_title'] = 'Salary History';
        $data['salaries'] = Salary::with('staff')->latest()->get();
        $data['staff'] = Staff::where('status',1)->get();
        return view('salary.index',$data);
    }


    public function edit($id)
    {
        $data['page_title'] = 'Edit Salary';
        $data['salaries'] = Salary::findOrFail($id);
        return view('salary.edit',$data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'paid' => 'required',
        ]);


        $data = new Salary();
        $data->staff_id = $request->staff_id;
        $data->paid = $request->paid;
        $data->note = $request->note;
        $data->created_by = Auth::user()->id;
        $data->save();
        session()->flash('message','Salary Created Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }


}
