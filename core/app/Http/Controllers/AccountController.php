<?php

namespace App\Http\Controllers;

use App\Account;
use App\BasicSetting;
use App\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function mangeAccount()
    {
        $data['page_title'] = 'Manage Account';
        return view('account.manage-account',$data);
    }

    public function submitAccount(Request $request)
    {
        $request->validate([
           'payment_date' => 'required',
           'payment_type' => 'required',
           'pay_amount' => 'required',
           'details' => 'required'
        ]);


        $in = Input::except('_method','_token');

        $basic = BasicSetting::first();

        $date = date('ymdHis');


        if ($request->payment_type == 0){
            $tr['custom'] = 'DP-'.$date;
            $tr['status'] = 0;
            $tr['type'] = 3; // Deposit
            $tr['balance'] = $request->pay_amount;
            $tr['post_balance'] = $basic->balance + $request->pay_amount;
            TransactionLog::create($tr);
            $basic->balance += $request->pay_amount;
            $basic->save();
        }elseif ($request->payment_type == 1){
            $tr['custom'] = 'WD-'.$date;
            $tr['status'] = 1;
            $tr['type'] = 5; // Withdraw Payment
            $tr['balance'] = $request->pay_amount;
            $tr['post_balance'] = $basic->balance - $request->pay_amount;
            TransactionLog::create($tr);
            $basic->balance -= $request->pay_amount;
            $basic->save();
        }else{
            $tr['custom'] = 'EX-'.$date;
            $tr['status'] = 1;
            $tr['type'] = 7; // Expense Payment
            $tr['balance'] = $request->pay_amount;
            $tr['post_balance'] = $basic->balance - $request->pay_amount;
            TransactionLog::create($tr);
            $basic->balance -= $request->pay_amount;
            $basic->save();
        };

        $in['custom'] = $tr['custom'];

        Account::create($in);

        session()->flash('message','Payment Successfully Completed.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function historyAccount()
    {
        $data['page_title'] = 'Account History';
        $data['history'] = Account::latest()->withTrashed()->get();
        return view('account.account-history',$data);
    }

    public function deleteAccount(Request $request)
    {
        $request->validate([
           'delete_id' => 'required'
        ]);

        $payment = Account::findOrFail($request->delete_id);

        $basic = BasicSetting::first();

        TransactionLog::whereCustom($payment->custom)->delete();


        if ($payment->payment_type == 0){
            $tr['custom'] = $payment->custom;
            $tr['status'] = 1;
            $tr['type'] = 4; // revere Deposit
            $tr['balance'] = $payment->pay_amount;
            $tr['post_balance'] = $basic->balance - $payment->pay_amount;
            TransactionLog::create($tr);
            $basic->balance -= $payment->pay_amount;
            $basic->save();
        }elseif ($payment->payment_type == 1){
            $tr['custom'] = $payment->custom;
            $tr['status'] = 0;
            $tr['type'] = 6; // reverse Withdraw Payment
            $tr['balance'] = $payment->pay_amount;
            $tr['post_balance'] = $basic->balance + $payment->pay_amount;
            TransactionLog::create($tr);
            $basic->balance += $payment->pay_amount;
            $basic->save();
        }else{
            $tr['custom'] = $payment->custom;
            $tr['status'] = 0;
            $tr['type'] = 8; // reverse Expense Payment
            $tr['balance'] = $payment->pay_amount;
            $tr['post_balance'] = $basic->balance + $payment->pay_amount;
            TransactionLog::create($tr);
            $basic->balance += $payment->pay_amount;
            $basic->save();
        };

        $payment->delete();

        session()->flash('message','Payment Successfully Deleted.');
        session()->flash('type','success');
        return redirect()->back();

    }

}
