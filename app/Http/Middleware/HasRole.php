<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use App\Model\Role;
use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //1、获取当前请求的路由 对应的控制器方法名
        $route =\Route::current()->getActionName();
        list($class, $method) = explode('@', $route);
        //2、获取当前管理员的权限组
        $admin=Admin::find(session()->get('adminInfo')->admin_id);
        //2.1 获取当前用户的角色
        $roles=$admin->role;
        //3、根据拥有的角色，找到对应的权限
        $arr=[];//存放权限对应的per_url字段
        foreach ($roles as $v){
            $perms= $v->permission;
            foreach ($perms as $perm){
                $arr[]=$perm->per_url;
            }
        }
        //4、去掉重复的权限
        $arr=array_unique($arr);
        //5、判断当前路由对应控制器是否在权限列表中
        if(in_array($class,$arr)){
            return $next($request);
        }
        else{
            return redirect('noaccess');
        }
    }
}
