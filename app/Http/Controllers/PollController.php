<?php

namespace App\Http\Controllers;
use Cookie;
use App\Poll;
use Illuminate\Http\Request;
use Response;
class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $poll = Poll::all();
      
       return view('polls', compact('poll'));
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
        $poll = new Poll();
        $poll->postId = $request->input('postId');
        $poll->title = $request->input('title');
       
        $poll->save();
        return back()->with('success', 'A new poll has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        // $getPoll = $request->has('agree') ? 1 : 0;
    }

    public function status(Request $request, $id)
    {
        $getPoll = Poll::findOrFail($id);
        if($getPoll) {
            $getPoll->status = $request->input('status');
            $getPoll->save();
        }
        return back()->with('success', 'Poll status was changed successfully!');
    }
    
}
