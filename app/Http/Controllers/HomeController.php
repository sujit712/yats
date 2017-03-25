<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Home_slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Home_slider::all();
        return view('backend/home',['data' => $data]);
    }

  
    public function addImageSlider(Request $request) {
        $rules = ['image' => 'required|mimes:jpeg,png,gif'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.'];

        $this->validate($request, $rules, $messages);

        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/home-slider',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/home-slider/'.$date.$uniqid.$image->getClientOriginalName();

        $Home_slider = new Home_slider;
        $Home_slider->image = $name;
        $Home_slider->status = ($request->status ? 1 : 0);

        $Home_slider->save();       

        return redirect()->back();
    }

    public function updateImageSlider(Request $request) {
        
        $status = ($request->status ? 1 : 0);
        if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif'];
            $messages = ['image.required' => 'Please enter image.',
                         'image.mimes' => 'Enter valid image.'];

            $this->validate($request, $rules, $messages);          

            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/home-slider',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/home-slider/'.$date.$uniqid.$image->getClientOriginalName();

            //delete old image
            if(file_exists($request->image_old)){
                unlink($request->image_old);
            }
            
        }else{
            $name = $request->image_old;
        }

        $updateRow = Home_slider::where('id', $request->id)->update(
                ['image' => $name,
                'status' => $status]);

        return redirect()->back()->with('message','Image has been updated.');
    }

    //Delete Image
    public function deleteImage(Request $request) {
        if(file_exists($request->image)){
            unlink($request->image);
        }
        $delImg = Home_slider::where('id',$request->id)->delete();
        return redirect()->back()->with('message','Image has been deleted.');
    }
}
