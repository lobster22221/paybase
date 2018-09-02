<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public $id;
    public $date;
    public $rate;
    public $hours;
    public $tip;
    public $employer;
}
