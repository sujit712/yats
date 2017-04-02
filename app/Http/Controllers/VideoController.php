<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\profile_class;
use App\Video_main;
use App\Video_page_header;
class VideoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $data = Video_main::all();
        $vdata= Video_page_header::all()->first();
        $image = empty($vdata->image) ? 'img/contact-us/default.jpg' : $vdata->image;
        $title = empty($vdata->title) ? "Hello, I am Yatin Dandekar. Photographer from India, I like To Capture The Perfect" : $vdata->title;
        return view('backend/video',['data' => $data,'image'=>$image, 'title' => $title]);
        
    }
    public function create(Request $request)
    {
    	$rules = ['image' => 'required|mimes:jpeg,png,gif',
    			   'video_url'=>'required'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.',
                     'video_url.required'=>'Video url required'];

        $this->validate($request, $rules, $messages);

        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/video-images',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/video-images/'.$date.$uniqid.$image->getClientOriginalName();
        $caption=$request->caption;
        $property=$request->property;
        $video_url=$request->video_url;
        $Video_main = new Video_main;
        $Video_main->display_image = str_replace(" ", "%20", $name);
        $Video_main->caption = $caption;
        $Video_main->property = $property;
        $Video_main->video_url=$video_url;
        $Video_main->status=1;

        $Video_main->save();       

        return redirect()->back()->with('message','Image has been added successfully.');
    }
    public function edit(Request $request)
    {
        //
        if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif',
    			   'video_url'=>'required'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.',
                     'video_url.required'=>'Video url required'];
            $this->validate($request, $rules, $messages);          

            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/video-images',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/video-images/'.$date.$uniqid.$image->getClientOriginalName();

            //delete old image
            $request->image_old = str_replace("%20", " ", $request->image_old);
            if(file_exists($request->image_old)){
                unlink($request->image_old);
            }
            
        }else{
            $name = $request->image_old;
        }
        $rules = ['video_url'=>'required'];
        $messages = ['video_url.required'=>'Video url required'];
        $this->validate($request, $rules, $messages);
        $status = $request->status;
        $caption=$request->caption;
        $property=$request->property;
        $video_url=$request->video_url;
        $updateRow = Video_main::where('id', $request->id)->update(
                ['display_image' => str_replace(" ", "%20", $name),
                'caption' => $caption,
                'property' => $property,
                'status' => $status,
                'video_url' => $video_url]);

        return redirect()->back()->with('message','Image has been updated.');
    }
    public function destroy(Request $request)
    {
        //
        $request->image=str_replace("%20", " ", $request->image);
        if(file_exists($request->image)){
            unlink($request->image);
        }
        $delImg = Video_main::where('id',$request->id)->delete();
        return redirect()->back()->with('message','Image has been deleted.');
    }
    public function video_header(Request $request)
    {
    	$video_header_data = Video_page_header::find(1);
        if($video_header_data==NULL)
        {
        	$rules = ['image' => 'required|mimes:jpeg,png,gif'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.'];
        $this->validate($request, $rules, $messages);
        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/video-images',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/video-images/'.$date.$uniqid.$image->getClientOriginalName();
        $caption=$request->caption;
        $Video_page_header = new Video_page_header;
        $Video_page_header->image = str_replace(" ", "%20", $name);
        $Video_page_header->title = $caption;
        $Video_page_header->save();       
        return redirect()->back()->with('message','Image has been added successfully.');
        }else{
        	 if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.'];
            $this->validate($request, $rules, $messages);          
            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/video-images',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/video-images/'.$date.$uniqid.$image->getClientOriginalName();
            //delete old image
            $video_header_data->image=str_replace("%20", " ", $video_header_data->image);
            if(file_exists($video_header_data->image)){
                unlink($video_header_data->image);
            }
            
        }else{
            $name = $video_header_data->image;
        }
        $caption=$request->caption;
        $updateRow = Video_page_header::where('id',$video_header_data->id)->update(
                ['image' => str_replace(" ", "%20", $name),
                'title' => $caption]);
        return redirect()->back()->with('message','Image has been updated.');
        }
    }
}
