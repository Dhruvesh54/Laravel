<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tutorial_1 extends Controller
{
    public function tut1()
    {
        echo "Dhruvesh";
    }
    public function tut1_3()
    {
        return view('data');
    }
    public function tut1_4(Request $req)
    {
        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('images/', $pic_name);
        return view('display', compact('req'));
    }

    public function tut1_5(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:20',
            'em' => 'required|email',
            'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd_confirmation' => 'required',
            'age' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            'qualification' => 'required',
            'address' => 'required',
            'pic' => 'required|max:300|mimes:jpg,png,gif,bmp'

        ], [
            'fn.required' => 'Full name cannot be empty',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 30 characters',
            'fn.regex' => 'Full name must contain only letters and spaces',
            'em.required' => 'Email address cannot be empty',
            'em.email' => 'invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'Confirm Password must not be empty',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
            'mobile.numeric' => 'Mobile number must contain digits only',
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 25 KB',
            'pic.mimes' => 'Select jpg or png or bmp file to uplaod',
            'qualification.required' => 'Please select a qualification',
            'address.required' => 'Address field cannot be empty',
            'gender.required' => 'Please select your Gender',
            'age.required' => 'Please enter your age'
        ]);


        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('images/', $pic_name);
        return view('display', compact('req'));
    }



}