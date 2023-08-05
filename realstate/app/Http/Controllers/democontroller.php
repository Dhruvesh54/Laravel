<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use TheSeer\Tokenizer\Exception;

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

        $pic_name = uniqid() . $request->file('file')->getClientOriginalName();
        $request->file->move('images/profile', $pic_name);
        // $sub = $request->input('subject', []);
        $h = implode(',', $request->subject);
        // return view('formdata', compact('request', 'sub'));
        // return view('formdata', compact('request'));




        //database
        $student = new student;
        // $student=student::all();
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
            session()->flash('success', 'Registration Susscessfully');
        } else {
            // echo "Error";
            session()->flash('error', 'Registration Error');

        }
        return view('form');
    }

    public function fetch_registration_data()
    {
        $data = student::select()->get();
        return view('Display_registration', compact('data'));
    }
    public function fetch_data_for_edit($email)
    {
        $reg_data = student::where('email', $email)->get();
        return view('edit_registration_form', compact('reg_data'));
    }
    public function delete_user_registration($email)
    {
        $data = student::where('email', $email)->update(array('status' => 'Deleted'));
        if ($data) {
            return $this->fetch_registration_data();
        }
    }
    public function deactivate_user_registration($email)
    {
        $data = student::where('email', $email)->update(array('status' => 'Inactive'));
        if ($data) {
            return $this->fetch_registration_data();
        }
    }
    public function activate_user_registration($email)
    {
        $data = student::where('email', $email)->update(array('status' => 'Active'));
        if ($data) {
            return $this->fetch_registration_data();
        }
    }
    public function update_data_registration(Request $request)
    {

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


        ], [
            'sn.required' => 'Full name field cannot be empty',
            'sn.min' => 'Fullname cannot be lessthen 3 charector',
            'sn.max' => 'Full name cannot be great then 20 charactor'
        ]);


        $h = implode(',', $request->subject);
        $data = student::where('Email', $request->em)->first();
        if ($request->hasFile('file')) {
            $file_path = "images/profile/" . $data['file'];
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $pic_name = uniqid() . $request->file('file')->getClientOriginalName();
            $request->file->move('images/profile/', $pic_name);
            $data->where('Email', $request->em)->update(array('Full_name' => $request->sn, 'Brance' => $request->br, 'subject' => $h, 'Semester' => $request->sem, "Address" => $request->add, "Mobile" => $request->mob, "Email" => $request->em, "Password" => $request->psw_confirmation, "Profile" => $pic_name));

        } else {
            $data->where('Email', $request->em)->update(array('Full_name' => $request->sn, 'Brance' => $request->br, 'subject' => $h, 'Semester' => $request->sem, "Address" => $request->add, "Mobile" => $request->mob, "Email" => $request->em, "Password" => $request->psw_confirmation));
        }
        return redirect('Fetch_Registration');
    }

    public function validation_login(Request $request)
    {
        $Enterd_email = $request->uname;
        $Enterd_pasword = $request->pwd;

        $reg_email = student::where('Email', $Enterd_email)->get();
        // $reg_pass = student::where('Password', $Enterd_pasword)->get('Password');

        $request->session()->forget('uname');

        // echo $reg_email;
        // echo $reg_pass;
        foreach ($reg_email as $val) {
            $em = $val['Email'];
            $pass = $val['Password'];
        }

        if ($Enterd_email == $em && $Enterd_pasword == $pass) {
            $request->session()->put('uname', $Enterd_email);
            $request->session()->put('pwd', $Enterd_pasword);

        }

        return redirect("after_login");
    }

    public function logout()
    {

        if (session('uname')) {
            session()->forget('uname');
            return redirect('login_session');
        }
    }

    public function send_email(Request $request)
    {
        $data = ['name' => $request->nm, 'email' => $request->em];
        try {
            Mail::send('create_account_mail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);
                $message->attach('images/profile/64b4ec2c67cd1swaminarayn.jpg');
            });
            return redirect('email_send_form');

            if (Mail::send()) {
                // echo "Done";
                session()->flash('success', 'Mail send Susscessfully');
            } else {
                // echo "Error";
                session()->flash('error', 'Mail Error');
            }
        } 
        
        catch (Exception $e) {
            return "error";
        }
    }


}