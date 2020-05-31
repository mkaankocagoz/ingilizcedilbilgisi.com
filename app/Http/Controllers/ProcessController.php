<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
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
}
