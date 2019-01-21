<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Coupon;
use App\PaymentLog;
use App\PaymentMethod;
use App\Plan;
use App\Signal;
use App\SignalComment;
use App\SignalRating;
use App\StaffRequest;
use App\SubmitSignal;
use App\TransactionLog;
use App\User;
use App\UserSignal;
use App\WithdrawLog;
use App\WithdrawMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyUser');
        $this->middleware('auth');
    }

    public function getDashboard()
    {
        $data['page_title'] = "User Dashboard";
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['new_signal'] = UserSignal::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
        $data['all_signal'] = UserSignal::whereUser_id(Auth::user()->id)->count();

        if (Auth::user()->signal_status == 1){
            $data['balance'] = Auth::user()->balance;
            $data['total_provide'] = SubmitSignal::whereUser_id(Auth::user()->id)->count();
            $data['provide_approve'] = SubmitSignal::whereUser_id(Auth::user()->id)->whereStatus(1)->count();
            $data['provide_reject'] = SubmitSignal::whereUser_id(Auth::user()->id)->whereStatus(2)->count();
            $data['withdraw_last'] = WithdrawLog::whereUser_id(Auth::user()->id)->orderBy('id','desc')->first();
            $data['withdraw_total'] = WithdrawLog::whereUser_id(Auth::user()->id)->whereStatus(1)->sum('amount');
            $data['withdraw_pending'] = WithdrawLog::whereUser_id(Auth::user()->id)->whereStatus(0)->sum('amount');
            $data['withdraw_refund'] = WithdrawLog::whereUser_id(Auth::user()->id)->whereStatus(2)->sum('amount');
        }


        $start = Carbon::parse()->subDays(19);
        $end = Carbon::now();
        $stack = [];
        $date = $start;
        while ($date <= $end) {
            $stack[] = $date->copy();
            $date->addDays(1);
        }
        $dL = [];
        $dV = [];
        foreach (array_reverse($stack) as $d){
            $dL[] .= Carbon::parse($d)->format('dS M');

        }
        foreach (array_reverse($stack) as $d){
            $date = Carbon::parse($d)->format('Y-m-d');
            $start = $date.' '.'00:00:00';
            $end = $date.' '.'23:59:59';
            $dC= UserSignal::whereUser_id(Auth::user()->id)->whereBetween('created_at',[$start,$end])->get();
            $dV[] .= count($dC);
        }
        $data['dV'] = $dV;
        $data['dL'] = $dL;


        return view('user.dashboard',$data);
    }

    public function editProfile()
    {
        $data['page_title'] = "Edit Admin Profile";
        $data['admin'] = User::findOrFail(Auth::user()->id);
        return view('user.edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $admin = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->id,
            'phone' => 'required|min:5|unique:users,phone,'.$admin->id,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(215,215)->save($location);
            if ($admin->image != null){
                $path = './assets/images/';
                $link = $path.$admin->image;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $in['image'] = $filename;
        }
        $admin->fill($in)->save();
        session()->flash('message','Profile Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        return view('user.change-password',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;

            $user = User::findOrFail($c_id);

            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                session()->flash('title','Success');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Current Password Not Match');
                Session::flash('type', 'warning');
                session()->flash('title','Opps');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', $e->getMessage());
            Session::flash('type', 'warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }

    }

    public function newSignal()
    {
        $data['page_title'] = 'New Signal';
        $data['signal'] = UserSignal::orderBy('id','desc')->whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        return view('user.signal-new',$data);
    }

    public function AllSignal()
    {
        $data['page_title'] = 'All Signal';
        $uerId = Auth::user()->id;
        $data['signal'] = UserSignal::whereUser_id($uerId)->orderBy('id','desc')->paginate(10);
        return view('user.signal-all',$data);
    }

    public function signalView($id)
    {
        $signal = UserSignal::findOrFail($id);
        if ($signal->user_id == Auth::user()->id and $signal->id == $id){
            $signal->status = 1;
            $signal->save();
            $signalDetails = Signal::findOrFail($signal->signal_id);
            $data['page_title'] = $signalDetails->title;
            $data['signal'] = $signalDetails;
            $data['total_comment'] = SignalComment::whereSignal_id($signalDetails->id)->count();
            $data['comments'] = SignalComment::whereSignal_id($signalDetails->id)->get();
            $data['total_rating'] = SignalRating::whereSignal_id($signalDetails->id)->count();
            $data['sum_rating'] = SignalRating::whereSignal_id($signalDetails->id)->sum('rating');
            if ($data['total_rating'] == 0){
                $data['final_rating'] = 0;
            }else{
                $data['final_rating'] = round($data['sum_rating'] / $data['total_rating']);
            }
            $data['rating'] = SignalRating::whereSignal_id($signalDetails->id)->get();
            $data['user_rating'] = SignalRating::whereSignal_id($signalDetails->id)->whereUser_id(Auth::user()->id)->first();
            return view('user.signal-view',$data);
        }else{
            session()->flash('message','Something is Wrong.');
            session()->flash('type','warning');
            return redirect()->back();
        }
    }

    public function chosePayment()
    {
        $data['page_title'] = 'Chose Payment Method';
        $data['payment'] = PaymentMethod::whereStatus(1)->get();
        return view('user.payment-chose',$data);
    }

    public function submitPaymentMethod(Request $request)
    {
        $id = $request->id;
        $coupon = $request->coupon;

        $plan = Plan::findOrFail(Auth::user()->plan_id);
        $payment = PaymentMethod::findOrFail($id);

        $pL = PaymentLog::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
        if ($pL == 0){

            $cCheck = Coupon::whereCode($coupon)->first();
            if ($cCheck == null){
                $paymentLog['coupon_status'] = 0;
                $paymentLog['coupon_type'] = 0;
                $paymentLog['coupon_price'] = 0;
                $paymentLog['coupon_code'] = 'Invalid';
            }else{
                $cCheck->use_time = $cCheck->use_time +1;
                $cCheck->save();
                $paymentLog['coupon_status'] = 1;
                if ($cCheck->discount_type == 0){
                    $paymentLog['coupon_type'] = 0;
                    $paymentLog['coupon_price'] = $cCheck->fix;
                    $paymentLog['coupon_code'] = $coupon;
                }else{
                    $paymentLog['coupon_type'] = 1;
                    $paymentLog['coupon_price'] = round($plan->price*$cCheck->percent/100,2);
                    $paymentLog['coupon_code'] = $coupon;
                }

            }

            $paymentLog['user_id'] = Auth::user()->id;
            $paymentLog['payment_id'] = $id;
            $paymentLog['order_number'] = Str::random('16');
            $paymentLog['amount'] = $plan->price - $paymentLog['coupon_price'];
            $paymentLog['usd'] = round(($plan->price - $paymentLog['coupon_price']) / $payment->rate,2);
            if ($id == 3){
                $blockchain_receive_root = "https://api.blockchain.info/";
                $secret = "bitcoin_secret";
                $my_xpub = $payment->val2;
                $my_api_key = $payment->val1;
                $invoice_id = $paymentLog['order_number'];
                $callback_url = route('btc_ipn',['invoice_id'=>$invoice_id,'secret'=>$secret]);
                $url = $blockchain_receive_root."v2/receive?key=".$my_api_key."&callback=".urlencode($callback_url)."&xpub=".$my_xpub;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $resp = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($resp);

                $responseKey = key($response);
                if ($responseKey == 'message'){
                    session()->flash('message','Error In BTC Payment. Contact with Admin.');
                    session()->flash('type','warning');
                    return redirect()->back();
                }

                $sendto = $response->address;
                if ($sendto!="") {
                    $api = "https://blockchain.info/tobtc?currency=USD&value=".$paymentLog['usd'];
                    $usd = file_get_contents($api);
                    $paymentLog['btc_amo'] = $usd;
                    $paymentLog['btc_acc'] = $sendto;
                    $var = "bitcoin:$sendto?amount=$usd";
                    $data['usd'] = $usd;
                    $data['add'] = $sendto;
                    $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                }else{
                    session()->flash('message', "SOME ISSUE WITH API");
                    session()->flash('type', 'warning');
                    return redirect()->back();
                }
            }
            $data['payment'] = PaymentLog::create($paymentLog);
            $data['coupon_code'] = $paymentLog['coupon_code'];
            $data['page_title'] = 'Payment OverView';
            return view('user.payment-overview',$data);
        }else{

            $cCheck = Coupon::whereCode($coupon)->first();
            if ($cCheck == null){
                $paymentLog['coupon_status'] = 0;
                $paymentLog['coupon_type'] = 0;
                $paymentLog['coupon_price'] = 0;
                $paymentLog['coupon_code'] = 'Invalid';
            }else{
                $cCheck->use_time = $cCheck->use_time +1;
                $cCheck->save();
                $paymentLog['coupon_status'] = 1;
                if ($cCheck->discount_type == 0){
                    $paymentLog['coupon_type'] = 0;
                    $paymentLog['coupon_price'] = $cCheck->fix;
                    $paymentLog['coupon_code'] = $coupon;
                }else{
                    $paymentLog['coupon_type'] = 1;
                    $paymentLog['coupon_price'] = round($plan->price*$cCheck->percent/100,2);
                    $paymentLog['coupon_code'] = $coupon;
                }

            }

            $pay = PaymentLog::whereUser_id(Auth::user()->id)->first();
            $paymentLog['amount'] = $plan->price - $paymentLog['coupon_price'];
            $paymentLog['usd'] = round(($plan->price - $paymentLog['coupon_price']) / $payment->rate,2);
            $paymentLog['payment_id'] = $id;
            $usd = $paymentLog['usd'];
            if ($id == 3){
                $blockchain_receive_root = "https://api.blockchain.info/";
                $secret = "bitcoin_secret";
                $my_xpub = $payment->val2;
                $my_api_key = $payment->val1;
                $invoice_id = $pay->order_number;

                $callback_url = route('btc_ipn',['invoice_id'=>$invoice_id,'secret'=>$secret]);

                if ($pay->btc_acc == null){

                    $url = $blockchain_receive_root."v2/receive?key=".$my_api_key."&callback=".urlencode($callback_url)."&xpub=".$my_xpub;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $resp = curl_exec($ch);
                    curl_close($ch);
                    $response = json_decode($resp,true);

                    $responseKey = key($response);
                    if ($responseKey == 'message'){
                        session()->flash('message','Error In BTC Payment. Contact with Admin.');
                        session()->flash('type','warning');
                        return redirect()->back();
                    }

                    $sendto = $response->address;
                    if ($sendto!="") {
                        $api = "https://blockchain.info/tobtc?currency=USD&value=".$usd;
                        $usd = file_get_contents($api);
                        $paymentLog['btc_amo'] = $usd;
                        $paymentLog['btc_acc'] = $sendto;
                        $var = "bitcoin:$sendto?amount=$usd";
                        $data['usd'] = $usd;
                        $data['add'] = $sendto;
                        $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                    }else{
                        session()->flash('message', "SOME ISSUE WITH API");
                        session()->flash('type', 'warning');
                        return redirect()->back();
                    }
                }else{
                    $api = "https://blockchain.info/tobtc?currency=USD&value=".$usd;
                    $usd = file_get_contents($api);
                    $sendto = $pay->btc_acc;
                    $var = "bitcoin:$sendto?amount=$usd";
                    $data['usd'] = $usd;
                    $data['add'] = $sendto;
                    $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                }

            }
            $pay->fill($paymentLog)->save();
            $data['payment'] = PaymentLog::findOrFail($pay->id);
            $data['page_title'] = 'Payment OverView';
            $data['coupon_code'] = $paymentLog['coupon_code'];
            return view('user.payment-overview',$data);

        }
    }

    public function getUpgradePlan()
    {
        $data['page_title'] = 'Upgrade Plan';
        $data['plan'] = Plan::whereStatus(1)->get();
        return view('user.upgrade-plan',$data);
    }

    public function updatePlanSubmit(Request $request)
    {
        $plan = Plan::findOrFail($request->delete_id);
        if ($plan->price == 0){
            $user  = User::findOrFail(Auth::user()->id);
            $user->plan_status = 1;
            $user->plan_id = $request->delete_id;
            $user->save();
            session()->flash('message','Plan Upgrade Successfully');
            session()->flash('type','success');
            return redirect()->back();
        }else{
            $user  = User::findOrFail(Auth::user()->id);
            $user->plan_status = 0;
            $user->plan_id = $request->delete_id;
            $user->save();
            return redirect()->route('plan-upgrade-payment');
        }
    }

    public function planUpgradePayment()
    {
        $data['page_title'] = 'Plan Upgrade Payment';
        $data['plan'] = Plan::findOrFail(Auth::user()->plan_id);
        $data['payment'] = PaymentMethod::whereStatus(1)->get();
        return view('user.plan-update-payment',$data);
    }

    public function activeTelegram()
    {
        $data['page_title'] = "Active Telegram";
        return view('user.active-telegram',$data);
    }

    public function submitActiveTelegram(Request $request)
    {
        $basic = BasicSetting::first();

        $username = Auth::user()->telegram_token;
        $user = User::findOrFail(Auth::user()->id);
        $telegram_text = $username;
        $botToken = $basic->telegram_token;
        $web = 'https://api.telegram.org/bot'.$botToken;
        $update = file_get_contents($web."/getUpdates");
        $updateArray = json_decode($update,true);
        $chatId = null;
        foreach ($updateArray['result'] as $arr){
            if ($arr["message"]['text'] = $telegram_text){
                $chatId = $arr["message"]['chat']['id'];
            }
        }
        if ($chatId != null){
            $user->telegram_id = $chatId;
            $user->save();
            file_get_contents($web."/sendMessage?chat_id=".$chatId."&text=".$username." - Telegram Notification Activated Successfully");
            session()->flash('message','Telegram Signal Is Activated.');
            session()->flash('type','success');
            return redirect()->back();
        }else{
            session()->flash('message','Error In Telegram Token.');
            session()->flash('type','warning');
            return redirect()->back();
        }

    }

    public function staffRequest()
    {
        $data['page_title'] = 'Become a Staff';
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.staff-request',$data);
    }

    public function submitStaffRequest(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->signal_status = 2;
        $user->save();
        $us['user_id'] = Auth::user()->id;
        $us['status'] = 0;
        StaffRequest::create($us);
        \session()->flash('message','Request Send Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function submitUserSignal()
    {
        $data['page_title'] = 'Submit Signal';
        return view('user.signal-submit',$data);
    }

    public function PostSubmitUserSignal(Request $request)
    {
        $request->validate([
           'title' => 'required',
            'description' => 'required'
        ]);
        $uu = Input::except('_method','_token');
        $uu['user_id'] = Auth::user()->id;
        SubmitSignal::create($uu);
        \session()->flash('message','Signal Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function submitHistory()
    {
        $data['page_title'] = 'Signal Submit History';
        $data['history'] = SubmitSignal::whereUser_id(Auth::user()->id)->latest()->paginate(15);
        return view('user.signal-history',$data);
    }

    public function submitView($id)
    {
        $data['page_title'] = 'View Submitted Signal';
        $data['signal'] = SubmitSignal::whereUser_id(Auth::user()->id)->whereId($id)->first();
        if ($data['signal'] == null){
            \session()->flash('message','Something is Wrong.');
            \session()->flash('type','warning');
            return redirect()->back();
        }else{
            return view('user.submit-signal-view',$data);
        }
    }

    public function transactionLog()
    {
        $data['page_title'] = "Transaction Log";
        $data['log'] = TransactionLog::whereUser_id(Auth::user()->id)->latest()->paginate(15);
        return view('user.transaction-log',$data);
    }

    public function withdrawNow()
    {
        $data['page_title'] = 'Withdraw Now';
        $data['method'] = WithdrawMethod::whereStatus(1)->get();
        return view('user.withdraw-now',$data);
    }

    public function withdrawMethod($id)
    {
        $withdraw = WithdrawMethod::findOrFail($id);
        $data['page_title'] = 'Withdraw Via - '.$withdraw->name;
        $data['method'] = $withdraw;
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.withdraw-preview',$data);
    }

    public function checkWithdraw($av,$amount,$min,$max)
    {
        if ($amount > $av){
            $rr = [
                'errorStatus' => 'yes',
                'errorDetails' => 'Amount Large Then Available Amount',
            ];
            return $result = json_encode($rr);
        }elseif ($amount < $min){
            $rr = [
                'errorStatus' => 'yes',
                'errorDetails' => 'Amount Small Then Minimum Amount',
            ];
            return $result = json_encode($rr);
        }elseif ($amount > $max){
            $rr = [
                'errorStatus' => 'yes',
                'errorDetails' => 'Amount Large Then Maximum Amount',
            ];
            return $result = json_encode($rr);
        }else{
            $rr = [
                'errorStatus' => 'no',
                'errorDetails' => 'You Can withdraw This Amount.',
            ];
            return $result = json_encode($rr);
        }
    }

    public function withdrawConfirm(Request $request)
    {

        $request->validate([
            'method_id' => 'required',
            'amount' => 'required|numeric',
            'details' => 'required'
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $method = WithdrawMethod::findOrFail($request->method_id);

        $available = $user->balance - $method->charge;
        $amount = $request->amount;

        if ($amount > $available){
            session()->flash('message','Amount Large Then Available Amount');
            session()->flash('type','warning');
            return redirect()->route('user-withdraw-method',$method->id);
        }elseif ($amount < $method->withdraw_min){
            session()->flash('message','Amount Small Then Minimum Amount');
            session()->flash('type','warning');
            return redirect()->route('user-withdraw-method',$method->id);
        }elseif ($amount > $method->withdraw_max){
            session()->flash('message','Amount Small Then Maximum Amount');
            session()->flash('type','warning');
            return redirect()->route('user-withdraw-method',$method->id);
        }else{

            $withLog['custom'] = strtoupper(Str::random(12));

            $tr['custom'] = $withLog['custom'];
            $tr['user_id'] = $user->id;
            $tr['type'] = 4 ;
            $tr['balance'] = $method->charge;
            $tr['post_balance'] = $user->balance - ($request->amount + $method->charge);
            $tr['details'] = 'Withdraw Charge For '.$method->name;
            TransactionLog::create($tr);

            $tr['custom'] = $withLog['custom'];
            $tr['user_id'] = $user->id;
            $tr['type'] = 3 ;
            $tr['balance'] = $request->amount;
            $tr['post_balance'] = $user->balance - $request->amount;
            $tr['details'] = 'Withdraw Via '.$method->name;
            TransactionLog::create($tr);

            $withLog['user_id'] = $user->id;
            $withLog['method_id'] = $method->id;
            $withLog['amount'] = $request->amount;
            $withLog['charge'] = $method->charge;
            $withLog['details'] = $request->details;
            $withLog['status'] = 0;
            WithdrawLog::create($withLog);

            $user->balance = $user->balance - ($request->amount + $method->charge);
            $user->save();

            \session()->flash('message','Withdraw Request Accept.');
            \session()->flash('type','success');
            return redirect()->route('user-withdraw-now');
        }
    }

    public function withdrawHistory()
    {
        $data['page_title'] = 'Withdraw History';
        $data['log'] = WithdrawLog::whereUser_id(Auth::user()->id)->latest()->paginate(10);
        return view('user.withdraw-history',$data);
    }

    public function commentSubmit(Request $request)
    {
        $request->validate([
           'comment' => 'required',
           'signal_id' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $in['user_id'] = Auth::user()->id;
        SignalComment::create($in);
        \session()->flash('message','Comment Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function ratingSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required',
            'rating' => 'required'
        ]);

        $in = Input::except('_method','_token');
        $in['user_id'] = Auth::user()->id;
        SignalRating::create($in);
        \session()->flash('message','Rating Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }


}
