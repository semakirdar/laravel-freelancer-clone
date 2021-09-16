<?php

namespace App\Http\Controllers;

use App\Http\Requests\job\StoreRequest;
use App\Http\Requests\job\UpdateRequest;
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
            'delivery_time' => $request->delivery_time,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('detail', ['id' => $job->id]);
    }

    public function edit($id)
    {
        $categories = Category::query()->get();
        $job = Job::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)->first();
        return view('jobs.job-edit',
            [
                'job' => $job,
                'categories' => $categories
            ]);
    }

    public function update($id, UpdateRequest $request)
    {
        $job = Job::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)->firstOrFail();
        $job->title = $request->title;
        $job->body = $request->body;
        $job->budget = $request->budget;
        $job->delivery_time = $request->delivery_time;
        $job->category_id = $request->category_id;

        $job->save();
        return redirect()->route('profile', ['id' => $job->user_id]);


    }
}
