<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\DonationFormRequest;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at','desc')->take(6)->get();

        $donations = DonationRequest::where(function ($query) use ($request)  {

            if($request->city_id) {

               $query->where('city_id' , $request->city_id);
            }

            if ($request->blood_type_id) {

                $query->where('blood_type_id' , $request->blood_type_id);
            }

        })->take(4)->get();

        return view('front.index',compact('posts','donations'));
    }


    public function toggleFavourite(Request $request)
    {
        $toggle = auth('site_client')->user()->posts()->toggle($request->post_id);

        return responseJson('1','success',$toggle);

    }


    public function post($id)
    {

        $post = Post::findOrFail($id);
        return view('front.post',compact('post'));
    }


    public function posts()
    {

        $posts = Post::all();

        return view('front.posts', compact('posts'));

    }


    public function donations()
    {
        $donations = DonationRequest::paginate(12);


        return view('front.donations', compact('donations'));

    }


    public function showDonation()
    {

        return view('front.createDonation');

    }


    public function createDonation(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'number_of_bags' => 'required|numeric',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',
            'client_id' => '',
            'number' => 'required',
            'message' => 'required',
        ]);

        DonationRequest::create($request->all());

        flash('تمت العمليه بنجاح')->success();


        return redirect('/');

    }


    public function detailsDonation($id)
    {

        $donation  = DonationRequest::findOrFail($id);


        return view('front.donation-details', compact('donation'));

    }




    public function aboutUs()
    {
        return view('front.about-us');

    }


    public function showContact()
    {
        $settings = Setting::first();

        return view('front.contact',compact('settings'));

    }


    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);



        Contact::create($request->all());

        flash('تمت العمليه بنجاح')->success();

        return back();

    }


}
