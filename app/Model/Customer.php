<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // 1、关联的数据表
    public $table='customer';
    //2、主键
    public $primaryKey='customer_id';
    //3、不允许批量操作的字段
    public $guarded=[];
    //4、是否维护create_at和update_at字段
//    public $timestamps=false;
}
