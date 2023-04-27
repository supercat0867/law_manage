<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table='article';
    //2、主键
    public $primaryKey='id';
    public $guarded=[];
}
