<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\About_us_header;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About_us_header::all();
        return view('backend/about', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //first delete all data
        $delAll = About_us_header::truncate();

        $rules = ['image' => 'required|mimes:jpeg,png,gif'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.'];
        $this->validate($request, $rules, $messages);

        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/about-us',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/about-us/'.$date.$uniqid.$image->getClientOriginalName();
        $caption=$request->caption;

        $abt = new About_us_header;
        $abt->image = $name;
        $abt->caption = ($caption ? $caption : '');
        $abt->save();

        return redirect()->back()->with('message','Image has been saved.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)*/
    public function update(Request $request, $id )
    {
        if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif'];
            $messages = ['image.required' => 'Please enter image.',
                         'image.mimes' => 'Enter valid image.'];

            $this->validate($request, $rules, $messages);          

            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/about-us',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/about-us/'.$date.$uniqid.$image->getClientOriginalName();

            //delete old image
            if(file_exists($request->image_old)){
                unlink($request->image_old);
            }
            
        }else{
            $name = $request->image_old;            
        }

        $caption = ($request->caption ? $request->caption : '');


        $updateRow = About_us_header::where('id', $id)->update(
                ['image' => $name,
                'caption' => $caption]);



        return redirect()->back()->with('message','Image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)*/
    public function destroy(Request $request, $id)
    {
        $get_image = About_us_header::where('id',$id)->first();
        if(file_exists($get_image->image)){
            unlink($get_image->image);
        }
        $delImg = About_us_header::where('id',$id)->delete();
        return redirect()->back()->with('message','Image has been deleted.');
    }
}
