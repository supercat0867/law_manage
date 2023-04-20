<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    // 1、关联的数据表
    public $table='administration';
    //2、主键
    public $primaryKey='id';
    public $guarded=[];
    public $timestamps=false;
}
