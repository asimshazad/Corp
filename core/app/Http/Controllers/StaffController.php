<?php

namespace App\Http\Controllers;

use App\Account;
use App\BasicSetting;
use App\Category;
use App\ChildCategory;
use App\Code;
use App\Color;
use App\Company;
use App\CompanyPayment;
use App\Customer;
use App\InstalmentTime;
use App\Order;
use App\Partner;
use App\Product;
use App\ProductImage;
use App\ProductSpecification;
use App\Size;
use App\Staff;
use App\Subcategory;
use App\Tag;
use App\TransactionLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        $this->middleware('checkStaff');
    }

    public function getDashboard()
    {
        $data['page_title'] = "Dashboard";
        $data['categoryCount'] = Category::all()->count();
        $data['productCount'] = Product::all()->count();
        $data['stockCount'] = Code::whereStatus(0)->count();

        $staffId = Auth::user()->id;

        $data['total_expense'] = Account::whereStaff_id($staffId)->wherePayment_type(2)->sum('pay_amount');
        $data['total_sell'] = Order::whereStaff_id($staffId)->count();
        $data['companyCount'] = Company::all()->count();

        $data['category'] = Category::all()->count();
        $data['customer'] = Customer::all()->count();

        return view('staff.dashboard',$data);
    }
    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        return view('staff.change-password',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::guard('staff')->user()->password;
            $c_id = Auth::guard('staff')->user()->id;

            $user = Staff::findOrFail($c_id);

            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                session()->flash('type','success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Current Password Not Match');
                session()->flash('type','warning');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', $e->getMessage());
            session()->flash('type','warning');
            return redirect()->back();
        }

    }
    public function editProfile()
    {
        $data['page_title'] = "Edit Staff Profile";
        $data['admin'] = Staff::findOrFail(Auth::user()->id);
        return view('staff.edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $admin = Staff::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff,email,'.$admin->id,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(215,215)->save($location);
            if ($admin->image != 'admin-default.png'){
                $path = './assets/images/'.$admin->image;
                File::delete($path);
            }
            $in['image'] = $filename;
        }
        $admin->fill($in)->save();
        session()->flash('message','Profile Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function newExpense()
    {
        $data['page_title'] = 'New Expense';
        return view('staff.expense-new',$data);
    }

    public function submitExpense(Request $request)
    {
        $request->validate([
           'payment_date' => 'required|date_format:Y-m-d H:i:s',
           'pay_amount' => 'required|numeric',
           'details' => 'required',
        ]);

        $in = Input::except('_method','_token');
        $in['payment_type'] = 2;
        $in['staff_id'] = Auth::user()->id;

        $basic = BasicSetting::first();

        $date = date('ymdHis');

        $tr['custom'] = 'EX-'.$date;
        $tr['status'] = 1;
        $tr['type'] = 7; // Expense Payment
        $tr['balance'] = $request->pay_amount;
        $tr['post_balance'] = $basic->balance - $request->pay_amount;
        $tr['staff_id'] = Auth::user()->id;
        TransactionLog::create($tr);
        $basic->balance -= $request->pay_amount;
        $basic->save();

        $in['custom'] = $tr['custom'];

        Account::create($in);

        session()->flash('message','Expense Completed Successfully.');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function historyExpense()
    {
        $data['page_title'] = 'Expense History';
        $data['history'] = Account::whereStaff_id(Auth::user()->id)->withTrashed()->get();
        return view('staff.expense-history',$data);
    }

    public function getTransactionLog()
    {
        $data['page_title'] = 'Transaction Log';
        $data['log'] = TransactionLog::whereStaff_id(Auth::user()->id)->latest()->paginate(15);
        return view('staff.transaction-log',$data);
    }

}
