<?php

namespace App\TraitsFolder;

use App\BasicSetting;
use App\Order;
use App\OrderItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use NumberToWords\NumberToWords;
use Twilio\Rest\Client;

trait CommonTrait
{
    public function sendMail($email,$name,$subject,$text){
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => $subject,
        ];
        $body = $basic->email_body;
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$text,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    public function sendSignalMail($userId, $signalID)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $signal = Signal::findOrFail($signalID);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => 'info@cryptoexpect.com',
            'g_title' => $basic->title,
            'subject' => "New Trading Signal Receive",
        ];
        $text = "<b>$signal->title</b></<br></<br>$signal->description";
        $body = $basic->email_body;
        $body = str_replace("{{name}}",$user->name,$body);
        $body = str_replace("{{message}}",$text,$body);
        $body = str_replace("{{site_title}}",$basic->title,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }

    public function verificationSend($id)
    {
        $user = User::findOrFail($id);
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => "Email Verification",
        ];


        $text = '<h3>Please Verify Your Email-Address.</h3><h3>Your Verification Code Is : '.$user->code.'</h3>';

        $body = $basic->email_body;
        $body = str_replace("{{name}}",$user->name,$body);
        $body = str_replace("{{message}}",$text,$body);
        $body = str_replace("{{site_title}}",$basic->title,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    public function phoneVerification($userID)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userID);
        $text = "Verify Your Phone Number. Verification Code : ".$user->phone_code;
        $appi = $basic->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}",$user->country_code.$user->phone,$appi);
        $appi = str_replace("{{message}}",$text,$appi);
        $result = file_get_contents($appi);

    }

    public function telegramSend($signalID)
    {
        $basic = BasicSetting::first();
        if ($basic->telegram_status == 1){
            $signal = Signal::findOrFail($signalID);
            $botToken = $basic->smsapi;
            $web = 'https://api.telegram.org/bot'.$botToken;
            $update = file_get_contents($web."/getUpdates");
            $updateArray = json_decode($update,true);
            $chatId = $updateArray['result'][0]["message"]['chat']['id'];
            $text = strip_tags($signal->description);
            file_get_contents($web."/sendMessage?chat_id=".$chatId."&text=".$text);

        }

    }

    public function sendSignalSMS($userID)
    {
        $user = User::findOrFail($userID);
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $text = $basic->sms_tem;
        $to = $user->country_code.$user->phone;
        $text = urlencode($text);
        $appi = str_replace("{{number}}",$to,$appi);
        $appi = str_replace("{{message}}",$text,$appi);
        $result = file_get_contents($appi);
    }

    public function sendSms($to,$text){
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}",$to,$appi);
        $appi = str_replace("{{message}}",$text,$appi);
        $result = file_get_contents($appi);
    }

    public function sendContact($email,$name,$subject,$text,$phone)
    {
        $basic = BasicSetting::first();

        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Contact Message - '.$subject,
        ];

        $site_title = $basic->title;
        $body = $basic->email_body;
        $body = str_replace("Hi",'Hi. I\'m',$body);
        $body = str_replace("{{name}}",$name." - ".$phone,$body);
        $body = str_replace("{{message}}",$text,$body);
        $body = str_replace("{{site_title}}",$site_title,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }

    public function userPasswordReset($email,$name,$route)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Password Reset Request',
        ];

        $reset = DB::table('password_resets')->whereEmail($email)->count();
        $token = Str::random(40);
        $bToken = bcrypt($token);
        $url = route($route,$token);
        if ($reset == 0){
            DB::table('password_resets')->insert(
                ['email' => $email, 'token' => $bToken]
            );
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }else{
            DB::table('password_resets')
                ->where('email', $email)
                ->update(['email' => $email, 'token' => $bToken]);
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }
    }



    public function paymentConfirm($userId, $amount,$custom, $type)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => "Plan Subscribe purchase Completed",
        ];

        $urText = 'Plan Subscribe Successfully Confirmed : '.$basic->symbol.$amount.' via - '.$type.' <br> Order Number Is : '.$custom.'<br>';
        $body = $basic->email_body;
        $body = str_replace("{{name}}",$user->name,$body);
        $body = str_replace("{{message}}",$urText,$body);
        $body = str_replace("{{site_title}}",$basic->title,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }
    public static function getRating($rating)
    {
        if ($rating == 0){
            return '<i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        }elseif ($rating == 1){
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        }elseif ($rating == 2){
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        }elseif ($rating == 3){
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        }elseif ($rating == 4){
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i>';
        }else{
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>';
        }
    }

    public static function wordAmount($amount)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        return $numberTransformer->toWords($amount);
    }

}