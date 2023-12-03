<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\MailableContact;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function aboutUs()
    {
        return view('web.pages.about-us');
    }
    public function contact()
    {
        $setting = Settings::where('id',1)->first();
        return view('web.pages.contact',compact('setting'));
    }
    public function contactForm(ContactFormRequest $request)
    {
        $params = $request->all();
        try{

            $data = [
                'name' => $params['name'],
                'email1' => $params['email'],
                'phone' => $params['phone'],
                'message1' => $params['message'],
            ];

            // Mail::send('web.email.contact', $data, function ($message)
            // {
            //     $message->to('info@ozincitekstil.com.tr', config('app.name'))
            //         ->subject('İletişim Formundan Mesaj Aldınız');
            //     $message->from('info@ozincitekstil.com.tr', 'Websitesi İletişim Formu');
            // });
            $message = 'Form başarıyla gönderildi';

            Mail::to('info@asdasdasd.com')->send(new MailableContact($data));
        }
        catch(Exception $e){
            $message  = 'Hata oluştu. Lütfen daha sonra tekrar deneyiniz';
        }

        return redirect()->back()->with(['message'=>$message]);

    }

    public function references()
    {
        return view('web.pages.references');
    }
}
