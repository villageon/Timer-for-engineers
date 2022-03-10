<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menter;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

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

        try {
            DB::transaction(function () use ($request) {

                //user
                $user = $this->userRepository->getUser(Auth::id());
                $this->userRepository->updateUserName($request, $user);

                //menter
                $menter = $this->menterRepository->getMenter(Auth::id());
                $this->menterRepository->createUpdateMenter($request, $menter);

                //profile
                $profile = $this->userRepository->getProfile(Auth::id());
                $this->userRepository->createUpdateProfile($request, $profile);

                //image
                $headerToStore = ImageService::uploadHeaderImage($request->header_image);
                $iconToStore = ImageService::uploadIconImage($request->icon_image);

                $image = $this->userRepository->getImage(Auth::id());
                $this->userRepository-> createUpdateImage($image, Auth::id(), $headerToStore, $iconToStore);

            }, 2);

        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('profile');
    }
}
