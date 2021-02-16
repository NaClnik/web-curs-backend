<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function __invoke(Request $request)
    {
        return $request->file('photo')->store('uploads', 'public');
    }
}
