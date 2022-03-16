<?php

namespace App\Http\Controllers;

use Throwable;

use App\Services\ImageService;
use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    private $userRepository;
    private $menterRepository;

    public function __construct(UserRepositoryInterface $userRepository, MenterRepositoryInterface $menterRepository)
    {
        $this->userRepository = $userRepository;
        $this->menterRepository = $menterRepository;
    }

    public function profile()
    {
        $user = $this->userRepository->getUser(Auth::id());

        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = $this->userRepository->getUser(Auth::id());

        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $is_success = true;

        try {
            DB::transaction(function () use ($request) {

                //user
                $user = $this->userRepository->getUser(Auth::id());
                $this->userRepository->updateUserName($request, $user);

                //menter
                $menter = $this->menterRepository->getMenter(Auth::id());
                $this->menterRepository->createUpdateMenter(Auth::id() ,$request, $menter);

                //profile
                $profile = $this->userRepository->getProfile(Auth::id());
                $this->userRepository->createUpdateProfile(Auth::id(), $request, $profile);

                //image
                $headerToStore = ImageService::uploadHeaderImage($request->header_image);
                $iconToStore = ImageService::uploadIconImage($request->icon_image);

                $image = $this->userRepository->getImage(Auth::id());
                $this->userRepository-> createUpdateImage($image, Auth::id(), $headerToStore, $iconToStore);

            }, 2);

        } catch (Throwable $e) {
            $is_success = false;
            Log::error($e);
            throw $e;
        }

        if ($is_success) {

            return redirect()->route('profile')
                ->with(
                    [
                        'message' => 'プロフィールを更新しました。',
                        'status' => 'info',
                    ],
                ); 
            } else {

            return redirect()->route('profile')
                ->with(
                    [
                        'message' => 'プロフィールを更新できませんでした',
                        'status' => 'alret',
                    ],
                ); 
        }
    }
}
