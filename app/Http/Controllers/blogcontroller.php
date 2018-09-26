<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
class blogController extends Controller
{
    //display recent posts
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
       // $user;
        //foreach($posts as $post) {
             
         //   $user = User::where('id', $post->user())->first();
        //}
        
        //dd($user);
         return view("blog.blog", compact('posts'));
         //return view("blog.blog", compact('posts', 'user'));
    }
    
    public function post($pid)
    {
        $post = Post::where('id', $pid)->first();
        
            
         return view("blog.post", compact('post'));
         //return view("blog.post", compact('post', 'user'));
    }
    
    
    public function create()
    { 
      return view("blog.createpost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post = Post::create([
        'created_at' =>  date('Y-m-d H:i:s'),
        'user' => '1',
        'post_title' => request('title'),
        'post_content' => request('content'),
]);
        $post->save();
         return redirect()->to('/');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $user;
        $user['0']= User::where('id', $post->user());
        return view("admin.editpost", compact('post'));
        
        
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->to('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->to('/admin');
    }
}
