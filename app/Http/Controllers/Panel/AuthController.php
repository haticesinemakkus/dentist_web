<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Admin;

use Session;
use Validator;

class AuthController extends Controller
{

    public function login()
    {
        if(Auth::guard('admin')->check())
            return redirect()->route('panel.index');

        return view('panel.login');
    }

    public function access(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:admin|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required',
        ];
        $messages = [
            'password.required' => 'Şifre zorunludur.',
            'email.exists' => 'Bu email kayıtlı değil.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rememberme = $request->rememberme;
        $credentials = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials, $rememberme))
        {
            if(Auth::guard('admin')->user()->is_active == 0) {
                Auth::guard('admin')->logout();

                return redirect()->route('panel.login')->withError('Hesabınız pasif durumda');
            }

            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'last_login' => Carbon::now()
            ]);

            return redirect()->route('panel.index');
        }

        return redirect()->route('panel.login')->withError('Hesap bilgileri yanlış!')->withInput();
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return redirect()->route('panel.login');
    }

}
