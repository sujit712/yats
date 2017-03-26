<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Home_slider;
use App\portfolio_images;
use App\Video_main;
use App\Video_page_header;
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
    	return view('frontend.about');
    }

    public function video() {
        $data = Video_main::all();
        $Video_page_header = Video_page_header::all();
    	return view('frontend.video',['data' => $data,'Video_page_header'=>$Video_page_header]);
    }

    public function contact() {
    	return view('frontend.contact');
    }

}
