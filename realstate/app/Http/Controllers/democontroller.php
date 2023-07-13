<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class democontroller extends Controller
{
    public function getdata(Request $request)
    {
        // return view('formdata');
        // echo "<pre>";
        // print_r($request->all());
        // echo $request->fn;
        // echo $request->all();
        $request->validate([
            'sn' => 'required|min:3|max:20',
            'br' => 'required',
            'subject' => 'required',
            'sem' => 'required',
            'add' => 'required',
            'mob' => 'required',
            'em' => 'required',
            'psw' => 'required|confirmed|min:3|max:15',
            'psw_confirmation' => 'required',
            'file' => 'required|mimes:jpg,bmp,png',

        ], [
            'sn.required' => 'Full name field cannot be empty',
            'sn.min' => 'Fullname cannot be lessthen 3 charector',
            'sn.max' => 'Full name cannot be great then 20 charactor'
        ]);


        // $fileOriginalName = $request->file('file')->getClientOriginalName();
        // $request->file->move('images', $fileOriginalName);

        $pic_name=uniqid().$request->file('file')->getClientOriginalName();
        $request->file->move('images/profile');
        // $sub = $request->input('subject', []);
        $h=implode(',',$request->subject);
        // return view('formdata', compact('request', 'sub'));
        // return view('formdata', compact('request'));




        //database
        $student = new student;
        $student->Full_name = $request->sn;
        $student->Brance = $request->br;
        $student->subject = $h;
        $student->Semester = $request->sem;
        $student->Address = $request->add;
        $student->Mobile = $request->mob;
        $student->Email = $request->em;
        $student->Password = $request->psw_confirmation;
        $student->Profile = $pic_name;
        
        if ($student->save()) {
            // echo "Done";
            session()->flash('success','Registration Susscessfully');
        }
        else{
            // echo "Error";
            session()->flash('error','Registration Error');

        }
        return view('form');
    }

}