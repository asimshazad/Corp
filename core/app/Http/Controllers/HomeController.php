<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Category;
use App\Company;
use App\Coupon;
use App\Customer;
use App\Member;
use App\Menu;
use App\Partner;
use App\Plan;
use App\Post;
use App\Product;
use App\Signal;
use App\Slider;
use App\Social;
use App\Speciality;
use App\Subscribe;
use App\Testimonial;
use App\TraitsFolder\CommonTrait;
use App\User;
use App\UserSignal;
use Authy\AuthyApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    use CommonTrait;
    public function getIndex()
    {

        $data['page_title'] = "Home Page";
        $data['slider'] = Slider::all();
        $data['speciality'] = Speciality::all();
        $data['testimonial'] = Testimonial::all();
        $data['social'] = Social::all();
        $data['total_customer'] = Customer::all()->count();
        $data['total_category'] = Category::all()->count();
        $data['total_product'] = Product::all()->count();
        $data['total_company'] = Company::all()->count();
        return view('layouts.frontEnd',$data);
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $this->sendContact($request->email,$request->name,$request->subject,$request->message,$request->phone);
        session()->flash('message','Contact Message Successfully Send.');
        session()->flash('type','success');
        return redirect()->back();
    }


}
