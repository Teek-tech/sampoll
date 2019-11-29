<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all();
        return view('home', compact('post'));
    }

    
    public function store(Request $request){
        
        // $this->validate(request(),
        //     [
        //         'user_id'    => 'required',
        //         'title' => 'required|max:100',
        //         'category'  => 'required|max:255',
        //         'body' => 'required|min:15|max:2000',
        //         'image' => 'mimes:jpeg,jpg,png|max:4000',
        //     ]);
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->body = $request->input('body');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $postImg =  $post->title.'_image'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/resource_img/'.$postImg));
            $post->image = $postImg;
        }
        
         $post->save();
      return back()->with('success', 'A new post has been created!');
    }
   
    public function articles()
    {
        $post = Post::all();
        return view('blogpost', compact('post'));
    }
}
