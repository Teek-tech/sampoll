<?php

namespace App\Http\Controllers;

use App\RatePoll;
use Illuminate\Http\Request;
use Response;
class RatePollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RatePoll  $ratePoll
     * @return \Illuminate\Http\Response
     */
    public function show(RatePoll $ratePoll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RatePoll  $ratePoll
     * @return \Illuminate\Http\Response
     */
    public function edit(RatePoll $ratePoll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RatePoll  $ratePoll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $getPoll = new RatePoll();
        $getPoll->poll_id =  $request->input('poll_id');
        $getPoll->vote =  $request->input('vote');
        $getPoll->save();
        return back()->with('success', 'Thank you for your opinion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RatePoll  $ratePoll
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatePoll $ratePoll)
    {
        //
    }
}
