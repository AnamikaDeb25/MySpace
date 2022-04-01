<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function getRegister(){
        return view('auth.register');
    }
    public function check_email_unique(Request $request){
    	$user=User::where('email',$request->email)->first();
    	if($user){
    		echo 'false';
    	}else{
    		echo 'true';
    	}
    }
    public function postRegister(Request $request){

       
        $request->validate([
        'first_name'=>'required|min:2|max:100',
        'last_name'=>'required|min:2|max:100',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|max:10',
        'confirm_password'=>'required|same:password',
        'terms'=>'required',
        'grecaptcha'=>'required'
        ],[
           'first_name.required'=>'First name is required',
           'last_name.required'=>'Last name is required',
        ]);

       $grecaptcha=$request->grecaptcha;

       $client = new Client();

       $response = $client->post(
           'https://www.google.com/recaptcha/api/siteverify',
           ['form_params'=>
               [
                   'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                   'response'=>$grecaptcha
                ]
           ]
       );
     
       $body = json_decode((string)$response->getBody());

       if($body->success==true){

           $user=User::create([
               'first_name'=>$request->first_name,
               'last_name'=>$request->last_name,
               'email'=>$request->email,
               'password'=>bcrypt($request->password),
               'email_verification_code'=>Str::random(40)
           ]);

         return redirect()->route('getLogin')->with('success','Registration successfull');
         
       }else{
           return redirect()->back()->with('error','Invalid recaptcha');
       }


   }




   public function getLogin(){
    return view('auth.login');
}

public function postLogin(Request $request){

    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6|max:100',
        'grecaptcha'=>'required'
    ]);

    $grecaptcha=$request->grecaptcha;

    $client = new Client();

    $response = $client->post(
        'https://www.google.com/recaptcha/api/siteverify',
        ['form_params'=>
            [
                'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                'response'=>$grecaptcha
             ]
        ]
    );
  
    $body = json_decode((string)$response->getBody());

    if($body->success==true){

        $user=User::where('email',$request->email)->first();

        if(!$user){
            return redirect()->back()->with('error','Email is not registered');
        }else{

                if(!$user->is_active){
                    return redirect()->back()->with('error','User is not active. Contact admin');
                }else{

                    $remember_me=($request->remember_me)?true:false;
                    if(auth()->attempt($request->only('email','password'),$remember_me)){

                       return redirect()->route('dashboard')->with('success','Login successfull');


                    }else{
                        return redirect()->back()->with('error','Invalid credentials');
                    }

                }

            

        }
      
    }else{
        return redirect()->back()->with('error','Invalid recaptcha');
    }


}
    
}
