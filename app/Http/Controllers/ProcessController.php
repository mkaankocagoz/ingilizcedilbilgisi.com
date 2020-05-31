<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContactUs;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->recent = Article::select('page_id','title', 'created_at', 'site_url')->where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();
        $this->popular = Article::select('page_id','title', 'created_at', 'site_url')->where('status', 1)->orderBy('read_count', 'DESC')->take(3)->get();
    }

    public function post_email(Request $request){
        $isCheck = Subscriber::where('email', $request->newsletterEmail)->first();
        if(!$isCheck){
            try{

                $validator = Validator::make($request->all(), [
                    'newsletterEmail' => 'required|email',
                ]);

                if ($validator->fails()) {
                    return response()->json(['status'=>3]);
                }

                $email = new Subscriber();
                $email->email = $request->newsletterEmail;
                $email->save();
                return response()->json(['status'=>1]);
            }catch (\Exception $exception){
                return response()->json(['status'=>0]);
            }
        }else{
            return response()->json(['status'=>2]);
        }
    }

    public function iletisim_index(){
        $recent = $this->recent;
        $popular = $this->popular;
        return view('front_office.contact_us', compact( 'recent', 'popular'));
    }

    public function iletisim_post(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required'
        ],
            [
                'name.required'     => 'Lütfen adınızı ve soyadınızı yazınız.',
                'email.required'    => 'Lütfen email adresinizi yazınız.',
                'email.email'       => 'Email adres formatı düzgün değil.',
                'subject.required'  => 'Lütfen mesajnızın konusunu yazınız.',
                'message.required'  => 'Lütfen mesajınızı yazınız.'
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try{
            $contact = new ContactUs();
            $contact->full_name = $request->name;
            $contact->email     = $request->email;
            $contact->subject   = $request->subject;
            $contact->message   = $request->message;
            $contact->save();
            return redirect()->back()->with('status', 1);
        }catch (\Exception $exception){
            return redirect()->back()->with('status', 2);
        }

    }
}
