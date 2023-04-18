<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table='role';
    public $primaryKey='id';
    public $guarded=[];
    public $timestamps=false;
}
