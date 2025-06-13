<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\EmailReply;
use App\Models\SingleSection;
use App\Notifications\EmailReplyNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;
use PharIo\Manifest\Email;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',12)->first();
        $data = ['data'=> $SingleSection];
        return view('dashboard.pages.contact.index',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'short_description'=>'required|max:600',
            'office_address'=>'required|max:255',
            'telephone_number'=>'required|max:255',
            'mail_address'=>'required|max:255',
            'map_link'=>'required|max:600',
        ]);


        SingleSection::insert([
            'lebel'=>$request->lebel,
            'section_id'=>12,
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'btn1'=>$request->office_address,
            'link1'=>$request->telephone_number,
            'link2'=>$request->mail_address,
            'description1'=>$request->map_link,
            'created_by'=> auth()->id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Added successfully');
    }
    public function send_message(Request $request)
    {
        $uid = auth()?->id() ?? 0;
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'nullable|max:255',
            'mobile'=>'nullable|max:255',
            'subject'=>'required|max:255',
            'message'=>'required',
        ]);

        Contact::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'subject'=> $request->subject,
            'message'=> $request->message,
            'created_by'=> $uid,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('success','Message sent successfully');
    }

    public function show(string $encrypt_id)
    {
        try {
            $id = Crypt::decrypt($encrypt_id);
        } catch (\Exception $e) {
            return back()->with('page_error', 'Invalid URL.');
        }

        try {
            $contact = Contact::findOrFail($id);
            $replies = EmailReply::where('contact_id',$id)->get();
        }
        catch (Exception $e)
        {
            return back()->with('page_error',$e->getMessage());
        }

        if ( $contact->status == 0)
        {
            $contact->status = 1;
            $contact->updated_by = auth()->id();
            $contact->save();
        }

        return view('dashboard.contact.show',['message'=>$contact,'replies'=>$replies]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'short_description'=>'required|max:600',
            'office_address'=>'required|max:255',
            'telephone_number'=>'required|max:255',
            'mail_address'=>'required|max:255',
            'map_link'=>'required|max:600',
        ]);
        try {
            $data = SingleSection::findOrFail($id);
            $data->lebel = $request->lebel;
            $data->title = $request->title;
            $data->short_description = $request->short_description;
            $data->btn1 = $request->office_address;
            $data->link1 = $request->telephone_number;
            $data->link2 = $request->mail_address;
            $data->description1 = $request->map_link;
            $data->updated_by = auth()->id();
            $data->save();

            return back()->with('success','Updated successfully');
        }
        catch (Exception $e)
        {
            return back()->with('page_error',$e->getMessage());
        }
    }


    public function email_reply(Request $request)
    {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {

            // Send notification to email
            // Notification::route('mail', $request->recipient)
            // ->notify(new EmailReplyNotification($request));

            //update contact status

            $contact = Contact::find($request->contact_id);
            $contact->is_replied = 1;
            $contact->updated_by = auth()->id();
            $contact->save();

            //store the reply in the database
            EmailReply::insert([
                'contact_id' => $request->contact_id,
                'subject'    => $request->subject,
                'body'       => $request->message,
                'created_by' => auth()->id(),
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success','Reply sent successfully');
        }
        catch (Exception $e)
        {
            return back()->with('page_error',$e->getMessage());
        }

    }



}
