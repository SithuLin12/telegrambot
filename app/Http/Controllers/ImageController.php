<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showForm()
    {
        return view('upload_image_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store uploaded image
        $path = $request->file('image')->storeAs('public', 'default_image.jpg');
        
        return back()->with('success', 'Default image updated!');
    }
}
