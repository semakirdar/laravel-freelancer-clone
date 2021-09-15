<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::query()->orderBy('id', 'DESC')->with(['category', 'user'])->withCount('bids')->get();
        return view('home', [
            'jobs' => $jobs
        ]);


    }


}
