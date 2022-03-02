<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;


class UserController extends Controller
{
    public function profile(){
        
        $user = User::findOrFail(Auth::id());

        return view('user.profile', compact('user'));
    }

    public function edit(){
        $user = User::findOrFail(Auth::id());

        return view('user.edit', compact('user'));
    }

    public function update(Request $request){
        // dd('update');

        $headerImageFile = $request->header_image;
        $iconImageFile = $request->icon_image;

        if(!is_null($headerImageFile) && $headerImageFile->isValid()){
            // Storage::putFile('public/headers', $headerImageFile);

            $fileNameForHeader = uniqid(rand(),'_');
            $headerExtension = $headerImageFile->extension();
            $headerToStore = $fileNameForHeader.'.'.$headerExtension; 

            $resizedHeaderImage = InterventionImage::make($headerImageFile)
            ->resize(1200, 500)->encode();

            Storage::put('public/headers/' . $headerToStore, $resizedHeaderImage);
        }

        if(!is_null($iconImageFile) && $iconImageFile->isValid()){
            // Storage::putFile('public/icons', $iconImageFile);

            $fileNameForIcon = uniqid(rand(),'_');
            $iconExtension = $iconImageFile->extension();
            $iconToStore = $fileNameForIcon.'.'.$iconExtension; 

            $resizedIconImage = InterventionImage::make($iconImageFile)
            ->resize(500, 500)->encode();

            Storage::put('public/icons/' . $iconToStore, $resizedIconImage);
        }

        return redirect()->route('profile');
    }
}
