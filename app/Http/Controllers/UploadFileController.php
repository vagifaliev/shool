<?php

namespace App\Http\Controllers;

use App\Userstable;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UploadFileController extends Controller
{
    public function index() {
        return view('uploadfile');
    }
    public function showUploadFile(Request $request) {
        $file = $request->file('image');
        Excel::import(new UsersImport, $file);
//        $collection = Excel::toCollection(new UsersImport(), $file);
//        dd($collection);

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
    }
}
