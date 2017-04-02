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
        $value = About_us_header::all()->first();
             $image = empty($value->image) ? 'img/contact-us/default.jpg' : $value->image;   
             $caption = empty($value->caption) ? 'About us' : $value->caption; 

    	return view('frontend.about', ['image' => $image, 'caption' => $caption]);
    }

    public function video() {
        $data = Video_main::all();
        $vdata = Video_page_header::all()->first();
        $image = empty($vdata->image) ? 'img/contact-us/default.jpg' : $vdata->image;
        $title = empty($vdata->title) ? "Hello, I am Yatin Dandekar. Photographer from India, I like To Capture The Perfect" : $vdata->title;
    	return view('frontend.video',['data' => $data,'image'=>$image, 'title' => $title]);
    }

    public function contact() {
        $value = Contact_us::all()->first();

        $image = empty($value->image) ? 'img/contact-us/default.jpg' : $value->image; 
        $caption = empty($value->caption) ? 'GET IN TOUCH' : $value->caption; 
        $email = empty($value->email) ? 'yatindandekar31@gmail.com' : $value->email; 
        $address = empty($value->address) ? "Workshop Studio Address: 14 Sainath Industrial Estate, Mahakali Caves Road, Opp Domino's Pizza, Andheri East, Mumbai 400093. Corespondent Address: Yatin K. Dandekar, Kores Nakshatra, Chitra 1/204, Vartak Nagar, Pokhran Road 1. Thane west Pin 400 606" : $value->address; 
        $contact_us_text = empty($value->contact_us_text) ? 'Get in touch right now and book your seat for amazing courses' : $value->contact_us_text; 
        $phone = empty($value->phone) ? '9004066588' : $value->phone; 

//dd($contact_us_text);exit;

    	return view('frontend.contact',['image' => $image,
                                        'caption' => $caption,
                                        'email' => $email,
                                        'address' => $address,
                                        'contact_us_text'=> $contact_us_text,
                                        'phone' => $phone]);
    }

}
