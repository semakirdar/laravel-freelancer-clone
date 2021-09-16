<?php

namespace App\Http\Controllers;

use App\Http\Requests\job\StoreRequest;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function show($id)
    {
        $job = Job::query()
            ->with('user')
            ->with('skills')
            ->with('bids')
            ->where('id', $id)
            ->first();
        return view('jobs.job-detail', [
            'job' => $job,
        ]);

    }

    public function create()
    {
        $categories = Category::query()->get();
        return view('jobs.job-create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreRequest $request)
    {
        $job = Job::query()->create([
            'title' => $request->title,
            'body' => $request->body,
            'budget' => $request->budget,
            'delivery_time' =>$request->delivery_time,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('detail', ['id' => $job->id]);
    }
}
