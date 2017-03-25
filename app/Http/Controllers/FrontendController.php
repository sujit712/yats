<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Home_slider;
use App\portfolio_images;

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
    	return view('frontend.video');
    }

    public function contact() {
    	return view('frontend.contact');
    }

}
