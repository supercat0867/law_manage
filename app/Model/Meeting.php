<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $table='meeting';
    public $primaryKey='id';
    public $guarded=[];
    public $timestamps=false;
}
