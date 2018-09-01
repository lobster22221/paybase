<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    public $id;
    public $date;
    public $wage;
    public $hours;
    public $tip;
    public $employer;
}
