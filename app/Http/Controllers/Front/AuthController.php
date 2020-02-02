<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegister()
    {
       return view('front.register');

    }

    public function doRegister(ClientFormRequest $request)
    {

        $request->validated();


        $client = Client::create($request->all());

        $client->password = bcrypt($request->password);

        $client->api_token = Str::random(60);

        $client->pin_code = Str::random(6);


        $client->save();

        flash('تمت العمليه بنجاح')->success();


        return redirect(route('do.login'));

    }


    public function showLogin()
    {
        return view('front.login');

    }



    public function doLogin(Request $request)
    {

        $this->validate($request,[
            'phone'    => 'required',
            'password' => 'required',
        ]);



        $client = Client::where('phone',$request->phone)->first();


        if(\auth()->guard('site_client')->attempt($request->only('phone','password'))) {

            flash('تمت التسجيل بنجاح')->success();

            return redirect('/');
        } else {

            flash('  فشل تسجبل الدخول')->error();

            return redirect('/');
    }


    }


    public function logout()
    {
        \auth()->guard('site_client')->logout();

        return redirect(route('do.login'));

    }
}
