<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table='role';
    public $primaryKey='id';
    public $guarded=[];
    public $timestamps=false;
    //添加动态属性，关联权限模型
    public function permission()
    {
        return $this->belongsToMany('App\Model\Permission','role_permission','role_id','permission_id');
    }
}
