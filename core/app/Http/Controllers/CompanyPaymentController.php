<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Company;
use App\CompanyPayment;
use App\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CompanyPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newPayment()
    {
        $data['page_title'] = 'New Payment';
        $data['company'] = Company::all();
        return view('company.payment-new',$data);
    }

    public function storePayment(Request $request)
    {
        if ($request->payment_type == 1){
            $request->validate([
                'payment_date' => 'required',
                'company_id' => 'required',
                'pay_amount' => 'required|numeric',
                'details' => 'required'
            ]);
        }else{
            $request->validate([
                'payment_date' => 'required',
                'company_id' => 'required',
                'reference' => 'required',
                'total_amount' => 'required|numeric',
                'pay_amount' => 'required|numeric',
            ]);
        }


        $basic = BasicSetting::first();
        $custom = 'CP-'.date('ymdHis');

        $in = Input::except('_method','_token');
        $in['custom'] = $custom;
        CompanyPayment::create($in);

        $com = Company::findOrFail($request->company_id);

        if ($request->payment_type == 1){
            $com->total_pay += $request->pay_amount;
            $com->save();
        }else{
            $com->total_send += $request->total_amount;
            $com->total_pay += $request->pay_amount;
            $com->save();
        }

        $tr['custom'] = $custom;
        $tr['type'] = 1; // Company Payment
        $tr['balance'] = $request->pay_amount;
        $tr['status'] = 1;// Credit
        $tr['post_balance'] = $basic->balance - $request->pay_amount;

        TransactionLog::create($tr);

        $basic->balance -= $request->pay_amount;
        $basic->save();

        session()->flash('message','Payment Successfully Completed.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function historyPayment()
    {
        $data['page_title'] = 'Company Payment History';
        $data['history'] = CompanyPayment::latest()->withTrashed()->get();
        return view('company.payment-history',$data);
    }

    public function deletePayment(Request $request)
    {
        $request->validate([
           'delete_id' => 'required'
        ]);

        $payment = CompanyPayment::findOrFail($request->delete_id);

        $custom = $payment->custom;

        $com = Company::findOrFail($payment->company_id);

        $com->total_send -= $payment->total_amount;
        $com->total_pay -= $payment->pay_amount;
        $com->save();


        $oldTr = TransactionLog::whereCustom($custom)->firstOrFail();
        $oldTr->delete();

        $basic = BasicSetting::first();

        $tr['custom'] = $custom;
        $tr['type'] = 2; // Company Payment Reverse
        $tr['balance'] = $payment->pay_amount;
        $tr['status'] = 0;// David
        $tr['post_balance'] = $basic->balance + $payment->pay_amount;

        TransactionLog::create($tr);

        $basic->balance += $payment->pay_amount;
        $basic->save();

        $payment->delete();

        session()->flash('message','Payment Successfully Deleted.');
        session()->flash('type','success');
        return redirect()->back();

    }

}
