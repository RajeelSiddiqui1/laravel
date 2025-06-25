<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        // ✅ Step 1: Validate input
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // ✅ Step 2: Store file in public disk (creates file in storage/app/public)
        $path = $request->file('file')->store('public');

        // ✅ Step 3: Get the filename
        $filename = basename($path); // Just the file name, not the full path

        // ✅ Step 4: Return view with image path
        return view('showfile', ['path' => $filename]);
    }
}
