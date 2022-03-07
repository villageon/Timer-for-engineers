<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menter;
use App\Models\Profile;
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

        $user = User::with('profile','image','timerHistory','menter')->findOrFail(Auth::id());

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

                //user
                $user = User::findOrFail(Auth::id());
                $user->name = $request->name ?? $user->name;
                $user->save();

                //menter
                $menter = Menter::where('user_id', Auth::id())->first();
                if(!isset($menter)){
                    Menter::create([
                        'user_id' => Auth::id(),
                        'm_name' => $request->m_name ?? 'メンターを設定してください。',
                        'm_email' => $request->m_email ?? 'メンターのメールアドレスを設定してください。',
                    ]);
                } else {
                    $menter->m_name = $request->m_name ?? $menter->m_name;
                    $menter->m_email = $request->m_email ?? $menter->m_email;
                    $menter->save();
                }

                //profile
                $profile = Profile::where('user_id', Auth::id())->first();
                if(!isset($profile)){
                    Profile::create([
                        'user_id' => Auth::id(),
                        'contents' => $request->contents ?? '自己紹介を入力してください。',
                    ]);
                } else {
                    $profile->contents = $request->contents ?? $profile->contents;
                    $profile->save();
                }

                //image
                $headerImageFile = $request->header_image;
                $iconImageFile = $request->icon_image;

                $headerToStore = ImageService::uploadHeaderImage($headerImageFile);
                $iconToStore = ImageService::uploadIconImage($iconImageFile);

                $userImage = Image::where('user_id', Auth::id())->first();

                if (isset($userImage)) {
                    //既に登録されていたら更新する
                    $image = Image::where('user_id', Auth::id())->first();

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
