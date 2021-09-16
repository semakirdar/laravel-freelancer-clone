<?php

namespace App\Http\Controllers;

use App\Http\Requests\Binds\StoreRequest;
use App\Models\Bid;
use App\Models\Job;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $bids = Bid::query()->get();
        return view('jobs.job-detail', [
            'bids' => $bids
        ]);
    }

    public function create($id)
    {
        return view('jobs.bid-create', [
            'job_id' => $id
        ]);
    }

    public function store(StoreRequest $request)
    {
        $job = Job::query()->where('id', $request->job_id)->firstOrFail();
        Bid::query()->create([
            'estimated_day' => $request->estimated_day,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'job_id' => $job->id

        ]);

        return redirect()->route('detail', ['id' => $job->id]);
    }

    public function edit($id,)
    {
        $bid = Bid::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->firstOrFail();
        return view('jobs.bid-edit',
            [
                'bid' => $bid
            ]);
    }

    public function update($id, StoreRequest $request)
    {
        $bid = Bid::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)->first();
        $bid->price = $request->price;
        $bid->estimated_day = $request->estimated_day;
        $bid->description = $request->description;
        $bid->save();
        return redirect()->route('detail', ['id' => $bid->job->id]);
    }

    public function delete($id, Request $request)
    {
        $bind = Bid::query()->where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
        $bind->delete();
        return redirect()->back();
    }
}
