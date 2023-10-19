<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class Tutorial_2 extends Controller
{
    public function tut_2_1(Request $request)
    {
        $data = ['name' => $request->nm, 'email' => $request->em];
            Mail::send('create_account_mail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);
                $message->attach('Images/images.png');
            });
            return redirect('email_send_form');
    }

    public function getdata(Request $request)
    {
        //database
        $reg = DB::table('registration')->insert(
            [
                'name' => $request->nm,
                'email' => $request->em,
                'password' => $request->pwd,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );


        if ($reg) {
            return view('registration');
        }
    }
}