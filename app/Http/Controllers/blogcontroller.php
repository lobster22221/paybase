<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
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
       //tags are comma seperated, I need to filter them so I found this code
       
        $tagsString = request('tags') !== null ? (string)strip_tags(request('tags')) : '';
       
        $tags_array;  
        
       
        $post->save();
        
        if ($tagsString != '') {
            $tags_array = explode(",", $tagsString);
            $tags_array = array_unique($tags_array); //no dups, please
           
            foreach($tags_array AS $key => $tag)
            {
                    $tag = trim(stripslashes($tag));
                    if($tag == '') continue; //skips if empty
                    echo $key.' - '.$tag;                    
                    if (Tag::where('description', "$tag")->exists()) {                      
                       
                        $post->tags()->attach(Tag::where('description', "$tag")->first());
                    }
                    else 
                    {
                        $t = Tag::create([
                        'description' =>  $tag
                        ]);
                         $post->tags()->attach($t);
                    }
                    
            }
        }
        
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
    /**
     * Search for specific posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $s = $request->input('s');
		
		// Query and paginate result
		$posts = Post::where('post_title', 'like', "%$s%")
				->orWhere('post_content', 'like', "%$s%")
				->paginate(6);
        $total = $posts->total();
		return view('blog.blog_search', ['posts' => $posts, 's' => $s, 'total' => $total ]);
	
    }
    public function searchTag($id)
    {
        $posts = Tag::where('description', $id)->first();
        //dd($posts->posts)    ;
        $total = count($posts->posts)    ;
         return view('blog.blog_search', ['posts' => $posts->posts, 's' => $id ,'total' => $total ]);
	
    }
}
