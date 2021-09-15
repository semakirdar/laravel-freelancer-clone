<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Profile;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id)
    {

        $jobs = Job::query()->where('user_id', $id)->get();
        $profile = Profile::query()->with('user')->where('user_id', $id)->firstOrFail();

        return view('profile', [
            'profile' => $profile,
            'jobs' => $jobs
        ]);

    }

    public function store($id)
    {
        $profile = Profile::query()->with('user')->where('user_id', $id)->firstOrFail();

        $medias = $profile->user->getMedia();
        if(count($medias) > 0){
            foreach ($medias as $media){
                $media->delete();
            }
        }

        $profile->user->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->back();

    }
}
