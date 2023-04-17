<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    // 1、关联的数据表
    public $table='lawyer';
    //2、主键
    public $primaryKey='lawyer_id';
    //3、不允许批量操作的字段
    public $guarded=[];
    //4、是否维护create_at和update_at字段
//    public $timestamps=false;
}
