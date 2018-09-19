<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public $id;
     public $writer;
     public $title;
     public $content;
}
