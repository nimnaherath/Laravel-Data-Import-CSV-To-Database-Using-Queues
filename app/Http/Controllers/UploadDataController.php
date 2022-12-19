<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadDataController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv',
        ]);
    }
}
