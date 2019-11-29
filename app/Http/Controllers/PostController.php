<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cookie;
use Response;
use App\Poll;
use App\RatePoll;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('welcome', compact('post'));
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
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $showArticle = Post::findOrFail($id);
        $getAgreeCount = RatePoll::where('poll_id', $showArticle->id)->where('vote', 'agree')->count();
        $getDisagreeCount = RatePoll::where('poll_id', $showArticle->id)->where('vote', 'disagree')->count();
        $getIndifferentCount = RatePoll::where('poll_id', $showArticle->id)->where('vote', 'indifferent')->count();
        // $cookie = Cookie::forever('yoo', '7');
    //    $minutes = 60;
//    $post = "hello world post";
//       $response = Response::json('Create new cookie');
//       $response->withCookie(cookie('Poll', $post, 120));
    //$value = Cookie::get('poll');
    //$value = $request->cookie();
    // if($value = $request->hasCookie('Poll')){
    //     dd($request->cookie('Poll'));
    // }else{
    //     dd('NO COKKIE');
    // }
    
    //   return $response;

        $getPosts = Post::all()->take(2);
        return view('article', compact('showArticle','getPosts','getAgreeCount','getDisagreeCount','getIndifferentCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    // public function blogpost(){
    //     $post = Post::all();
    //     return view('welcome', compact('post')); 
    // }

    
}
