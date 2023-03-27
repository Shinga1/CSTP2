<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormEmail;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.welcome');
    }
    
    public function home()
    {
        return view('frontend.home');
    }
    
    public function aboutus()
    {
        return view('frontend.about_us');
    }

    public function contactus()
    {
        return view('frontend.contact_us');
    }

    public function privacypolicy()
    {
        return view('frontend.privacy_policy');
    }

    public function termsandconditions()
    {
        return view('frontend.terms_and_conditions');
    }

    public function faqs()
    {
        return view('frontend.faqs');
    }

    public function message(Request $request) {
        $validateInput = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        $contact = new Contact();
        $contact->name = $validateInput['name'];
        $contact->email = $validateInput['email'];
        $contact->subject = $validateInput['subject'];
        $contact->message = $validateInput['message'];
        
        $contact->save();
    
        Mail::to('celessentialsteam@gmail.com')->send(new ContactFormEmail($contact));
    
        return back()->with('msgSent', 'Your message has been sent successfully');
    }

    public function subscribe(Request $request) {

        $input = $request->validate([
            'email' => 'required|email',
        ]);

        $subscribed = Newsletter::where('email', $input['email'])->first();

        if($subscribed) {
            return back()->with('subscribed', 'You have already subscribed to the newsletter');
        } 

        $subscribe = new Newsletter();
        $subscribe->email = $input['email'];

        $subscribe->save();

        return back()->with('success', 'You have now subscribed to our newsletter');
        
    }
}