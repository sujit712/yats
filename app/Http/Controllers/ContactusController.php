<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Contact_us;



class ContactusController extends Controller
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
        $data = Contact_us::all();
        return view('backend.contact',['data' => $data]);   
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
        $delAll = Contact_us::truncate();

        $rules = ['image' => 'required|mimes:jpeg,png,gif',
                  'email' => 'required|email',
                  'phone' => 'required|numeric',
                  'address' => 'required'];
        $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.',
                     'email.required' => 'Enter email address.',
                     'email.email' => 'Enter valid email address.',
                     'phone.required' => 'Enter phone number,',
                     'phone.number' => 'Enter valid phone number',
                     'address.required' => 'Please enter address.'];
        $this->validate($request, $rules, $messages);

        $date = date("Y_m_d");
        $uniqid = uniqid();
        $image = $request->image;
        $image->move('img/contact-us',$date.$uniqid.$image->getClientOriginalName());
        $name = 'img/contact-us/'.$date.$uniqid.$image->getClientOriginalName();
        $caption=$request->caption;

        $contactUs = new Contact_us;
        $contactUs->image = str_replace(" ", "%20", $name);
        $contactUs->caption = ($caption ? $caption : '');
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->address = $request->address;
        $contactUs->contact_us_text = ($request->contact_us_text ? $request->contact_us_text : '');

        $contactUs->save();

        return redirect()->back()->with('message','Contact information has been saved.');
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
    public function update(Request $request, $id)
    {
        if($request->image){  

            $rules = ['image' => 'required|mimes:jpeg,png,gif',
                  'email' => 'required|email',
                  'phone' => 'required|numeric',
                  'address' => 'required'];
            $messages = ['image.required' => 'Please enter image.',
                     'image.mimes' => 'Enter valid image.',
                     'email.required' => 'Enter email address.',
                     'email.email' => 'Enter valid email address.',
                     'phone.required' => 'Enter phone number,',
                     'phone.number' => 'Enter valid phone number',
                     'address.required' => 'Please enter address.'];
             $this->validate($request, $rules, $messages);    

            $date = date("Y_m_d");
            $uniqid = uniqid();
            $image = $request->image;
            $image->move('img/contact-us',$date.$uniqid.$image->getClientOriginalName());
            $name = 'img/contact-us/'.$date.$uniqid.$image->getClientOriginalName();

            //delete old image
            $request->image_old = str_replace("%20", " ", $request->image_old);
            if(file_exists($request->image_old)){
                unlink($request->image_old);
            }
            
        }else{
             $rules = ['email' => 'required|email',
                  'phone' => 'required|numeric',
                  'address' => 'required'];
            $messages = ['email.required' => 'Enter email address.',
                     'email.email' => 'Enter valid email address.',
                     'phone.required' => 'Enter phone number,',
                     'phone.number' => 'Enter valid phone number',
                     'address.required' => 'Please enter address.'];
            $this->validate($request, $rules, $messages);

            $name = $request->image_old;         
        }

        $caption = ($request->caption ? $request->caption : '');
        $contact_us_text = ($request->contact_us_text ? $request->contact_us_text : '');


        $updateRow = Contact_us::where('id', $id)->update(
                ['image' => str_replace(" ", "%20", $name),
                'caption' => $caption,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'contact_us_text' => $contact_us_text]);



        return redirect()->back()->with('message','Contact information has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Contact_us::where('id', $id)->first();

    $img->image=str_replace("%20", " ", $img->image);
        if(file_exists($img->image)){
            unlink($img->image);
        }
        $delImg = Contact_us::where('id',$id)->delete();
        return redirect()->back()->with('message','Image has been deleted.');
    }

    public function sendmail(Request $request) {
       $this->validate($request, ['name' => 'required',
                                  'email' => 'required|email',
                                  'message' => 'required'],
                                  ['name.required' => 'Please enter name.',
                                  'email.required' => 'Please enter email.',
                                  'email.email' => 'Please enter valid email ID.',
                                  'message.required' => 'Please enter message.']);

       // $to = "7sujit12@gmail.com";
       //  $subject = "New contact arrived";
       //  $txt="Name: ".$request->name."<br>";
       //  $txt.="Email: ".$request->email."<br>";
       //  $txt.="Message: ".$request->message."<br>";
       //  $headers = "From: ".$request->email. "\r\n";
       //  $send_mail=mail($to,$subject,$txt,$headers);
       //  if($send_mail){
       //      echo "mail sent";
       //  }else{
       //      echo "not send";
       //  }
        $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('12sujit7@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('7sujit12@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
       

    }
}
