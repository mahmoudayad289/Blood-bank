<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorat;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Token;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function governorates() {

        $governorates =   Governorat::all();

        return responseJson('1','all governorates',$governorates);
    }

    public function cities() {

        $cities =   City::all();

        return responseJson('1','all cities',$cities);
    }


      // ==========================  all posts   ============================= //

    public function posts()
    {
        $posts = Post::with('category')->paginate(10);

        return responseJson('1','all posts',$posts);
    }


    // ==========================  one post    ============================= //


    public function post(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'post_id' => 'required',
        ]);

        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }

        $post = Post::find($request->post_id);

        if ($post) {

            return responseJson('1','نجح عرض المقال',$post);

        } else {
            return responseJson('0',' فشل عرض المقال');

        }

    }

    // ==========================    Favourite posts    ============================= //


    public function favouritePost(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'post_id' => 'required',
        ]);

        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }

        $post = Post::find($request->post_id);

        if ($post) {

            $favourite = $request->user()->posts()->toggle($request->post_id);

            return responseJson('1','تم تفضيل المقال',$favourite);

        } else {
            return responseJson('0','فشل تفضيل المقال');

        }
    }


    // ==========================  list Favourite      ============================= //

    public function listFavourite(Request $request)
    {

        $posts = $request->user()->posts()->paginate(10);

        return responseJson('1','عرض المفضله',$posts);

    }


    // ==========================  blood types     ============================= //

    public function bloodType()
    {
        $b_type = BloodType::all();

        return responseJson('1','تم عرض فصائل الدم بنجاح',$b_type);
    }


    // ==========================  contacts     ============================= //


    public function contacts()
    {

        $cont = Contact::all();

        return responseJson('1','تم عرض البيانات بنجاح ',$cont);

    }


    // ==========================   notifications   ============================= //

    public function notifications()
    {
        $not = Notification::all();

        return responseJson('1','تم عرض البيانات بنجاح ',$not);
    }

    // ==========================   register token    ============================= //

    public function registerToken(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'token'              => 'required',
            'platform'           => 'required|in:android,ios',
        ]);

        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }

       $token =  Token::where('token',$request->token)->delete();

        $request->user()->tokens()->create($request->all());

        return responseJson('1','تم التسجيل بنجاح',$token);

    }


    // ==========================   remove token    ============================= //


    public function removeToken(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'token'              => 'required',
        ]);

        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }

        Token::where('token',$request->token)->delete();


        return responseJson('1','تم الحذف بنجاح');

    }


    // ==========================   make donation request   ============================= //


    public function donationCreate(Request $request , Client $client)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'age'           => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'number_of_bags' => 'required',
            'hospital_name' => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'hospital_address' => 'required',
            'city_id'       => 'required|exists:cities,id',
            'number'        => 'required',
            'message'       => 'required',
        ]);


        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }


       $donation_request = $request->user()->donationRequest()->create($request->all());



        // get clinets for this governorates

        $clientsId = $donation_request->city->governorate
            ->clients()->whereHas('bloodTypes' , function ($q) use ($request,$donation_request) {

                $q->where('blood_types.id',$donation_request->blood_type_id);

            })->pluck('clients.id')->toArray();

        // create notifications for this clinet

        if (count($clientsId)) {

            $notifications = $donation_request->notifications()->create([
                'title' => 'يوجد حاله تبرع',
                'content' => $donation_request->bloodtype->name . 'محتاج متبرع لفصيلة',
            ]);

            // attach client to this notifications
            $notifications->clients()->attach($clientsId);
        }

        // get the token for this client

        $tokens = $request->user()->tokens()->where('token','!=','')

            ->whereIn('client_id',$clientsId)->pluck('token')->toArray();

       //    dd($tokens);

        if (count($tokens)) {


            $title = $notifications->title;
            $content = $notifications->content;

            $data = [

                'donation_request_id' => $donation_request->id,
            ];


            info(json_encode($data));


            $send = notifyByFirebase($title,$content,$tokens,$data);

           // dd($send);

        }

        return responseJson('1','تم الاضافه بنجاح',$donation_request->load('city'));

    }


    // ==========================   donationd detalis   ============================= //


    public function donationDetalis(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'donation_request_id' => 'required|exists:donation_requests,id',
        ]);

        if ($validator->fails()) {

            return responseJson('0',$validator->errors()->first(),$validator->fails());

        }


        $donation_detalis = DonationRequest::find($request->donation_request_id);


        if ($donation_detalis) {

            return responseJson('1','نجح عرض الفصيله',$donation_detalis);

        } else {
            return responseJson('0','فشل عرض الفصيله');

        }

    }



    // ==========================   donations requests    ============================= //


    public function donationRequests()
    {

        $donation  = DonationRequest::paginate(10);

        return responseJson('1','نجح عرض الفصائل',$donation);
    }

}
