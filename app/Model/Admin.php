<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // 1、关联的数据表
    public $table='admin';
    // 2、主键
    public $primaryKey='admin_id';
    // 3、不批量操作的字段
    public $guarded=[];
    // 4、是否维护create_at和update_at字段
    public $timestamps=false;

    //添加动态属性，关联权限模型
    public function role()
    {
        return $this->belongsToMany('App\Model\Role','admin_role','admin_id','role_id');
    }
}
