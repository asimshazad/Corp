<?php

namespace App\Http\Controllers;

use App\Account;
use App\BasicSetting;
use App\Category;
use App\Code;
use App\Company;
use App\CompanyPayment;
use App\Coupon;
use App\Customer;
use App\InstalmentTime;
use App\Order;
use App\Plan;
use App\Post;
use App\Product;
use App\Section;
use App\Signal;
use App\SignalComment;
use App\SignalRating;
use App\Staff;
use App\StaffRequest;
use App\SubmitSignal;
use App\TraitsFolder\CommonTrait;
use App\TransactionLog;
use App\User;
use App\UserSignal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getDashboard()
    {
        
        $data['page_title'] = "Dashboard";
        $data['categoryCount'] = Category::all()->count();
        $data['productCount'] = Product::all()->count();
        $data['stockCount'] = Code::whereStatus(0)->count();

        $data['total_deposit'] = Account::wherePayment_type(0)->sum('pay_amount');
        $data['total_withdraw'] = Account::wherePayment_type(1)->sum('pay_amount');
        $data['total_expense'] = Account::wherePayment_type(2)->sum('pay_amount');



        $stock_product = Code::whereStatus(0)->get();
        $stock_amount = 0;
        foreach ($stock_product as $sp){
            $stock_amount += $sp->store->buy_price;
        }
        $data['stock_amount'] = $stock_amount;


        $data['total_sell'] = Code::whereStatus(1)->count();
        $sell_product = Code::whereStatus(1)->get();
        $sell_amount = 0;
        foreach ($sell_product as $ss){
            $sell_amount += $ss->store->sell_price;
        }
        $data['sell_amount'] = $sell_amount;
        $data['due_on'] = Order::whereStatus(2)->sum('due_amount');
        $data['instalment_on'] = InstalmentTime::whereStatus(0)->sum('amount');


        $data['companyCount'] = Company::all()->count();
        $data['company_send'] = CompanyPayment::sum('total_amount');
        $data['company_pay'] = CompanyPayment::sum('pay_amount');


        $data['category'] = Category::all()->count();
        $data['user'] = User::all()->count();

        return view('dashboard.dashboard',$data);
    }

    public function getTransactionLog()
    {
        $data['page_title'] = 'Transaction Log';
        $data['log'] = TransactionLog::withTrashed()->latest()->paginate(15);
        return view('dashboard.transaction-log',$data);
    }

    public function manageStaff()
    {
        $data['page_title'] = 'Manage Staff';
        $data['staff'] = Staff::all();
        return view('dashboard.staff',$data);
    }
    public function storeStaff(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:staff',
            'name' => 'required',
            'status' => 'required',
            'password' => 'required|confirmed|min:5'
        ]);
        $in = Input::except('_method','_token');
        $in['password'] = bcrypt($request->password);
        $product = Staff::create($in);
        $product['staffStatus'] = $request->status == 1 ? 'Active' : 'Deactive';
        return response()->json($product);

    }
    public function editStaff($product_id)
    {
        $product = Staff::find($product_id);
        return response()->json($product);
    }
    public function updateStaff(Request $request,$product_id)
    {
        $product = Staff::find($product_id);
        $request->validate([
            'email' => 'required|unique:staff,email,'.$product->id,
            'name' => 'required',
            'status' => 'required',
            'password' => 'nullable|confirmed|min:5'
        ]);
        $product->name = $request->name;
        $product->email = $request->email;
        $product->status = $request->status;
        if ($request->password != null){
            $product->password = bcrypt($request->password);
        }
        $product->save();
        $product['staffStatus'] = $request->status == 1 ? 'Active' : 'Deactive';
        return response()->json($product);
    }


}
