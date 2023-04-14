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
}
