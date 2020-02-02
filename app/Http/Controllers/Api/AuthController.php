<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use App\Models\Client;
use App\Models\DonationRequest;
use Cron\AbstractField;
use Illuminate\Support\Facades\Hash;
use Mail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    // ==========================   register    ============================= //


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'email' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'data_of_birth' => 'required',
            'last_donation_data' => 'required',
            'blood_type_id' => 'required',
        ]);


        if ($validator->fails()) {

            return responseJson('0', $validator->errors()->first(), $validator->fails());
        }


        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->password = bcrypt($request->password);
        $client->pin_code = Str::random(6);
        $client->save();

        return responseJson('1', 'success', [
            'api_token' => $client->api_token,
            'client' => $client,
        ]);
    }


    // ==========================   login    ============================= //


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return responseJson('0', $validator->errors()->first(), $validator->fails());
        }

        $client = Client::where('phone', $request->phone)->first();

        if ($client) {

            if (Hash::check($request->password, $client->password)) {

                return responseJson('1', 'تم التسجيل بنجاج', [
                    'api_token' => $client->api_token,
                    'client' => $client,
                ]);

            } else {
                return responseJson('0', 'البيانات غير صحيحه ');
            }

        } else {
            return responseJson('0', 'البيانات غير صحيحه ');
        }
    }


    // ==========================   resset password    ============================= //


    public function resetPassword(Request $request)
    {
        $client = Client::where('phone', $request->phone)->first();

        if ($client) {

            $code = Str::random(6);

            $update = $client->update(['pin_code' => $code]);

            if ($update) {
                Mail::to($client->email)
                    ->bcc('mahmoudayad289@gmail.com')
                    ->send(new ResetPassword($client));
                return responseJson(1, ['pin code send success']);

            }

        } else {
            return responseJson('0', 'not correct');
        }

    }


    // ==========================   new password     ============================= //


    public function newPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pin_code' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required',

        ]);


        if ($validator->fails()) {
            return responseJson('0', $validator->errors()->first(), $validator->fails());
        }


        $client = Client::where('pin_code', $request->pin_code)
            ->where('phone', $request->phone)
            ->where('pin_code', '!=', 0);


        if ($client) {

            $client->password = bcrypt($request->password);
            $client->pin_code = null;

            return responseJson('1', 'تم تغير كلمه السر بنجاح');

        } else {

            return responseJson('1', 'خطا في البيانات');

        }

    }


    // ==========================   edit profile      ============================= //


    public function editProfile(Request $request)
    {
       $validator = Validator::make($request->all(),[
           'password' => 'confirmed',
           'email' => 'unique:clients,email',
       ]);


        if ($validator->fails()) {
            return responseJson('0', $validator->errors()->first(), $validator->fails());
        }


        $client = auth()->user();


        $client->password = bcrypt($request->password);

        $client->update($request->all());

        $client->save();


        return responseJson('1','تم التعديل بنجاح',$client);




    }

    // ==========================   notificaion Settings     ============================= //


    public function notificationSettings(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'governorates' => 'array|exists:governorates,id',
            'blood_types' => 'array|exists:blood_types,id',

        ]);

        if ($validator->fails()) {
            return responseJson('0', $validator->errors()->first(), $validator->fails());
        }


        if($request->governorates){
            $request->user()->governorates()->sync($request->governorates);
        }

        if($request->blood_types){
            $request->user()->bloodTypes()->3($request->blood_types);
        }

        $data = [
            'governorates'  => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types'   => $request->user()->bloodTaypes()->pluck('blood_types.id')->toArray(),
        ];

        return responseJson(1,'success',$data);
    }


}
