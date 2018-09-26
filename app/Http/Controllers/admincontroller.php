<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
class adminController extends Controller
{
    public function index()
    {
       
         return view("admin.index");
        
    }
    
    public function fileManager()
    {
       
         return view("admin.filemanager");
        
    }
    
    public function createPost()
    {
       
         return view("admin.createpost");
        
    }
    
    public function viewPosts()
    {
       $posts = Post::all();
         return view("admin.viewposts", compact('posts'));
        
    }
    
    
    public function config()
    {
       
         return view("admin.layout.layout");
        
    }
}
