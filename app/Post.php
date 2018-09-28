<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{     
     protected $fillable = [
       'created_at', 'user', 'post_title',  'post_content'
    ];
    
    
    
    
     public function user()
     {
         return $this->belongsTo(User::class, 'user')->first();
     }
      public function tags()
     {
         return $this->belongsToMany(Tag::class);
     }
}

