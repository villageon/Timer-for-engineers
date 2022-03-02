<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $headerToStore = ImageService::uploadHeaderImage($headerImageFile);
        $iconToStore = ImageService::uploadIconImage($iconImageFile);

        $userImage = Image::where('user_id',Auth::id())->first();

        if(isset($userImage)){

            //既に登録されていたら更新
            $image = Image::findOrFail(Auth::id());

            if(isset($image->header) && isset($headerToStore)){
                Storage::delete('public/headers/' . $userImage->header);
            }

            if(isset($image->icon) && isset($iconToStore)){
                Storage::delete('public/icons/' . $userImage->icon);
            }

            $image->header = $headerToStore ?? $userImage->header;
            $image->icon =  $iconToStore ?? $userImage->icon;
            $image->save();
            
        } else {

            //登録されていなかったら新規作成
            Image::create([
                'user_id' => Auth::id(),
                'header' => $headerToStore ?? '',
                'icon' => $iconToStore ?? '',
            ]);

        }


        return redirect()->route('profile');
    }
}
