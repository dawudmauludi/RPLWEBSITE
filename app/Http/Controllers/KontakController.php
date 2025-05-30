<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class KontakController extends Controller
{
    public function send(Request $request)
    {
        $validate = $request->validate([
              'g-recaptcha-response' => 'required',
             'full_name' => 'required|string|max:255',
             'email' =>'required|email|max:255',
             'phone_number' => 'nullable|string|max:12',
             'subject' =>'required|string|max:255',
             'message' =>'required|string|max:255',   
        ]); 
       
         $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
    $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());
    
    if (!$response->isSuccess()) {
        return back()->withErrors(['captcha' => 'Verifikasi reCAPTCHA gagal!']);
    }
    

        Mail::to('dawudmauludixrpl@gmail.com')->send(new ContactFormMail($validate));
         return back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }
}
