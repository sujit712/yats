<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\portfolio_images;
use App\profile_class;


class PortfolioController extends Controller
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
        //
         $data = portfolio_images::all();
         $profile_class = profile_class::all();
        return view('backend/portfolio',['data' => $data],['profile_class'=>$profile_class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        //
         $rules = ['image' => 'required|mimes:jpeg,png,gif'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.'];

        $this->validate($request, $rules, $messages);

        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/portfolio',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/portfolio/'.$date.$uniqid.$image->getClientOriginalName();
        $caption=$request->caption;
        $property=$request->property;
        $portfolio_images = new portfolio_images;
        $portfolio_images->image = $name;
        $portfolio_images->caption = $caption;
        $portfolio_images->property = $property;
        $portfolio_images->status=1;

        $portfolio_images->save();       

        return redirect()->back()->with('message','Image has been added successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        //
        if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif'];
            $messages = ['image.required' => 'Please enter image.',
                         'image.mimes' => 'Enter valid image.'];

            $this->validate($request, $rules, $messages);          

            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/portfolio',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/portfolio/'.$date.$uniqid.$image->getClientOriginalName();

            //delete old image
            if(file_exists($request->image_old)){
                unlink($request->image_old);
            }
            
        }else{
            $name = $request->image_old;
        }
        $status = $request->status;
        $caption=$request->caption;
        $property=$request->property;
        $updateRow = portfolio_images::where('id', $request->id)->update(
                ['image' => $name,
                'caption' => $caption,
                'property' => $property,
                'status' => $status]);

        return redirect()->back()->with('message','Image has been updated.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if(file_exists($request->image)){
            unlink($request->image);
        }
        $delImg = portfolio_images::where('id',$request->id)->delete();
        return redirect()->back()->with('message','Image has been deleted.');
    }
}
