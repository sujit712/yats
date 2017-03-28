<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Home_slider;
use App\portfolio_images;
use App\Video_main;
use App\Video_page_header;
use App\About_us_header;
use App\Contact_us;
class FrontendController extends Controller
{
    public function index() {
        $data = Home_slider::all();
    	return view('welcome',['data' => $data]);
    }

    public function portfolio() {
        $data = portfolio_images::all();
    	return view('frontend.portfolio',['data' => $data]);
    }

    public function about() {
        $data = About_us_header::all();
        foreach ($data as $value) {
            $image = $value->image;
            $caption = $value->caption;
        }
    	return view('frontend.about', ['image' => $image, 'caption' => $caption]);
    }

    public function video() {
        $data = Video_main::all();
        $Video_page_header = Video_page_header::all();
    	return view('frontend.video',['data' => $data,'Video_page_header'=>$Video_page_header]);
    }

    public function contact() {
        $data = Contact_us::all();
        foreach ($data as $val) {
            $image = $val->image;
            $caption = $val->caption;
            $email = $val->email;
            $address = $val->address;
            $contact_us_text = $val->contact_us_text;
            $phone = $val->phone;
        }
    	return view('frontend.contact',['image' => $image,
                                        'caption' => $caption,
                                        'email' => $email,
                                        'address' => $address,
                                        'contact_us_text'=> $contact_us_text,
                                        'phone' => $phone]);
    }

}
