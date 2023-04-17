<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    //返回查询下载中心页面
    public function guide()
    {
        return view("guide.index");
    }
    //返回团队介绍界面
    public function info()
    {
        return view("visitor.Info");
    }
}
