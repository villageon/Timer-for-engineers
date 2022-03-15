<?php

namespace App\Repository\UserRepository;

use App\Models\Image;
use App\Models\Profile;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface{
    
    public function getUser($userId){
        
        return User::with('profile','image','timerHistory','menter')->findOrFail($userId);

    }

    public function updateUserName($request, $user){
        $user->name = $request->name ?? $user->name;
        $user->save();
    }

    public function getProfile($userId){
        return Profile::where('user_id', $userId)->first();
    }

    public function createUpdateProfile($userId, $request, $profile){
        if(!isset($profile)){
            Profile::create([
                'user_id' => $userId,
                'contents' => $request->contents ?? '自己紹介を入力してください。',
            ]);
        } else {
            $profile->contents = $request->contents ?? $profile->contents;
            $profile->save();
        }
    }

    public function getImage($userId){
        return Image::where('user_id', $userId)->first();
    }

    public function createUpdateImage($image, $userId, $headerToStore, $iconToStore){
        if (isset($image)) {
            //既に登録されていたら更新する
            $image = Image::where('user_id', $userId)->first();

            if (isset($image->header) && isset($headerToStore)) {
                Storage::delete('public/headers/' . $image->header);
            }

            if (isset($image->icon) && isset($iconToStore)) {
                Storage::delete('public/icons/' . $image->icon);
            }

            $image->header = $headerToStore ?? $image->header;
            $image->icon =  $iconToStore ?? $image->icon;
            $image->save();
        } else {

            //登録されていなかったら新規作成する
            Image::create([
                'user_id' => $userId,
                'header' => $headerToStore ?? '',
                'icon' => $iconToStore ?? '',
            ]);
        }
    }

}