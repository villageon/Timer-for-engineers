<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class UserController extends Controller
{
    public function profile()
    {

        $user = User::with('profile','image','timerHistory')->findOrFail(Auth::id());

        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = User::with('profile','image','timerHistory')->findOrFail(Auth::id());

        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {

                //User、Profileの更新
                $user = User::with('profile','image','timerHistory')->findOrFail(Auth::id());
                $user->name = $request->name ?? $user->name;
                $user->profile->contents = $request->contents ?? $user->profile->contents;
                $user->save();

                //Imageの登録、更新
                $headerImageFile = $request->header_image;
                $iconImageFile = $request->icon_image;

                $headerToStore = ImageService::uploadHeaderImage($headerImageFile);
                $iconToStore = ImageService::uploadIconImage($iconImageFile);

                $userImage = Image::where('user_id', Auth::id())->first();

                if (isset($userImage)) {
                    //既に登録されていたら更新する
                    $image = Image::findOrFail(Auth::id());

                    if (isset($image->header) && isset($headerToStore)) {
                        Storage::delete('public/headers/' . $userImage->header);
                    }

                    if (isset($image->icon) && isset($iconToStore)) {
                        Storage::delete('public/icons/' . $userImage->icon);
                    }

                    $image->header = $headerToStore ?? $userImage->header;
                    $image->icon =  $iconToStore ?? $userImage->icon;
                    $image->save();
                } else {

                    //登録されていなかったら新規作成する
                    Image::create([
                        'user_id' => Auth::id(),
                        'header' => $headerToStore ?? '',
                        'icon' => $iconToStore ?? '',
                    ]);
                }
            }, 2);

        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('profile');
    }
}
