<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class upload extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048'
        ]);
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/', $filename);
        $fileInfo = [
            'name' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
            'path' => $path,
        ];
        return view('upload', ['message' => 'File uploaded successfully!', 'fileInfo' => $fileInfo]);
    }
}